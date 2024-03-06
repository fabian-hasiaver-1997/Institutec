<?php
require_once '../model/query.php';
session_start();
$database = new model_sql();
$id_student =$_GET['id']; // Obtener el ID del estudiante del campo oculto "student" del formulario
$id_teacher = $database->get_teacher_id_by_dni($_SESSION['dni']);
$get_Student = $database->get_student($id_student);
$student=$_POST['student'];
$partial_1 = $_POST['partial_1'];
$partial_2 = $_POST['partial_2'];
$recuperatory_1 = $_POST['recuperatory_1'];
$recuperatory_2 = $_POST['recuperatory_2'];
$integrate = $_POST['integrate'];
$keep = $_POST['keep'];

if (isset($keep)) {
    // Verificar si $_SESSION['id_teacher'] está configurado correctamente

    $insert_notes = $database->insert_update_notes($student, $id_teacher, $partial_1, $partial_2, $recuperatory_1, $recuperatory_2, $integrate);
    if ($insert_notes) {
        echo "Notas insertadas correctamente.";
    } else {
        echo "Error al insertar notas.";
    }
} else {
    echo "Error: ID de profesor no configurado correctamente.";
}
?>
