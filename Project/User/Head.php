<?php  include("../Assets/Connection/Connection.php");
include("SessionValidator.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>WaterLand</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="../Assets/Templates/User/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../Assets/Templates/User/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../Assets/Templates/User/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="../Assets/Templates/User/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../Assets/Templates/User/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="homepage.php" class="navbar-brand p-0">
                    <h1 class="display-6 text-dark"><i class="fas fa-swimmer text-primary me-3"></i>WaterLand</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="homepage.php" class="nav-item nav-link active">Home</a>
                        <a href="Myprofile.php" class="nav-item nav-link">My Profile</a>
                        <a href="SearchPackages.php" class="nav-item nav-link">Search Packages</a>
                        <a href="Complaint.php" class="nav-item nav-link">Complaint</a>
                        <a href="Feedback.php" class="nav-item nav-link">Feedback</a>
                    </div>
                    <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <a href="../Logout.php" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0">Logout</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->