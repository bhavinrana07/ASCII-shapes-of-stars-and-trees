<?php

class Model {

	function __construct() {
		if(!empty(DB_TYPE) && !empty(DB_HOST) && !empty(DB_NAME))
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

}