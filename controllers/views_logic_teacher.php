<?php
require_once '../model/query.php';
session_start();
$database=new model_sql();
$get_teacher_data=$database->getteacher('teachers',$_SESSION['dni']);





?>