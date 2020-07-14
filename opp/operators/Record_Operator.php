<?php
 /*
  * Record_Operator is a class for adding, editing, and removing database
  * records from the website.
  */
  class Record_Operator extends Operator {
    //private $record_id; //
    //private $record; //

    /*
     * _record_edit allows a user to edit each field of a record
     *
     * TO DO:
     *  - Incorporate f3-access
     *  - Streamline
     */
    function _record_edit() {
      //Get the record id of the record we want to edit
      $record_id = $this->f3->get('PARAMS.record_id');

      //Get the record whose id matches record_id
      $record = $this->f3->get('SESSION.database')->find(array('@_id = ?', $record_id))[0];

      $this->f3->set('page_title','Record Editor'); //Set the page title
      $this->f3->set('page_organizer', 'recordeditor_organizer.htm'); //Set the page_organizer
      $this->f3->set('record',$record->cast()); //Convert the record into a hierarchal array.
    }

    /*
     * _record_add adds a record to the database, which will be displayed as
     * an entry in the page if it is saved.
     *
     * TO DO:
     *  - Incorporate f3-access
     *  - Implement way to cancel the adding of a record
     *  - Find way to streamline/integrate with _record_edit
     */
    function _record_add() {
      //Get the appropriate database
      $records = $this->f3->get('SESSION.database');

      //Get the record template, which is the first record in the database.
      $record_template = $records->load()->cast();

      //Insert a new record into the database
      $records->reset();
      $records->insert();
      $record_id = $records->_id;
      foreach ( $record_template as $record_field => $field_value ) {
        //if ( strcmp( $record_field, '_id' ) == 0 ) {
          $records[$record_field] = $field_value;
        //}
      }
      $records->save();
      $this->f3->set('page_title','Record Editor');
      $this->f3->set('page_organizer', 'recordeditor_organizer.htm');
      $this->f3->set('record',$records->cast());
    }

    /*
     * _record_save saves the changes to a record
     *
     * TO DO:
     *  - Streamline
     */
    function _record_save() {
      //Check if the user clicked 'Submit' or 'Cancel'
      if($this->f3->get('POST.button') == "Submit") {
        $record_id = $this->f3->get('POST._id'); //Get the record id
        $record = $this->f3->get('SESSION.database')->find(array('@_id = ?', $record_id))[0];
        //Set each record field to the passed value
        foreach ($this->f3->get('POST') as $record_field => $field_value) {
          $record->$record_field = $field_value;
        }
        //Update the record
        $record->update();
      }
      //Return to the page
      $this->f3->reroute($this->f3->get('PARAMS.page').'/view');

    }

    /*
     * _record_remove removes a record from the database
     *
     * TO DO:
     *  - Implement double-check with user
     *  - Incorporate f3-access
     */
    function _record_remove() {
      //Check if the user clicked 'Submit' or 'Cancel'
      //if($this->f3->get('POST.button') == "Confirm") {
        $record_id = $this->f3->get('PARAMS.record_id'); //Get the record id
        $record = $this->f3->get('SESSION.database')->find(array('@_id = ?', $record_id))[0];
        $record->erase(); //Erase the record
      //}
      //Return to the page
      $this->f3->reroute($this->f3->get('PARAMS.page').'/view');
    }

  }

?>
