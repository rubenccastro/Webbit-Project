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
                                    <input type="radio" class="btn-check" name="voteValue"
                                        id="upvote<?php echo $post->id; ?>" value="up" autocomplete="off"
                                        data-post-id="<?php echo $post->id; ?>">
                                    <label class="btn btn-outline-warning" for="upvote<?php echo $post->id; ?>"><i
                                            class="fa-solid fa-arrow-up"></i></label>
                                    <p class="text textupvote text-center">
                                        <?php echo $post->karmapoints; ?>
                                    </p>
                                    <input type="radio" class="btn-check" name="voteValue"
                                        id="downvote<?php echo $post->id; ?>" value="down" autocomplete="off"
                                        data-post-id="<?php echo $post->id; ?>">
                                    <label class="btn btn-outline-warning" for="downvote<?php echo $post->id; ?>"><i
                                            class="fa-solid fa-arrow-down"></i></label>
                                    <input type="hidden" name="postId" value="<?php echo $post->id; ?>">
                                </td>
                                <td class="col-md-10 ms-2"
                                    onclick="window.location='<?php echo route('w/' . $post->category->title . '/' . $post->id); ?>'">
                                    <div class="text-category"><img src="<?php echo route('assets/favicon.png') ?>"
                                            class="rounded-circle me-2" width="20px" height="20px"><a class="text"
                                            href="">w/<?php echo $post->category->title; ?></a>
                                        <span class="text-inf text-align-center">Posted by <a class="text" href="">u/
                                                <?php echo $post->users->username; ?>
                                            </a> <a class="text-inf">
                                                <?php echo $post->created_in; ?>
                                            </a></span>
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
    <script>
        $('input[type=radio][name=voteValue]').on('click', function () {
            var voteValue = $(this).val();
            var postId = $(this).attr('data-post-id');
            var userId = <?php echo $_SESSION['userid']; ?>;

            $.ajax({
                url: "<?php echo route('karma'); ?>",
                method: "post",
                dataType: "json",
                data: {
                    postId: postId,
                    voteValue: voteValue,
                    userId: userId
                },
                success: function (data) {
                    $('#post-' + postId + ' .textupvote').text(data.karmapoints);
                    location.reload();
                }
            });
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
</body>

</html>