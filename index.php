<?php
// Kickstart the framework
/*
require '../vendor/autoload.php';
$f3= \Base::instance();
*/
$f3=require('lib/base.php');

// Load configuration
$f3->config('configs.ini');

// the @page token is passed as the second argument to the get funciton of
// WRBAAPage.
$f3->route('GET /@page','WRBAAPage->get');

// Set up Jig databases
$f3->set('archivesDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('eventsDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('historyDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('loreDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('homeDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('newsDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('peopleDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('photosDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('storiesDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));
$f3->set('usersDB',new DB\Jig('resources/', \DB\Jig::FORMAT_JSON));


$f3->run();
