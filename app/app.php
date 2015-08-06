<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/tomagatchi.php";

  session_start();
  if (empty($_SESSION['tomagatchi_data'])) {
    $_SESSION['tomagatchi_data'] = array();
  }

  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
  ));

  $app->get("/", function() use ($app) {
      return $app['twig']->render('tomagatchis.html.twig', array('tomagatchis' => Tomagatchi::getAll())); //array('tomagatchis' => Tomagatchi::getAll()));
  });

  $app->post("/tomagatchis", function() use ($app) {
    $tomagatchi = new Tomagatchi($_POST['name']);
    $tomagatchi->save();
    return $app['twig']->render('create_tomagatchi.html.twig', array('newtomagatchi' => $tomagatchi));
  });

  $app->post("/delete_tomagatchis", function() use ($app) {
    Tomagatchi::deleteAll();
    return $app['twig']->render('delete_tomagatchis.html.twig');
  });

  return $app;
?>

