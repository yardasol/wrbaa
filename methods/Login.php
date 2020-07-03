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
