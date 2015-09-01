<?php
    require_once __DIR__."/../vendor/autoload.php";
    // require_once __DIR__."/../src/Brand.php";
    // require_once __DIR__."/../src/Store.php";


    $app = new Silex\Application();
    $app['debug'] = true;


    // $server = 'mysql:host=localhost;dbname=dnd';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);


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
        return $app['twig']->render('race.html.twig');
    });


return $app;

?>
