<?php
require_once("backend/dbConnection.php");
session_start();
$search_element=$_GET["id"];
if(isset($_SESSION["username"]))
{
 try
 {
    global $conn;
    $sql = "DELETE FROM posts WHERE id='$search_element'";
    $Execute = $conn->query($sql);
    if($Execute)
    {
        header("Location:index.php");
    }
 }
 catch(Exception $e)
 {
    echo $e;
 }
}else{
    echo '<script>window.alert("please login")
        window.location.href = "/CRUD_Application/login.php"
    </script>';
   // header("Location:register.php");
}