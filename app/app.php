<?php
    require_once __DIR__."/../vendor/autoload.php";
     require_once __DIR__."/../src/Race.php";
     require_once __DIR__."/../src/CharClass.php";


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
        return $app['twig']->render('home.html.twig');
    });


//race page
    //renders race page
    $app->get('/race', function() use ($app)
    {
        return $app['twig']->render('race.html.twig', array('races' => Race::getAll()));
    });

    //carry race id to class page
    $app->post('/race', function() use ($app)
    {
        $race_id = $_POST['race_id'];
        return $app['twig']->render('class.html.twig', array('race' => Race::getAll(), 'classes' => CharClass::getAll()));
    });


//class page
    //renders class page
    $app->get('/class', function() use ($app)
    {
        return $app['twig']->render('class.html.twig', array('classes' => CharClass::getAll()));
    });


//background page
    //renders background page


//stats page
    //renders stat page


//skills page
    //renders skills page


//summary page
    //renders summary page



return $app;

?>
