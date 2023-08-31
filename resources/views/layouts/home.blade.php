<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>bienvenu a page d'accueil</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/imgs/favicon.png" rel="icon">
    <link href="assets/imgs/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      />
      <link rel="stylesheet" href="static/dist/tailwind.css" />
    <!-- Vendor CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/landing.css" rel="stylesheet">

<style>
    .bg-custom{
    background-color: #F9A826 !important
}
</style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="assets/imgs/logo.png" alt="">
                <span>Rab Sal</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    @guest
                        <li><a class="getstarted scrollto" href="{{route('login')}}">Se connecter</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="{{route('admin.dashboard')}}">Tableau de Bord</a></li>
                        <li>
                            <form id="log_out" method="POST" action="{{route('logout')}}">
                                @csrf
                            </form>
                            <a class="getstarted scrollto" onclick="document.getElementById('log_out').submit()"
                                href="#">Se déconnecté</a>
                        </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <br>
    <br>

    @yield("content")

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">



      

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Rab Sal</span></strong>. All Rights Reserved
                </div>
    
            </div>
        </footer><!-- End Footer -->
    
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    
        <!-- Vendor JS Files -->
    
        <!-- Template Main JS File -->
    
    </body>
    
    </html>