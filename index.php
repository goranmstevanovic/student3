<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Show Table</title>
<!--
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php

//function __autoload($class){include_once($class.".php");}

include_once 'Database.php';
include_once 'student.php';
$obj=new Database;
$ocene=new Database;
$scool_board = new Database;
$ime_odbora = new Database;
$pr_ocena = new Database;

if(isset($_REQUEST['status'])){
    echo"Your Data Successfully Updated";
}

if(isset($_REQUEST['status_insert'])){
    echo"Your Data Successfully Inserted";
}

if(isset($_REQUEST['del_id'])){
    if($obj->deleteData($_REQUEST['del_id'],"students")){

        echo"Your Data Successfully Deleted";
    }
}
?>

<div class="container" style="style=" width:90%; margin-left:5%; margin-right:5%;">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button class="btn btn-secundary"><a href="index.php">Home</a></button>
        <button class="btn btn-secundary" ><a href="insert.php">Insert</a></button>
    </div>
    <h3 >All The Data</h3>
    <table width="1280" border="1" class='table table-hover table-responsive table-bordered' style=" width:100%; margin-left:0%; margin-right:0%;">
        <tr class="success">
			<th scope="col">Nr</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">JMBG</th>
            <th scope="col">Address</th>
            <th scope="col">School board</th>
            <th scope="col">Average grade</th>
            <th scope="col">Passed</th>
            <th scope="col">Action</th>
        </tr>
        <?php
            $a=0;
            foreach($obj->showData("students") as $kay =>$value)
            {
                    $a++;
                    extract($value);
                    ?>
                   <tr class="success">
                     <td align="center"><?php echo $a,"."; ?></td>
                     <td><?php echo $name; ?></td>
                     <td><?php echo $surname; ?></td>
                     <td><?php echo $jmbg; ?></td>
                     <td><?php echo $address; ?></td>
                     <td align="center">
                        <?php
                         echo $ime_sk_odbora = $ime_odbora->readname1($id_school_board);
                            if($id_school_board==0){echo"N.selected ";}
                        ?>
                    </td>
                     <td align="center">
                        <?php
                        $prosek="neocenjen";
                        $ocene = $pr_ocena->CSM_ocena($id);
                        $ocena[1]=$ocene['grade1'];
                        $ocena[2]=$ocene['grade2'];
                        $ocena[3]=$ocene['grade3'];
                        $ocena[4]=$ocene['grade4'];
                        if($id_school_board==1)
                         {

                            //var_dump($prosecna_ocena);
                            $sum=0;
                            $b=0;
                            echo $ocene['grade1'],"<br/>",$ocene['grade2'],"<br/>",$ocene['grade3'],"<br/>",$ocene['grade4'],"<br/>";
                            if($ocene['grade1']>=5){$sum = $sum+$ocene['grade1']; $b++; }
                            if($ocene['grade2']>=5){$sum = $sum+$ocene['grade2']; $b++; }
                            if($ocene['grade3']>=5){$sum = $sum+$ocene['grade3']; $b++; }
                            if($ocene['grade4']>=5){$sum = $sum+$ocene['grade4']; $b++; }

                            if($b > 0){
                                $prosek=$sum/$b;
                                $prosek=round($prosek,2);
                            }else{
                                $prosek="neocenjen";
                            }
                         }else
                             {
                                 if($id_school_board==2)
                                    {
                                      echo $ocene['grade1'],"<br/>",$ocene['grade2'],"<br/>",$ocene['grade3'],"<br/>",$ocene['grade4'],"<br/>";
                                      $sum=0;
                                      $b=0;
                                      $min=$ocena[1];
                                      $min_index=1;
                                        for ($io=2; $io<=4; $io++)
                                        {
                                            if ($ocena[$io] < $min && $ocena[$io] >=5 )
                                            {
                                                $min = $ocena[$io];
                                                $min_index = $io;
                                            }
                                        }
                                         for ($io2=1; $io2<=4; $io2++)
                                         {
                                             if($ocena[$io2]>=5 && $io2 != $min_index ){
                                                 $sum=$sum+$ocena[$io2];
                                                 $b++;
                                             }
                                         }
                                        if($b > 0){
                                            $prosek=$sum/$b;
                                            $prosek=round($prosek,2);
                                        }else{
                                            $prosek="neocenjen";
                                        }


                                    }


                            }

                             echo"<b>", $prosek,"</b>";
                         ?>


                     </td>
                        <td>
                            <?php
                                if($id_school_board==1){
                                    if($prosek>=7){echo"<img src=\"ok.png\" style='width:48px;'>";}
                                    else{
                                        if ( $prosek != "neocenjen" ) {
                                            echo "<img src=\"nook.jpg\" style='width:48px;'>";
                                        }
                                    }
                                }else {
                                    if ($id_school_board == 2) {
                                        if ($prosek >= 8) {
                                            echo "<img src=\"ok.png\" style='width:48px;'>";
                                        } else {
                                            if ( $prosek != "neocenjen" ) {
                                                echo "<img src=\"nook.jpg\" style='width:48px;'>";
                                            }
                                        }

                                    }
                                }
                                if($prosek=="neocenjen"){echo"<img src=\"unrates.jpg\" style='width:48px;'>";}
                            ?>
                           <!-- <img src="image/ok.png" style='width:48px;'> -->
                        </td>
                        <td><button class="btn"><a href="update.php?id=<?php echo $id; ?> ">Edit</a></button>
                            &nbsp;&nbsp;<button class="btn"><a href="index.php?del_id=<?php echo $id; ?>">Delete</a></button></td>'
                    </tr>
                <?php
            }
                ?>
        <tr class="success">
            <th scope="col" colspan="9" align="right">
                <div class="btn-group">
                    <button class="btn"><a href="insert.php">Insert New Data</a></button>
                </div>
            </th>

        </tr>
    </table>
</div>
</body>
</html>
