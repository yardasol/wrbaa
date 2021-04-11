<?php

// Kickstart the framework
/*
require '../vendor/autoload.php';
$f3= \Base::instance();
*/
$f3=require('packages/fatfree-core/base.php');

// Load configuration
$f3->config('configs.ini', TRUE);

// Set up Jig databases
$f3->set('archivesDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('eventsDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('historyDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('loreDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('homeDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('newsDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('peopleDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('photosDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('storiesDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));
$f3->set('usersDB',new DB\Jig('app/resources/db/', \DB\Jig::FORMAT_JSON));

// the @page token is passed as the second argument to the get funciton of
// WRBAAPage. I do not know why this works but it does.
$f3->route('GET /@page','WRBAAPage->get');


$f3->run();
