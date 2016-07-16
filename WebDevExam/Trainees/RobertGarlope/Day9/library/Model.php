<?php

class Model extends Database
{
	public $db;
	public function __construct()
	{
		$this->db = $this->dbConnect();
	}
}
