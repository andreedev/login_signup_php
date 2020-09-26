<?php include_once('includes/header.php'); ?>
<?php session_start(); ?>
<?php if( isset($_SESSION['status']) && isset($_SESSION['color']) ){ ?>
<div class="container mt-3 alert-container sticky-top">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
            <div class="alert alert-<?=$_SESSION['color']?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['status']?>
            </div>
        </div>
    </div>
</div>
<?php session_destroy(); ?>
<?php } ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
            <div class="card mt-3 rounded">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="validate_login.php" method="POST" novalidate>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                </div>
                                <input name="email" type="email" class="form-control " id="email" placeholder="Correo electrónico" autofocus required>
                                <div id="feedbackEmail"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña" required>
                                <div id="feedbackPass"></div>
                            </div>
                        </div>
                        <a href="signup.php">Regístrate</a><br>
                        <!-- <a href="#">¿Has olvidado tu contraseña?</a><br> -->
                        <div class="text-center my-3">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-6 col-xl-5">
            <div class="card mt-4 rounded">
                <div class="card-body">
                    <h4 class="text-center mb-4">Cuenta de prueba</h4>
                    <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contraseña</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>test@gmail.com</td>
                            <td>123</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php'); ?>

