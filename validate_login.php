<?php
include_once('db.php');
$hash_fromDB;

function redirect($message=false, $color=false){
    session_start();
    if ($message && $color) {
        $_SESSION['status'] = $message;
        $_SESSION['color'] = $color;
    }
    header("Location: login.php");
}

//Comprueba si existe los datos enviados por POST: email y password
if (($_POST['email'])!='' && ($_POST['password'])!='') {
    //Guarda dichos datos en variables
    $email = clear($_POST['email']);
    $password = clear($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'" or die(mysqli_error($conn));
    $result = mysqli_query($conn, $sql);
    $row= mysqli_fetch_array($result);
    $email_fromDB = $row['email'];
    if ($email_fromDB) {
        $hash_fromDB = $row['password'];

        if (password_verify($password, $hash_fromDB)) {
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['status']='Has iniciado sesión con éxito.';
            header("Location: home.php");
        } else {
            redirect('La contraseña es incorrecta.', 'danger');
        }
    } else{
        redirect('El email ingresado no pertenece a ninguna cuenta.', 'danger');
    }
} else{
    redirect('Completa todos los campos.', 'danger');
}