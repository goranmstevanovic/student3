<?php




class Database
{
     private $host="localhost";
     private $username="root";
     private $dbname="students";
     private $password="";
     private $conn;


     public function __construct()
     {
         $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
		 
     }



    // get the database connection



     public function showData($table)
     {

         $sql="SELECT * FROM $table";
         $q = $this->conn->query($sql) or die("failed!");

         while($r = $q->fetch(PDO::FETCH_ASSOC))
         {
            $data[]=$r;
         }
         return $data;
     }


    public function count_column($id,$table)
    {
        $sql = "SELECT count(*) FROM $table WHERE id_student = $id";
        $result = $this -> conn->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

     public function getById($id,$table)
     {

         $sql="SELECT * FROM $table WHERE id = :id";
         $q = $this->conn->prepare($sql);
         $q->execute(array(':id'=>$id));
         $data = $q->fetch(PDO::FETCH_ASSOC);
         return $data;
     }

    public function getByIdOcene($id)
    {
        $sql="SELECT * FROM `school_grades` WHERE id_student= :id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$id));
        $data1 = $q->fetch(PDO::FETCH_ASSOC);
        return $data1;
    }

     public function update($id,$name,$surname,$jmbg,$address,$id_school_board,$table)
     {

        $sql = "UPDATE $table
         SET name=:name,surname=:surname,jmbg=:jmbg,address=:address,id_school_board=:id_school_board
         WHERE id=:id";
         $q = $this->conn->prepare($sql);
         $q->execute(array(':id'=>$id,':name'=>$name,':surname'=>$surname,':jmbg'=>$jmbg,':address'=>$address,':id_school_board'=>$id_school_board));
         return true;

     }

     public function insertData($name,$surname,$jmbg,$address,$table1)
     {

         $sql1 = "INSERT INTO $table1 SET name=:name, surname=:surname, jmbg=:jmbg, address=:address ";
         $q1 = $this->conn->prepare($sql1);
         $q1->execute(array(':name'=>$name,':surname'=>$surname,':jmbg'=>$jmbg,':address'=>$address ));

         return true;
     }
	 
	 public function insertData1($name,$surname,$jmbg,$address,$id_school_board,$table1)
     {

         $sql1 = "INSERT INTO $table1 SET name=:name, surname=:surname, jmbg=:jmbg, address=:address, id_school_board=:id_school_board ";
         $q1 = $this->conn->prepare($sql1);
         $q1->execute(array(':name'=>$name,':surname'=>$surname,':jmbg'=>$jmbg,':address'=>$address,':id_school_board'=>$id_school_board ));

         return true;
     }
	 
	public function test($id_student)
    {

       $sql_provera="SELECT * FROM `school_grades` WHERE `id_student`='$id_student'";
        $q_provera = $this->conn->prepare($sql_provera);
        $count = $q_provera->rowCount();
        echo "uuuuuuuuuuuuu",$count,"<br/>";
		
        return $count;
    } 

    public function insertDataSchool_grades($id_student,$grade1,$grade2,$grade3,$grade4)
    {
        $sql1 = "INSERT INTO school_grades (id_student,grade1,grade2,grade3,grade4) VALUES (?,?,?,?,?)";

         $q1 = $this->conn->prepare($sql1);
         $q1->execute([$id_student,$grade1,$grade2,$grade3,$grade4]);
        if($q1){
            return true;
        }else{
            echo "\nPDO::errorInfo():\n";
            print_r($q1->errorInfo());
            return false;
        }

    }


    public function updateDataSchool_grades($id_student,$grade1,$grade2,$grade3,$grade4)
    {

      $sql = "UPDATE `school_grades` set id_student=?,  grade1=?, grade2=?, grade3=?,grade4=? WHERE id_student=? ";
        $q1 = $this->conn->prepare($sql);

       $q1->execute([$id_student,$grade1,$grade2,$grade3,$grade4,$id_student]);
        if($q1){
            return true;
        }else{

            return false;
        }

    }

     public function deleteData($id,$table)
     {

         $sql="DELETE FROM $table WHERE id=:id";
         $q = $this->conn->prepare($sql);
         $q->execute(array(':id'=>$id));
         return true;
     }

    function read($table_name){
        //select all data
        $query = "SELECT
                    id, name
                FROM
                    " . $table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    function readName($table_name){

        $query = "SELECT name FROM " . $table_name . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }

    function readName1($id){

        $query = "SELECT name FROM `school_boards` WHERE id = '$id'";

        $stmt = $this->conn->prepare( $query );
       // $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['name'];
    }

    function CSM_ocena($id){

        $query = "SELECT grade1, grade2, grade3, grade4 FROM `school_grades` WHERE id_student = '$id'";

        $stmt = $this->conn->prepare( $query );
        // $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }





}

?>
