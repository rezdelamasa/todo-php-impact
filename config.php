<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
	class Config {
	  // Database Details
	  private $db_host = 'localhost';
	  private $db_user = 'root';
	  private $db_name = 'todo';
	  private $db_pass = '';
	  // Data Source Network
	  // conn variable
	  protected $conn = null;

	  // Constructor Function
	  public function __construct() {
	    try {
            $dsn = "mysql:host=$this->db_host;dbname=$this->db_name";
	        $this->conn = new PDO($dsn, $this->db_user);
	      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection error " . $e->getMessage();
            exit;
        }
	  }
	}