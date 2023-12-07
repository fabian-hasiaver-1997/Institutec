<?php

require_once '../model/query.php';

$database = new model_sql();
$gender_data=$database->show_table("genders");
$teacherData=$database->show_state("teachers");
$phone_max_length = 10;
$dni_max_length = 8;
$credential=$database->getFirstValidCredential(); 
$generatedPassword = generateRandomPassword(8);
$hash_password = password_hash($generatedPassword, PASSWORD_DEFAULT);

$name = $_POST['name'];
$surname = $_POST['surname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$direction=$_POST['direction'];
$height=$_POST['height'];
$dni=$_POST['dni'];
$fk_gender_id=$_POST['fk_gender_id'];
$keep=$_POST['keep'];
   
if(isset($keep)){

    if (strlen($phone) > $phone_max_length  ||strlen($phone) <$phone_max_length) {
        header("Location: ../views/views_teacher.php?telefono_digito=error");
        exit();
    }
    // Valida la longitud del DNI
    if (strlen($dni) > $dni_max_length ||strlen($dni) <$dni_max_length) {
        header("Location: ../views/views_teacher.php?dni_digito=error");
        exit();
    }

    $checkforduplicated = $database->checkForDuplicates("teachers",$dni, $email);

    if ($checkforduplicated !== false){
        header("Location: ../views/views_teacher.php?dni_email=error");
        exit();
    } else {
    
        $insert=$database->insertTeacher($name, $surname, $phone, $email,$direction,$height,$dni,$fk_gender_id);

        if ($insert) {

            $inserted_teacher = $database->create_account_teacher($name, $dni, $hash_password, $email);

            if (isset($inserted_teacher)) {
                // Envía el correo y realiza las acciones necesarias aquí
                require_once '../controllers/mail_create_new_user_teacher.php';
                // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
                header("Location: ../views/views_teacher.php?creado=correcto");
                exit(); // Asegura que no se ejecuten más instrucciones después de la redirección
            } else {
                echo "Error en la inserción: No se pudo crear la cuenta.";
            }
        }
    
    }    
}

function generateRandomPassword($length = 8) {
    // Characters to be used for generating the password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    // Generate the random password
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
}


?>
