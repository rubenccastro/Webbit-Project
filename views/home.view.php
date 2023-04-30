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
    <link rel="stylesheet" href="<?php echo route('css/footer.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <script src="<?php echo route('js/jquery.js') ?>"></script>
</head>

<body>
    <?php include 'nav.view.php'
        ?>
    <section>
        <div class="container spacer-20">
            <div class="row md">
                <div class="col">
                    <?php if (isset($_SESSION["userid"])) { ?>
                        <table class="table-borderless table-custom" id="userpost">
                            <tr class="mainframe-submit">
                                <td class="col-md-1 ps-3">
                                    <img src="<?php echo route('assets/favicon.png') ?>" class="rounded-circle" width="50px"
                                        height="50px">
                                </td>
                                <td>
                                    <div>
                                        <div class="container-fluid">
                                            <div class="bg-dark search-form mt-3 mb-3 rounded-1">
                                                <input class="form-control-search" type="text" placeholder="Create Post"
                                                    onclick="window.location='<?php echo route('posts/create'); ?>'">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="spacer-10"></div>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                    <?php
                    foreach ($posts as $post) {
                        ?>
                        <table class="table-borderless table-custom" id="posts">
                            <tr class="mainframe-body mt-2 mb-2 ms-3">
                                <td class="mainframe-upvote col-md-1-5 w-5 mh-100 align-top">
                                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                                    <label class="btn btn-outline-warning" for="option1"><i
                                            class="fa-solid fa-arrow-up"></i></label>
                                    <p class="text textupvote text-center">
                                        <?php echo $post->karmapoints; ?>
                                    </p>
                                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                    <label class="btn btn-outline-warning" for="option2"><i
                                            class="fa-solid fa-arrow-down"></i></label>
                                </td>
                                <td class="col-md-10 ms-2" onclick="window.location='';">
                                    <div class="text-category"><img src="<?php echo route('assets/favicon.png') ?>"
                                            class="rounded-circle me-2" width="20px" height="20px"><a class="text"
                                            href="">w/<?php echo $post->category_id; ?></a>
                                        <span class="text-inf text-align-center">Posted by <a class="text"
                                                href="">u/<?php echo $post->user_id; ?></a> <a class="text-inf"
                                                href=""><?php echo $post->created_in; ?></a></span>


                                    </div>
                                    <div>
                                        <span class="text text-title me-2 fw-bold">
                                            <?php echo $post->title; ?>
                                        </span>
                                    </div>
                                    <p class="text-break text text-body fade-text">
                                        <?php echo $post->text; ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="spacer-20"></div>
                                </td>
                            </tr>
                        </table>

                        <?php
                    }
                    ?>
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
</body>

</html>