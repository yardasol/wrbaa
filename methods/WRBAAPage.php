/*
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
                              
<?php
  class WRBAAPage {
    private String $titlePrefix = "WRBAA - GCXCT&F Alumni Association - ";

    //the #$page formal parameter will pass a token that is the string
    //representation of the URI. This allows us to use a single .htm
    //file as a template for the entire website, switching the directory
    //we use each time
    public function get($f3,$page) {
      $page = trim($page[0], '/'); //remove the '/' from the front of $page
      $pageDB = join(array($page,'DB'));
      $pageDBFile = join(array($pageDB,'.json'));
      $pageFile = join(array($page, '.htm'));

      $pageDBItems=new DB\Jig\Mapper($f3->get($pageDB),$pageDBFile);
      $pageDBItems=$pageDBItems->find();
      $f3->set('content',$pageFile);
      $f3->set(join(array($pageDB,'Items')),$pageDBItems);
      $f3->set('title', join(array($this->titlePrefix, $page)));
      echo Template::instance()->render('wrbaa.htm');
    }

    public function post($f3,$page) {

    }
    //public function put() {}
    //public function delete {}
  }
?>
