<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Race.php";
    require_once __DIR__."/../src/CharClass.php";
    require_once __DIR__."/../src/Background.php";
    require_once __DIR__."/../src/stat.php";
    require_once __DIR__."/../src/Skill.php";
    require_once __DIR__."/../src/Description.php";
    require_once __DIR__."/../src/Character.php";

    session_start();
    if (empty($_SESSION['temporary_character'])) {
        $_SESSION['temporary_character'] = array();
    }

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
    $app->get('/', function() use ($app)
    {
        return $app['twig']->render('home.html.twig', array('characters' => Character::getAll()));
    });


//race page
    //renders race page
    $app->get('/race', function() use ($app)
    {
        return $app['twig']->render('race.html.twig', array('races' => Race::getAll()));
    });

    //carry race id to class page
    $app->post('/class', function() use ($app)
    {
        $race = ($_POST['race_id']);


        // setcookie($race, time() + 60*60*24*30);
        // $new_temporary_character = new TemporaryCharacter ($race)
        // $new_temporary_character->sessionSave();

        var_dump('race = ' . $race);
        return $app['twig']->render('class.html.twig', array('races' => Race::getAll(), 'race_id' => $race, 'classes' => CharClass::getAll()));
    });


//class page
    //carry race id and class id to background page
    $app->post('/background', function() use ($app)
    {
        $race = $_GET['race_id'];
        $class = $_POST['class_id'];


        // setcookie($race, $class, time() + 60*60*24*30);

        var_dump($race);
        var_dump($class);
        return $app['twig']->render('background.html.twig', array('races' => Race::getAll(), 'race_id' => $_GET['race_id'], 'classes' => CharClass::getAll(), 'backgrounds' => Background::getAll()));
    });



//background page
    //carry race id, class id, background id to stats page
    $app->post('/stats', function() use ($app)
    {
        $race = $_GET['race_id'];
        $class = $_GET['class_id'];
        $background = $_POST['background_id'];



        var_dump($_COOKIE['race = ' . $race]);
        var_dump($_COOKIE['race = ' . $class]);
        var_dump($_COOKIE['background = ' . $background]);
        // $race_id = $_POST['race_id'];
        // $class_id = $_POST['class_id'];
        // $background_id = $_POST['background_id'];
        // setcookie($race, $class, $background, time() + 60*60*24*30);

        // //Add stat roll logic here

        return $app['twig']->render('stats.html.twig', array('races' => Race::getAll(), 'classes' => CharClass::getAll(), 'backgrounds' => Background::getAll(), 'stat' => stat::getAll()));
    });

//stats page
    //carry race id, class id, background id, stats id to skills page
    $app->post('/stats', function() use ($app)
    {
        $race_id = $_POST['race_id'];
        $class_id = $_POST['class_id'];
        $background_id = $_POST['background_id'];
        return $app['twig']->render('stats.html.twig', array('races' => Race::getAll(), 'classes' => CharClass::getAll(), 'backgrounds' => Background::getAll()));
    });
//
//
// //skills page
//     //carry race id, class id, background id, stats id, skill id to skills page
//     $app->post('/stats', function() use ($app)
//     {
//         $race_id = $_POST['race_id'];
//         $class_id = $_POST['class_id'];
//         $background_id = $_POST['background_id'];
//         return $app['twig']->render('stats.html.twig', array('races' => Race::getAll(), 'classes' => CharClass::getAll(), 'backgrounds' => Background::getAll()));
//     });
//
//
// //summary page
//     //carry race id, class id, background id, stats id, skill id to skills page
//     $app->post('/stats', function() use ($app)
//     {
//         $race_id = $_POST['race_id'];
//         $class_id = $_POST['class_id'];
//         $background_id = $_POST['background_id'];
//         return $app['twig']->render('stats.html.twig', array('races' => Race::getAll(), 'classes' => CharClass::getAll(), 'backgrounds' => Background::getAll()));
//     });


return $app;

?>
