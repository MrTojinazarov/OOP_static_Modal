<?php

include 'Students.php';

if(isset($_GET['student_id']) && gettype((int)$_GET['student_id']) == 'integer'){
    $id = $_GET['student_id'];
    Students::delete($id);
    header("Location: index.php");
}

?>