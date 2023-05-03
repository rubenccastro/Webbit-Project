<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webbit - Jump Into Anything</title>
    <link rel="icon" type="image/x-icon" href="<?php echo route('assets/favicon.ico') ?>">
    <link rel="stylesheet" href="<?php echo route('css/login.css') ?>">
    <link rel="stylesheet" href="<?php echo route('css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo route('css/nav-style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php include 'nav.view.php'
        ?>
    <section>
        <div>
            <div class="container spacer-20">
                <div class="row md">
                    <div class="col">
                        <form method="POST" action="<?php echo route('register'); ?>">
                            <table class="table-borderless table-custom">
                                <th>
                                    <h1 class="text-white">Register</h1>
                                </th>
                                <tr>
                                    <td>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control form-size" id="floatingInput"
                                                placeholder="name" name="user" required>
                                            <label for="floatingInput" class="text-size">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control form-size" id="floatingPassword"
                                                placeholder="Password" name="password" required>
                                            <label for="floatingPassword" class="text-size">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control form-size"
                                                id="floatingConfirmPassword" placeholder="Password" required>
                                            <label for="floatingConfirmPassword" class="text-size">Confirm
                                                Password</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="email" class="form-control form-size" id="floatingEmail"
                                                placeholder="Email" name="email" required>
                                            <label for="floatingEmail" class="text-size">Email</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class=" bttn bttnlogin mt-2 mb-3" type="submit"><a>Register</a></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="mainframe-footer ">
                            <div class="footer-control"></div>
                            <?php include 'rules.view.php'
                                ?>
                        </div>
                        <div class="spacer-15"></div>
                        <div class="mainframe-footer ">
                            <div class="footer-control"></div>
                            <?php include 'footer.view.php'
                                ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="<?php echo route('js/javascript.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

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