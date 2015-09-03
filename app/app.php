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
        $_SESSION['other_information'] => " ",
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


//loadout page
    //render loadout page
    $app->post('/loadout', function() use ($app)
    {


        $load_outs = loadOuts($_SESSION['class'], $_SESSION['background']);

        $max1 = $loadout_outs[0][1];
        $max2 = $loadout_outs[0][2];
        $max3 = $loadout_outs[0][3];
        $max4 = $loadout_outs[0][4];

        $util1 = $loadout_outs[1][1];
        $util2 = $loadout_outs[1][2];
        $util3 = $loadout_outs[1][3];
        $util4 = $loadout_outs[1][4];

        var_dump($util4);

        return $app['twig']->render('loadout.html.twig', array('loadouts' => $load_outs));
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
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['height'] = $_POST['height'];
        $_SESSION['weight'] = $_POST['weight'];
        $_SESSION['eye_color'] = $_POST['eye_color'];
        $_SESSION['hair_color'] = $_POST['hair_color'];
        $_SESSION['skin_tone'] = $_POST['skin_tone'];
        $_SESSION['alignment'] = $_POST['alignment'];
        $_SESSION['other'] = $_POST['other_information'];

        return $app['twig']->render('summary.html.twig', array (

                'race' => $_SESSION['race'],

                'class' => $_SESSION['class'],

                'background' => $_SESSION['background'],

                'str' => $_SESSION['str'],
                'dex' => $_SESSION['dex'],
                'con' => $_SESSION['con'],
                'wis' => $_SESSION['wis'],
                'int' => $_SESSION['int'],
                'cha' => $_SESSION['cha'],

                'loadout' => $_SESSION['loadout'],

                'name' => $_SESSION['name'],
                'age' => $_SESSION['age'],
                'gender' => $_SESSION['gender'],
                'height' => $_SESSION['height'],
                'weight' => $_SESSION['weight'],
                'eye_color' => $_SESSION['eye_color'],
                'hair_color' => $_SESSION['hair_color'],
                'skin_tone' => $_SESSION['skin_tone'],
                'alignment' => $_SESSION['alignment'],
                'other_information' => $_SESSION['other_information'],

                'races' => Race::getAll(),
                'classes' => CharClass::getAll(),
                'backgrounds' => Background::getAll()));
    });


return $app;

?>
