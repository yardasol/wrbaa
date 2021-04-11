<?php
/*
 * Page_Operator is a class for displaying pages on the website, as well as
 * verifying and authorizing user access to the inside of the website
 *
 * TO DO:
 *  - Incorporate f3-access in all functions
 *  - implement javascript to streamline?
 *  - Create sign_up method for users to create an account
 */
  class Page_Operator extends Operator {
    private String $titlePrefix = "WRBAA - GCXCT&F Alumni Association - ";


    /*
     *_page_view extracts database records and sets hive variables for use in
     * HTML templates.
     *
     * TO DO:
     *  - Incorporate f3-access
     *  - Streamline
     */
    public function _page_view ( $f3 ) {
      $urlslug           = $this->f3->get('PARAMS.page'); //set the $urlslug variable
      $database_name     = $urlslug.'_database'; //set database name
      $database_filename = $database_name.'.json'; //set the database filename
      $data_organizer    = $urlslug.'_organizer.htm'; //set the data organizer
      $database = new \DB\Jig\Mapper($this->databases,$database_filename);

      //store the database in the SESSION for later use
      $this->f3->set('database',$database);
      $this->f3->copy('database','SESSION.database');

      //extract the database records without the record template
      $database_records=$database->find(array('@_id != ?', 'record_id'));

      //set hive variables for use in our HTML templates
      $this->f3->set('page_title', $this->titlePrefix.$urlslug);
      $this->f3->set('urlslug', $urlslug);
      $this->f3->set('database_records',$database_records);
      $this->f3->set('data_organizer',$data_organizer);
      $this->f3->set('page_organizer', 'wrbaa_organizer.htm');
    }

    /*
     * _page_login allows a user to log-in to gain access to the website
     *
     * TO DO:
     *  - Incorporate f3-access
     *  - Streamline
     */
    public function _page_login( $f3 ) {
      $this->f3->clear('SESSION');
      //$f3->user_session = new Session('NULL','csrf',$f3->get('user_sessioncache'));
  		//Initialize the logger, which will be used to log site activity
  		$this->f3->set('logger',new Log('tmp/logs/'.date($f3->get('logTitleFormat')).'.log'));
  		//$f3->get('logger')->write(date($f3->get('session')).': log initialized');
      $this->f3->copy('CSRF', 'SESSION.csrf');
      //$f3->copy('SESSION.csrf','CSRF');
      //echo $f3->get('SESSION.csrf');
      $this->f3->set('page_organizer','login_organizer.htm');
    }

    /*
     * verify_and_authorize checks the csrf token and checks that the username
     * and password exist in the database.
     *
     * TO DO:
     *  - Incorporate f3-access
     *  - implement in every page of the website
     */
    public function verify_and_authorize( $f3 ) {
      $token = $this->f3->get('POST.token');
      $csrf = $this->f3->get('SESSION.csrf');
      echo $this->f3->CSRF;
      echo 'token'.$token;
      echo 'csrf'.$csrf;
      if (empty($token) || empty($csrf) || $token!==$csrf){
        echo 'CSRF attack!';
        //echo $token;
        //echo $csrf;
        die();
      }
      else
      $users=new \DB\Jig\Mapper($this->databases,'users_database.json');
      $user = $users->find(array('(isset(@username) && @username == ?)', htmlspecialchars($this->f3->get('POST.usernameInput'))))[0];
      if($user["username"]) {
        if(password_verify(htmlspecialchars($this->f3->get('POST.passwordInput')), $user["password"])) {
          $this->f3->set('SESSION.user',$user["username"]);
          $this->f3->set('SESSION.initialized', 1);
          $this->f3->set('SESSION.logged_in', 1);
          //$f3->set('SESSION.id', $f3->get('SESSION.user').$f3->get('log'))
          $this->f3->reroute($this->f3->get('PARAMS.page').'/view');
        }
      }
    }

    /*
     * _page_logout logs-out a user from the website, preventing access.
     *
     * TO DO:
     *  - Currently does not work as intended, need to make work
     *  - Incorporate f3-access
     *  - Streamline
     */
    public function _page_logout( $f3 ) {
      $f3->clear('SESSION.logged_in');
      $f3->clear('session');
      $f3->reroute('/');
    }
  }
?>
