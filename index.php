<?php session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:login.php");
}
?>
<?php include './resources/layouts/header.php' ?>

<!-- Contenido -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Default Card Example <?php echo $_SESSION["usuario"]; ?></h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                The body of the card
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                The footer of the card
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>
<!-- / .contenido -->

<?php include './resources/layouts/footer.php' ?>
