<?php

/*
 * Operator is a parent class for other operators
 *
 * TO DO:
 *  - Incorporate f3-access in all functions
 *  - implement javascript to streamline?
 *	- Implement proper CSRF token generation
 */
class Operator {
	protected $f3;
	protected	$databases;
	/*
	function beforeroute () {
		$f3=Base::instance();

		if ( strcmp(strtok($f3->get('PATH'), '/')[1], 'login') !=0 ) {
			if ( !($f3->get( 'SESSION.logged_in' ))) {
				$f3->reroute('/home/login');
			}
			else {

			}
		}

	}
	*/

	/*
	 * afterroute runs after routing to a URL. In this case it simply renders
	 * the HTML.
	 */
	function afterroute ( $f3 ) {
		//echo $this->f3->get('PATH');
		echo Template::instance()->render('page_outline.htm');
	}

	//! Instantiate class
	//Using a parent class with the __construct() method seems to allow the CSRF
	//token checking to work, not sure why this is though...
	function __construct () {
		$this->f3 = Base::instance();
		// Set up Jig databases, which will hold the majority of our resources,
		// and paths to multimedia resources
		$this->databases = new DB\Jig($this->f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$this->f3->cache= \Cache::instance($this->f3->get('CACHEPATH')); // Default cache (the one defined by the CACHE variable)
		$this->f3->session_cache=new Cache($this->f3->get('SESSIONPATH')); // Session cache
		$this->f3->session = new Session(NULL,'CSRF',$session_cache);
		$this->f3->CSRF = $this->f3->session->csrf();

		/* ---IGNORE BELOW THIS LINE--- */

		/*$events_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$history_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$lore_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$home_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$news_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$people_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$photos_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$stories_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		$users_database = new DB\Jig($f3->get('DATABASEPATH'), \DB\Jig::FORMAT_JSON);
		*/
		//$this->f3->clear('SESSION');
		//$this->f3->set('user_sessioncache',new Cache('folder=tmp/cache/sessions/')); // Session cache
		//Initialize the session cache, which will be used for storing session data
		//$this->f3->set('user_session', new Session('NULL','csrf',$this->f3->get('user_sessioncache')));

	}

}
