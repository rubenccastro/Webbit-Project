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
            <div class="container">
                <div class="row md">
                    <div class="col">
                        <?php if (isset($_SESSION["userid"])) { ?>
                            <?php if ($categoryDetails->user_id == $_SESSION["userid"]) { ?>
                                <form method="POST" action="<?php echo route('category/edit'); ?>">
                                    <table class="table-borderless table-custom">
                                        <tr>
                                            <td class="text">
                                                <h3 class="border-bottom">Create a Category</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="text">Name</h5>
                                                <p class="text-inf mt-n8">Category names including capitalization cannot be
                                                    changed. <span class="hovertext"
                                                        data-hover='Names cannot have spaces (e.g.,
w/bookclub" not "w/book club" , must not exceed 16 characters. Avoid using solely trademarked names (e.g., "w/FansOfWebbit" not "w/Webbit").'>
                                                        <i class="fa-regular fa-circle-question"></i></span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="mainframe-submit">
                                            <td>
                                                <div class="container-fluid d-flex mx-auto flex-grow-1">
                                                    <span class="text mtr-04-02">w/</span>
                                                    <span class="category-form">
                                                        <?php echo $categoryDetails->title ?>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="spacer-10"></div>
                                            </td>
                                        </tr>
                                        <tr class="mainframe-submit">
                                            <td>
                                                <input type="hidden" name="category_id"
                                                    value="<?php echo $categoryDetails->id; ?>">
                                                <div class="container-fluid d-flex mx-auto flex-grow-1">
                                                    <textarea class="category-form-description" type="text"
                                                        placeholder="Description" name="description" maxlength="500"
                                                        id="description"><?php echo $categoryDetails->description; ?></textarea>
                                                    <div id="character-counter-description"
                                                        class="counterplacement align-bottom text-nowrap">
                                                        <span id="typed-characters-description" class="text">0</span>
                                                        <span class="text">/</span>
                                                        <span id="maximum-characters-description" class="text">500</span>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php if (isset($_SESSION['message'])) { ?>
                                                    <p class="text-white">
                                                        <?php echo $_SESSION['message']; ?>
                                                    </p>
                                                    <?php unset($_SESSION['message']); ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button class="bttn bttn-alt mt-2 me-3" type="button">
                                                    <a class="nav-item nav-link text-white"
                                                        href="<?php echo route(''); ?>">Cancel</a>
                                                </button>
                                                <button class=" bttn bttnlogin mt-2" type="submit">
                                                    <span class="nav-item nav-link text-white">Update Category</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                            }
                            ?>
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
    <script>
        const textAreaDescription = document.querySelector("#description");
        const typedCharactersDescription = document.querySelector("#typed-characters-description");
        const maxCharactersDescription = 500;
        function updateCharacterCount() {
            const typedCharacters = textAreaDescription.value.length;
            if (typedCharacters > maxCharactersDescription) {
                textAreaDescription.value = textAreaDescription.value.substring(0, maxCharactersDescription);
            }
            typedCharactersDescription.textContent = textAreaDescription.value.length;
        }
        document.addEventListener('DOMContentLoaded', () => {
            updateCharacterCount();
        });
        textAreaDescription.addEventListener("input", (event) => {
            updateCharacterCount();
        });
    </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>