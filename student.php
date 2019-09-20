<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 7.9.2019
 * Time: 13:52
 */

class student
{
    // database connection and table name
    private $conn;
    private $table_name = "students";

    // object properties
    public $id;
    public $name;
    public $surname;
    public $jmbg;
    public $address;
    public $id_school_board;
    public $grade1;
    public $grade2;
    public $grade3;
    public $grade4;

    // constructor with $db as database connection
    public function __construct($dbname){
        $this->conn = $dbname;
    }

  /*  function read(){

        // select all query
        $query = "SELECT * FROM `students`";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

   */

}