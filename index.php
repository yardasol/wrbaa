<?php
/* index.php

<one line to give the program's name and a brief idea of what it does.>
Copyright (C) 2020 Oleksandr Yardas
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/


// Kickstart the framework
/*
require '../vendor/autoload.php';
$f3= \Base::instance();
*/
$f3=require('packages/fatfree-core/base.php');

// Load configuration
$f3->config('configs.ini');

// the @page token is passed as the second argument to the get funciton of
// WRBAAPage.
$f3->route('GET /@page','WRBAAPage->get');

// Set up Jig databases
$f3->set('archivesDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('eventsDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('historyDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('loreDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('homeDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('newsDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('peopleDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('photosDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('storiesDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));
$f3->set('usersDB',new DB\Jig('app/resources/', \DB\Jig::FORMAT_JSON));


$f3->run();
