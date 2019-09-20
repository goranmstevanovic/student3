<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
function __autoload($class)
{
    include_once($class.".php");
}

$obj=new Database;
$ocene=new Database;
$broj_vrsta= new Database;
$scool_board = new Database;

if(isset( $_REQUEST['update']) )   // ovo se odnosi na submit form u ovom fajlu dole
{
    extract($_REQUEST);
     if($obj->update($id,$name,$surname,$jmbg,$address,$id_school_board,"students" ))
	{
      	if($broj_vrsta->count_column($id,"school_grades") == 0)
        {
			if($ocene->insertDataSchool_grades($id,$grade1,$grade2,$grade3,$grade4 ))
			{
			    header("location:index.php?status=success");
			}
        }else{
			if($ocene->updateDataSchool_grades($id,$grade1,$grade2,$grade3,$grade4 ))
			{
			 header("location:index.php?status=success");
			}
		}


    }
}


extract($obj->getById($_REQUEST['id'],"students"));
if($ocene->getByIdOcene($_REQUEST['id'])==TRUE)
{
  extract($ocene->getByIdOcene($_REQUEST['id']),EXTR_PREFIX_ALL,"ocene");
	//echo "<br/> Ocene su:", $grade1,$grade2, $grade3, $grade4, "<br/>";
   // var_dump($ocene);
}
/*
echo "<br/> ocene: ", var_dump($ocene->getByIdOcene($_REQUEST['id'])), "<br/>";
echo "Ovaje request je:",var_dump($_REQUEST['id']),"<br/>";
echo "<br/> OBJ   : ", var_dump($obj),"<br/>";    */

//echo "<br/>request od udate:", var_dump($_REQUEST['update']),"<br/>";
//echo"<br/>samo request  je:", $_REQUEST['id_school_board'];

?>
<div class="container">
     <div class="btn-group">
        <button class="btn"><a href="index.php">Home</a></button>
     </div>
     <h3>Edit Your Data</h3>
     <form action="update.php" method="post">
         <table   class='table table-hover table-responsive table-bordered' >
             <tr >
                 <th scope="row">Id</th>
                 <td><input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Name</th>
                 <td><input type="text" name="name" value="<?php echo $name; ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Surname</th>
                 <td><input type="text" name="surname" value="<?php echo $surname;  ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">JMBG</th>
                 <td><input type="text" name="jmbg" value="<?php echo $jmbg; ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Address</th>
                 <td><textarea rows="1" cols="25" name="address"  class='form-control'><?php echo $address; ?></textarea></td>
             </tr>
             <tr>
                 <td>School Board</td>
                 <td>
                     <?php
                     $stmt = $scool_board->read("school_boards");          // Sve kategorije ih procitamo metodom: read() i smestimo u stmt

                     // put them in a select drop-down
                     echo "<select class='form-control' name='id_school_board'>"; // select struktura

                     echo "<option>Please select...</option>";
                     while ($row_board = $stmt->fetch(PDO::FETCH_ASSOC)) // pojedinacno citanje vrsta iz $smtp  i smestanje u $row_category
                     {
                         $board_id=$row_board['id'];
                         $board_name = $row_board['name'];

                         // current category of the product must be selected
                         if($board_id==$id_school_board)
                         {
                             echo "<option value='$board_id' selected>";
                         }else{
                             echo "<option value='$board_id'>";
                         }

                         echo "$board_name</option>";
                     }
                     echo "</select>";
                     ?>
                 </td>
             </tr>

            <tr>
                 <th scope="row">Id</th>
                 <td><input type="text" name="id_student" value="<?php echo $id; ?>" readonly="readonly"  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Grade1</th>
                 <td><input type="number"  min="5" max="10" name="grade1" value="<?php if(isset($ocene_grade1)){ echo $ocene_grade1;} ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Grade2</th>
                 <td><input type="number"  min="5" max="10" name="grade2" value="<?php if(isset($ocene_grade2)){ echo $ocene_grade2;} ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Grade3</th>
                 <td><input type="number"  min="5" max="10" name="grade3" value="<?php if(isset($ocene_grade3)){ echo $ocene_grade3;} ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">Grade4</th>
                 <td><input type="number"  min="5" max="10" name="grade4" value="<?php if(isset($ocene_grade4)){ echo $ocene_grade4;} ?>" required  class='form-control'></td>
             </tr>
             <tr>
                 <th scope="row">&nbsp;</th>
                 <td><input type="submit" name="update" value="Update" class="btn"></td>
             </tr>
         
         
        </table>   
     
     
     </form>
</div>


</body>
</html>
