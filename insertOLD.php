<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Insert Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php
function __autoload($class){
    include_once($class.".php");

}
$obj=new Database;

if(isset($_REQUEST['insert']))
{
    extract($_REQUEST);
    if($obj->insertData($name,$surname,$jmbg,$address,"students")){
        header("location:index.php?status_insert=success");
    }
}

?>
<div class="container">
     <div class="btn-group">
        <button class="btn"><a href="index.php">Home</a></button>
     </div>
     <h3>Insert Your Data</h3>
     <form action="insertOLD.php" method="post">
         <table width="400" class="table-borderd">
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
         <tr>
         <th scope="row">&nbsp;</th>
         <td><input type="submit" name="insert" value="Insert" class="btn"></td>
         </tr>
         </table>
     </form>
</div>


<body>




















































</body>
</html>
