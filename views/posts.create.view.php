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
</head>

<body>
    <?php include 'nav.view.php'
        ?>
    <section>
        <div class="container spacer-20">
            <div class="row md">
                <div class="col">
                    <?php if (isset($_SESSION["userid"])) { ?>
                        <form method="POST" action="<?php echo route('category'); ?>">
                            <table class="table-borderless table-custom">
                                <tr>
                                    <td class="text">
                                        <h5 class="border-bottom">Create a Post</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="container-fluid ps-0">
                                            <ul class="category-selector">
                                                <li class="dropdown-center">
                                                    <button class="mainframe-selector nav-link dropdown-toggle text-nowrap"
                                                        type="button" id="categoryDropdownButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <span>Select a Category</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-category-select">
                                                        <div class="mainframe-filter">
                                                            <div
                                                                class="bg-dark-filter search-form mt-2 mb-2 rounded-1 me-3">
                                                                <input type="text" id="myInput"
                                                                    class="form-control-search-home"
                                                                    onkeyup="searchBarPost()"
                                                                    placeholder="Search for Categories...">
                                                            </div>
                                                        </div>
                                                        <ul aria-labelledby="categoryDropdownButton"
                                                            id="categoryDropdownMenu">
                                                            <li> <a class="dropdown-item item-selector active"
                                                                    data-value="Select a Category" name="category_id">
                                                                    Select a Category</a>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <?php
                                                            foreach ($categories as $category) {
                                                                ?>
                                                                <li> <a class="dropdown-item item-selector"
                                                                        data-value="<?php echo $category->title; ?>">
                                                                        w/<?php echo $category->title; ?></a>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="mainframe">
                                <table class="table-borderless table-custom table-custom-size">
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mainframe-inputs ms-5 me-5">
                                                <div class="container-fluid">
                                                    <input class="category-form " type="text" placeholder="Title"
                                                        name="title">
                                                </div>
                                            </div>
                                            <div class="ms-5 me-5">
                                                <textarea name="" id="editor" class="text-area" name="text"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mb-3">
                                                <button class="bttn bttn-alt ms-5 me-3" type="button">
                                                    <a class="nav-item nav-link text-white"
                                                        href="<?php echo route(''); ?>">Cancel</a>
                                                </button>
                                                <button class=" bttn bttnlogin" type="submit">
                                                    <span class="nav-item nav-link text-white">Create Post</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
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
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo route('js/jquery.js') ?>"></script>
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