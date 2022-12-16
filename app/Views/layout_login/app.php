<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->renderSection('title') ?></title>

    <!-- Custom fonts for this template--> 
    <!-- <link rel="stylesheet" href="<?= base_url('Asset/vendor') ?>/fontawesome-free/css/all.min.css">   -->

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> 

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url('Asset/css') ?>/sb-admin-2.min.css"> 


    <!-- Font Awesome 6 Pro CSS --> 
    <link rel="stylesheet" href="<?= base_url('Asset/fonts') ?>/awesomeprov6.2.0/css/fontawesome.css"  > 
    <link rel="stylesheet" href="<?= base_url('Asset/fonts') ?>/awesomeprov6.2.0/css/solid.css" >
    <link rel="stylesheet" href="<?= base_url('Asset/fonts') ?>/awesomeprov6.2.0/css/brands.css" > 
    <link rel="stylesheet" href="<?= base_url('Asset/fonts') ?>/awesomeprov6.2.0/css/v5-font-face.css"  >


    <?= $this->renderSection('styles') ?>



</head>



<body class="" style="background-color:#ebebeb">

    <div class="container">

        <!-- Outer Row -->
        <?= $this->renderSection('content') ?>  
 
    </div>

 

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('Asset/vendor') ?>/jquery/jquery.min.js"></script> 
    <script src="<?= base_url('Asset/vendor') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>  


    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('Asset/vendor') ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('Asset/js') ?>/sb-admin-2.min.js"></script>


    <?= $this->renderSection('javascript') ?>


</body>

</html>