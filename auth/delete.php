<?php
include 'conn.php';
$id = $_COOKIE['id_user'];
$sql = "DELETE FROM login WHERE id_user=$id";

if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
    setcookie("login","",time()-1);
    setcookie("user","",time()-1);
    setcookie("id_user","",time()-1);
    setcookie("role","",time()-1);
    header("location:/");
} else {
    echo "Error deleting record: " . mysqli_error($con);
    header("location:/account");
}

?>