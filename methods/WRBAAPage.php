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
