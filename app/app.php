<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Initial.php";
    require_once __DIR__."/../src/Race.php";
    require_once __DIR__."/../src/CharClass.php";
    require_once __DIR__."/../src/Background.php";
    require_once __DIR__."/../src/Stat.php";
    require_once __DIR__."/../src/Skill.php";
    require_once __DIR__."/../src/Description.php";
    require_once __DIR__."/../src/Character.php";
    require_once __DIR__."/../src/Initial.php";


    session_start();
    if (empty($_SESSION['temporary_character'])) {
        $_SESSION['temporary_character'] = array(

        $_SESSION['race'] => "",

        $_SESSION['class'] => "",

        $_SESSION['background'] => "",

        $_SESSION['str'] => "",
        $_SESSION['dex'] => "",
        $_SESSION['con'] => "",
        $_SESSION['wis'] => "",
        $_SESSION['int'] => "",
        $_SESSION['cha'] => "",

        $_SESSION['loadout'] => "",

        $_SESSION['name'] => "",
        $_SESSION['age'] => "",
        $_SESSION['gender'] => "",
        $_SESSION['height'] => "",
        $_SESSION['weight'] => "",
        $_SESSION['eye_color'] => "",
        $_SESSION['hair_color'] => "",
        $_SESSION['skin_tone'] => "",
        $_SESSION['alignment'] => "",
        $_SESSION['other_information'] => "",
    );};


    $app = new Silex\Application();
    $app['debug'] = true;


    $server = 'mysql:host=localhost;dbname=dnd';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));


    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();


//landing page
    //renders homepage
    Initial::addData();
    $app->get('/', function() use ($app)
    {
        Initial::addData();

        return $app['twig']->render('home.html.twig', array('characters' => Character::getAll()));
    });



//race page
    //renders race page
    $app->get('/race', function() use ($app)
    {
        return $app['twig']->render('race.html.twig', array('races' => Race::getAll()));
    });

    //post class id to cookies
    $app->post('/class', function() use ($app)
    {
        $_SESSION['race'] = $_POST['race_id'];

        return $app['twig']->render('class.html.twig', array('classes' => CharClass::getAll(), 'race' => $_SESSION['race']));
    });



//class page
    //render class page
    $app->get('/class', function() use ($app)
    {
        return $app['twig']->render('class.html.twig', array('classes' => CharClass::getAll()));
    });

    //post class id to cookies
    $app->post('/background', function() use ($app)
    {
        $_SESSION['class'] = $_POST['class_id'];

        return $app['twig']->render('background.html.twig', array('backgrounds' => Background::getAll()));
    });



//background page
    //render background page
    $app->get('/background', function() use ($app)
    {
        return $app['twig']->render('background.html.twig', array('backgrounds' => Background::getAll()));
    });

    //carry race id, class id, background id to stats page
    $app->post('/stats', function() use ($app)
    {
        $_SESSION['background'] = $_POST['background_id'];

        $race_id = $_SESSION['race'];
        $race_find = Race::find($race_id);
        $race = $race_find->getName();

        $class_id = $_SESSION['class'];
        $class_find = CharClass::find($class_id);
        $class = $class_find->getName();


        $stats = statRoll();
        Stat::assignRolls($stats, $class, $race);

        return $app['twig']->render('stats.html.twig', array('race' =>$_SESSION['race'], 'class' => $_SESSION['class'], 'str' => $_SESSION['str'], 'dex'=> $_SESSION['dex'], 'con'=> $_SESSION['con'], 'wis'=> $_SESSION['wis'], 'int'=> $_SESSION['int'], 'cha'=> $_SESSION['cha']));
    });


//stats page
    //render stats page
    $app->get('/stats', function() use ($app)
    {
        return $app['twig']->render('stats.html.twig', array('str' => $_SESSION['str'], 'dex'=> $_SESSION['dex'], 'con'=> $_SESSION['con'], 'wis'=> $_SESSION['wis'], 'int'=> $_SESSION['int'], 'cha'=> $_SESSION['cha']));
    });


    //carry race id, class id, background id, stats id to skills page
    $app->post('/bio', function() use ($app)
    {


        $load_outs = loadOuts($_SESSION['class'], $_SESSION['background']);

        return $app['twig']->render('bio.html.twig', array('load_outs' => $load_outs));
    });


//loadout page
    //render loadout page
    $app->get('/loadout', function() use ($app)
    {
        $load_outs = loadOuts($_SESSION['class'], $_SESSION['background']);

        return $app['twig']->render('loadout.html.twig', array('load_outs' => $load_outs));
    });


//bio page
    //render bio page
    $app->get('/bio', function() use ($app)
    {
        return $app['twig']->render('bio.html.twig');
    });

    //save loadout choice to session
    $app->post('/bio', function() use ($app)
    {

        $_SESSION['loadout'] = $_POST['loadout'];

        return $app['twig']->render('bio.html.twig');
    });


//summary page
    //render summary page
    $app->get('/summary', function() use ($app)
    {
        return $app['twig']->render('summary.html.twig');
    });

    //post description info to summary page
    $app->post('/summary', function() use ($app)
    {
        $_SESSION['name'] = $_POST['name_id'];
        $_SESSION['age'] = $_POST['age_id'];
        $_SESSION['gender'] = $_POST['gender_id'];
        $_SESSION['height'] = $_POST['height_id'];
        $_SESSION['weight'] = $_POST['weight_id'];
        $_SESSION['eye_color'] = $_POST['eye_color_id'];
        $_SESSION['hair_color'] = $_POST['hair_color_id'];
        $_SESSION['skin_tone'] = $_POST['skin_tone_id'];
        $_SESSION['alignment'] = $_POST['alignment_id'];
        $_SESSION['other'] = $_POST['other_id'];

        return $app['twig']->render('summary.html.twig');
    });


return $app;

?>
