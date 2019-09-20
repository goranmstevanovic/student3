<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Insert Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php
//function __autoload($class){include_once($class.".php");}
include_once 'Database.php';
include_once 'student.php';

$database = new Database();
$db = $database;

// pass connection to objects


$obj = new Database;
$scool_board = new Database;

if(isset($_REQUEST['id_school_board']))
{
    extract($_REQUEST);

    //sleep(5);
    if($obj->insertData1($name,$surname,$jmbg,$address, $id_school_board,"students")){
        header("location:index.php?status_insert=success");
    }

}
?>

 <div class="container">
     <div class="btn-group">
        <button class="btn"><a href="index.php">Home</a></button>
     </div>
     <h3>Insert Your Data</h3>
     <form action="insert.php" method="post">
         <table width="800" class='table table-hover table-responsive table-bordered'>
         <tr>
             <th scope="row">Id</th>
             <td><input type="text" name="id" value="" readonly="readonly"></td>
         </tr>
         <tr>
             <th scope="row">Name:</th>
             <td><input type="text" name="name" value=""></td>
         </tr>
         <tr>
             <th scope="row">Surname:</th>
             <td><input type="text" name="surname" value=""></td>
         </tr>
         <tr>
             <th scope="row">JMBG:</th>
             <td><input type="text" name="jmbg" value=""></td>
         </tr>
         <tr>
             <th scope="row">Address:</th>
             <td><textarea rows="1" cols="25" name="address"></textarea></td>
         </tr>
             <th scope="row">School Board:</th>
          <td>
             <?php
             // read the scool boards from the database
             $stmt = $scool_board->read("school_boards");

             // put them in a select drop-down
             echo "<select class='form-control' name='id_school_board'>";
             echo "<option>Select School board...</option>";

             while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){     // Citanje jedne po jedne vrste  iz $smtp i mecanje u $rowcategory
                 extract($row_category);                                 //ekstrakovanje na pojedniacne zapise unutar vrste
                 echo "<option value='{$id}'>{$name}</option>";           // vrednost z prenos je $id a prikazuje se $name, to jest ime
             }

             echo "</select>";
             ?>
          </td>
          <tr>

         <td><input type="submit" name="insert" value="Insert" class="btn" style=" margin-left: 0px;"></td>
         </tr>
         </table>
     </form>
</div>


</body>
</html>
