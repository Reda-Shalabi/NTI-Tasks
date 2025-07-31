<?php
header("Connection-Type: application/json") ;
include "db.php" ;
$courses=[] ;
if (isset($_GET['id'])&&$_GET['id']==null){
    $id= $_GET['id'];
    $sql="SELECT * from courses where id=$id " ;
    $result=mysqli_query($conn,$sql) ;
    while ($row=mysqli_fetch_assoc($result)){
        $courses[]=$row ;
    }
    

}
else{
     $sql="SELECT * from courses" ;
    $result=mysqli_query($conn,$sql) ;
    while ($row=mysqli_fetch_assoc($result)){
        $courses[]=$row ;

}
}
echo json_encode($courses) ;
?>