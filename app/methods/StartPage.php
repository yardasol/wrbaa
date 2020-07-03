 <?php
/* Login.php

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


  class StartPage {
    public String $pageName = "Start";

    //public function beforeRoute($f3) {
    //  echo Template::instance()->render('start.htm');
    // }


    public function get($f3) {
      echo Template::instance()->render('start.htm');
      //(if(isset($_POST['submit']))){
      //  $passwordHash = password_hash(htmlspecialchars($_POST['password']),PASSWORD_ARGON2ID);
      //  $usernameHash = password_hash(htmlspecialchars($_POST['username']),PASSWORD_ARGON2ID);
      //  $f3->map('/','StartPage');
      //}
    }


    public function post($f3) {
     //echo password_hash('testPassword',PASSWORD_ARGON2ID);
     $usersDB=new \DB\Jig\Mapper($f3->get('usersDB'),'usersDB.json');
      /*
     $usersDB->reset();
     $usersDB->username = 'testUser';
     $usersDB->password = password_hash('testPassword', PASSWORD_ARGON2ID);
     $usersDB->save();
     */

     //echo $usersDB->count(array('(isset(@username) && @username == ?)', htmlspecialchars($_POST['usernameInput'])));
     $user = $usersDB->find(array('(isset(@username) && @username == ?)', htmlspecialchars($_POST['usernameInput'])));
     if($user[0]["username"]) {
       if(password_verify(htmlspecialchars($_POST['passwordInput']), $user[0]["password"])) {
         $f3->reroute('home');
       }
     }
   }
 }
?>
