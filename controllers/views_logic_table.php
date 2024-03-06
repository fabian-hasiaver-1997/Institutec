<?php
require_once '../model/query.php';
session_start();
$database = new model_sql();

// Llamada a la función
$resul = $database->get_subject_teacher($_SESSION['dni']);

$id_subject = $_GET['id'];
$students=$database-> getMultiple_students_subject($id_subject);


?>
