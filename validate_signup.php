<?php

include_once('db.php');

function redirect($message=false, $color=false){
    session_start();
    if ($message && $color) {
        $_SESSION['status'] = $message;
        $_SESSION['color'] = $color;
    }
    header("Location: signup.php");
}


if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
    $email = clear($_POST['email'], $conn);
    $password = clear($_POST['password'], $conn);
    $confirm_password = clear($_POST['confirm_password'], $conn);

    //Validar email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $row= mysqli_fetch_array($result);
        $email_fromDB = $row['email'];
        if (!$email_fromDB){
            //Validar password
            if ($password == $confirm_password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    redirect('Te has registrado con éxito.', 'success');
                }
            } else{
                redirect('Las contraseñas no son iguales.', 'danger');
            }
        } else{
            redirect('El email ingresado ya se encuentra en uso.', 'danger');
        }
    } else {
        redirect('Ingresa un email válido.', 'danger');
    }
} else{
    redirect('Completa todos los campos.', 'danger');
}