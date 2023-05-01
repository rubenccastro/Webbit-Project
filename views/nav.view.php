<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo route('css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo route('css/nav-style.css') ?>">
    <link rel="stylesheet"
        href="<?php echo route('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') ?>">


</head>

<body>
    <!-- Nav -->
    <section>
        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container-fluid">
                <!-- Logo e Titulo do Nav-->
                <div class="navbar-brand">
                    <a href="<?php echo route(''); ?>" class="navbar-brand">
                        <img src="<?php echo route('assets/logo.png') ?>" height="30px" />
                    </a>
                </div>
                <!-- Logo e Titulo do Nav-->

                <!-- Nav Principal-->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <!-- Pagina Principal-->
                        <!-- dropwdown menu-->
                        <li class="nav-item dropdown">
                            <button class="butnhome nav-link dropdown-toggle text-nowrap" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown">
                                <span class="ico">
                                    <i class="fa-solid fa-house"></i></span><span class="texthome">Home</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-width dropdown-menu-home">
                                <div class="mainframe-filter">
                                    <div class="bg-dark-filter search-form mt-2 mb-2 rounded-1 me-3">
                                        <input type="text" id="myInput" class="form-control-search-home"
                                            onkeyup="searchBar()" placeholder="Search for Categories..">
                                    </div>
                                </div>
                                <ul id="myUL">
                                    <?php
                                    foreach ($categories as $category) {
                                        ?>
                                        <li>
                                            <a href="" class="dropdown-item">
                                                w/
                                                <?php echo $category->title; ?>
                                            </a>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <!-- dropwdown menu-->
                        <!-- Pagina Principal-->
                    </ul>
                    <!-- Search Bar nav -->
                    <div class="container-fluid">
                        <form class="d-flex mx-auto bg-dark rounded-pill p-2 search-form flex-grow-1">
                            <span class="text-white-search border-0"><i class="fas fa-search"></i></span>
                            <input class="form-control-search" type="search" placeholder="Search Webbit"
                                aria-label="Search">
                        </form>
                    </div>
                    <!-- Search Bar nav -->
                    <!-- nav-items lado direito -->
                    <?php if (!isset($_SESSION["userid"])) { ?>
                        <div class="navbar-nav ml-auto text-nowrap">
                            <button class="bttn bttnlogin" type="button"><a href="<?php echo route('login'); ?>"
                                    class="nav-item nav-link">Log
                                    In</a></button>
                            <button class="bttn" type="button"><a href="<?php echo route('register/create'); ?>"
                                    class="nav-item nav-link">Register</a></button>
                        </div>
                        <?php
                    } else {
                        ?>
                        <ul class="navbar-nav">
                            <!-- Pagina Principal-->
                            <!-- dropwdown menu-->
                            <li class="nav-item dropdown">
                                <button class="butnhome nav-link dropdown-toggle text-nowrap" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown">
                                    <span class="ico">
                                        <i class="fa-solid fa-user">
                                        </i>
                                        <?php echo $_SESSION["username"]; ?>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-user dropdown-menu-end">
                                    <p class="dropdown-item disabled text mb-n10"><i class="fa-regular fa-user"></i> My
                                        Stuff
                                    </p>
                                    <a href="<?php echo route(''); ?>" class="dropdown-item">
                                        <span class="ms-5">Profile</span>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="<?php echo route('category'); ?>" class="dropdown-item"><i
                                            class="fa-regular fa-hashtag"></i> Create a Category</a>
                                    <hr class="dropdown-divider">
                                    <a href="<?php echo route('logout'); ?>" class="dropdown-item"><i
                                            class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                                </div>
                            </li>
                            <!-- dropwdown menu-->
                            <!-- Pagina Principal-->
                        </ul>
                        <?php
                    }
                    ?>
                    <!-- nav-items lado direito-->
                </div>
                <!-- Nav Principal-->
            </div>
        </nav>
    </section>
    <!-- Nav -->
    <script src="<?php echo route('js/javascript.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
</body>

</html>