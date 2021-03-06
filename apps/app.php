<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use($app){
        $stylists = Stylist::getAll();
        $clients = Client::getAll();

        return $app['twig']->render('index.html.twig', array('stylists' => $stylists, 'clients' => $clients));
    });

    $app->get("/delete/all/", function() use($app){
        $stylists = Stylist::getAll();
        $clients = Client::getAll();

        return $app['twig']->render('deleteAll.html.twig', array('stylists' => $stylists, 'clients' => $clients));
    });

    $app->delete('/delete/all/stylist', function() use($app){
        Client::deleteAll();
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    // CRUD for stylist
    $app->get("/stylist/{id}", function($id) use($app){
        $found_client = Client::search($id);
        $stylist = Stylist::getStylistId($id);
        $stylists = Stylist::getAll();

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $found_client, 'stylists' => $stylists));
    });

    $app->post("/add/stylist", function() use($app){
        $new_stylist = new Stylist($_POST['stylist_name'], $_POST['id']);
        $new_stylist->save();
        $stylists = Stylist::getAll();
        $clients = Client::getAll();

        return $app['twig']->render('index.html.twig', array('stylists' => $stylists,  'clients' => $clients));
    });

    $app->patch('patch/stylist/{id}', function($id) use($app){
        $stylist = Stylist::getStylistId($id);
        $stylist->update($_POST['new_stylist_name']);
        $stylists = Stylist::getAll();
        $clients = Client::getAll();

        return $app['twig']->render('index.html.twig', array('stylists' => $stylists, 'clients' => $clients));
    });

    $app->delete('delete/stylist/{id}', function($id) use($app){
        $stylist = Stylist::getStylistId($id);
        $stylist->delete();
        $stylists = Stylist::getAll();
        $clients = Client::getAll();

        return $app['twig']->render('index.html.twig', array('stylists' => $stylists, 'clients' => $clients));
    });

    // CRUD for client
    $app->get("/client/{id}", function($id) use($app){
        $client = Client::getClientById($id);
        $stylist = Stylist::getStylistId($id);
        $stylists = Stylist::getAll();

        return $app['twig']->render('client.html.twig', array( 'stylists' => $stylists, 'stylist' => $stylist, 'client' => $client));
    });

    $app->post('/add/client', function() use($app){
        $new_client = new Client($_POST['name'], $_POST['id'], $_POST['stylist_id']);
        $new_client->save();
        $stylists = Stylist::getAll();
        $clients = Client::getAll();

        return $app['twig']->render('index.html.twig', array('stylists' => $stylists, 'clients' => $clients));
    });

    $app->post('/add/stylist/client/{id}', function($id) use($app){
        $stylist = Stylist::getStylistId($id);
        $new_client = new Client($_POST['name'], $POST['id'], $_POST['stylist_id']);
        $new_client->save();
        $stylists = Stylist::getAll();
        $found_client = Client::search($id);

        return $app['twig']->render('stylist.html.twig', array('stylists' => $stylists,'stylist' => $stylist, 'clients' => $found_client));
    });

    $app->patch('/patch/client/{id}', function($id) use($app){
        $client = Client::getClientById($id);
        $client[0]->update($_POST['new_name'], $_POST['new_stylist_id']);
        $stylists = Stylist::getAll();

        return $app['twig']->render('client.html.twig', array('client' => $client, 'stylists' => $stylists));
    });

    $app->delete('/delete/client/{id}', function($id) use($app){
        $client = Client::getClientById($id);
        $client[0]->delete();

        return $app['twig']->render('deleted.html.twig');
    });

    return $app;

 ?>
