<?php
require('db.php');

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: logout.php');
}
?>

<?php include_once('includes/header.php'); ?>

<?php if(isset($_SESSION['status'])){ ?>
<div class="container mt-3 alert-container sticky-top">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                    <h2 class="text-center mb-4">Home</h2>
                    <h5>
                        Correo electrónico: <br>
                        <?php echo $_SESSION['email'] ?>
                    </h5>
                    <a class="btn btn-outline-primary my-2" href="logout.php" role="button">
                        Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php'); ?>