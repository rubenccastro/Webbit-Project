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
                        <form method="POST" action="<?php echo route('posts'); ?>">
                            <table class="table-borderless table-custom">
                                <tr>
                                    <td class="text">
                                        <h5 class="border-bottom">Create a Post</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="container-fluid ps-0">
                                            <div class="category-selector">
                                                <div class="dropdown-center">
                                                    <select
                                                        class="mainframe-selector nav-link dropdown-toggle text-nowrap px-3"
                                                        name="category_id">
                                                        <div class="dropdown-menu dropdown-menu-category-select">
                                                            <option> <a
                                                                    class="dropdown-item item-selector active  text-nowrap"
                                                                    data-value="Select a Category">
                                                                    Select a Category</a>
                                                            </option>
                                                            <?php
                                                            foreach ($categories as $category) {
                                                                ?>
                                                                <option class="dropdown-item item-selector  text-nowrap"
                                                                    value="<?php echo $category->id; ?>">
                                                                    <?php echo $category->title; ?>
                                                                    </a>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </select>
                                                </div>
                                            </div>
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
                                                <div class="container-fluid d-flex mx-auto flex-grow-1">
                                                    <input class="category-form" type="text" placeholder="Title"
                                                        name="title" maxlength="50" id="title">
                                                    <div id="character-counter"
                                                        class="counterplacement align-middle text-nowrap">
                                                        <span id="typed-characters" class="text">0</span>
                                                        <span class="text">/</span>
                                                        <span id="maximum-characters" class="text">50</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ms-5 me-5">
                                                <textarea id="text" class="text-area" name="text"
                                                    placeholder=" Text(Optional)"></textarea>
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
    <script>
        const textAreaElement = document.querySelector("#title");
        const typedCharactersElement = document.querySelector("#typed-characters");
        const maximumCharacters = 50;

        textAreaElement.addEventListener("keydown", (event) => {
            const typedCharacters = textAreaElement.value.length;
            if (typedCharacters > maximumCharacters) {
                return false;
            }
            typedCharactersElement.textContent = typedCharacters;
        });

    </script>
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