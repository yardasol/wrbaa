<?php
  class Login extends WRBAAPage {
    public String $pageName = "Login";

    public function get($f3) {
      $users = new \DB\Jig\Mapper($db,'users.JSON');
      $userList = $users->find(array('(isset(@username)');
      $auth = new \Auth($users, array('id'=>'username', 'pw'=>'password'));
      //if($login_result = $auth->login('
      if ($auth->basic()) {
        //store the name they logged in with
        $f3->set('SESSION.user', 'SERVER.PHP_AUTH_USER');
      }
      else {
        $f3->error(401);
      }
      //the following will display an HTTP 401 Unauthorized error page if unsuccessful
      $auth->basic();
      $f3->set('content','login.htm');
      $f3->set('title', join(" ", array($this->titleSuffix, $this->pageName)));
      echo Template::instance()->render('wrbaa.htm')`
    }
    //function post() {}
    //function put() {}
    //function delete {}
  }
?>
