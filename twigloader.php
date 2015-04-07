<?php

require_once("Libraries/Twig/Autoloader.php");

$autoloader = Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/Presentation");
$twig = new Twig_Environment($loader, array('debug'=>true, 'strict_variables' => false));
$twig->addExtension(new Twig_Extension_Debug);


