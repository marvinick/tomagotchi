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
      return $app['twig']->render("tomagatchi.html.twig", array('tomagatchis' => Tomagatchi::getAll));
  })

?>
