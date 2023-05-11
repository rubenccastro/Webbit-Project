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
                            <?php if ($comments->user_id == $_SESSION["userid"]) { ?>
                                <form method="POST" action="<?php echo route('comment/edit'); ?>">
                                    <table class="table-borderless table-custom">
                                        <tr>
                                            <td class="text">
                                                <h5>Editing your comment on the post
                                                    <?php echo $post->title; ?>
                                                </h5>
                                                <hr class="border-devider">
                                            </td>
                                        </tr>
                                        <tr>
                                        <tr class="mainframe-submit">
                                            <td>
                                                <input type="hidden" name="category_id"
                                                    value="<?php echo $comments->post_id; ?>">
                                                <input type="hidden" name="comments_id" value="<?php echo $comments->id; ?>">
                                                <div class="container-fluid d-flex mx-auto flex-grow-1">
                                                    <textarea class="category-form-description" type="text"
                                                        placeholder="Description" name="description"
                                                        id="description"><?php echo $comments->text; ?></textarea>
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
                                                    <span class="nav-item nav-link text-white">Update Comment</span>
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