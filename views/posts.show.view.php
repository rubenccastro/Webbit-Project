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
        <div class="container spacer-20">
            <div class="row md">
                <div class="col">
                    <table class="table-borderless table-custom" id="posts">
                        <tr class="mainframe-post mt-2 mb-2 ms-3">
                            <form method="POST" action="karma" id="karmaposts<?php echo $posts->id; ?>">
                                <td class="mainframe-upvote col-md-1-5 w-5 mh-100 align-top">
                                    <?php if (isset($_SESSION["userid"])) { ?>
                                        <?php
                                        $up = false;
                                        $down = false;
                                        foreach ($karmapoints as $karmapoint) {
                                            if ($karmapoint->votestate == 'up' && $karmapoint->users_id == $_SESSION["userid"] && $karmapoint->posts_id == $posts->id) {
                                                $up = true;
                                                $down = false;
                                            } elseif ($karmapoint->votestate == 'down' && $karmapoint->users_id == $_SESSION["userid"] && $karmapoint->posts_id == $posts->id) {
                                                $up = false;
                                                $down = true;
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php if ($up == true) { ?>
                                            <button class="btn btn-outline-warning upvote-button"
                                                data-post-id="<?php echo $posts->id; ?>">
                                                <i class="fa-solid fa-arrow-up vote-active"></i>
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button class="btn btn-outline-warning upvote-button"
                                                data-post-id="<?php echo $posts->id; ?>">
                                                <i class="fa-solid fa-arrow-up"></i>
                                            </button>
                                            <?php
                                        }
                                        ?>
                                        <p class="text textupvote text-center">
                                            <?php echo $posts->karmapoints; ?>
                                        </p>
                                        <?php
                                        $up = false;
                                        $down = false;
                                        foreach ($karmapoints as $karmapoint) {
                                            if ($karmapoint->votestate == 'up' && $karmapoint->users_id == $_SESSION["userid"] && $karmapoint->posts_id == $posts->id) {
                                                $up = true;
                                                $down = false;
                                            } elseif ($karmapoint->votestate == 'down' && $karmapoint->users_id == $_SESSION["userid"] && $karmapoint->posts_id == $posts->id) {
                                                $up = false;
                                                $down = true;
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php if ($down == true) { ?>

                                            <button class="btn btn-outline-warning downvote-button"
                                                data-post-id="<?php echo $posts->id; ?>"
                                                data-user-vote="<?php echo $posts->user_vote; ?>">
                                                <i class="fa-solid fa-arrow-down vote-active"></i>
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button class="btn btn-outline-warning downvote-button"
                                                data-post-id="<?php echo $posts->id; ?>"
                                                data-user-vote="<?php echo $posts->user_vote; ?>">
                                                <i class="fa-solid fa-arrow-down"></i>
                                            </button>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    } else {
                                        ?>
                                        <button class="btn btn-outline-warning upvote-button"
                                            data-post-id="<?php echo $posts->id; ?>">
                                            <i class="fa-solid fa-arrow-up"></i>
                                        </button>
                                        <p class="text textupvote text-center">
                                            <?php echo $posts->karmapoints; ?>
                                        </p>
                                        <button class="btn btn-outline-warning downvote-button"
                                            data-post-id="<?php echo $posts->id; ?>"
                                            data-user-vote="<?php echo $posts->user_vote; ?>">
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </form>
                            <td class="col-md-10 ms-2">
                                <div class="text-category container"><a class="text"
                                        href="<?php echo route('w/' . $posts->category->title); ?>">w/<?php echo $posts->category->title; ?>
                                    </a>
                                    <span class="text-inf text-align-center">Posted by <img
                                            src="<?php echo route('assets/favicon.png') ?>"
                                            class="rounded-circle me-1 ms-1" width="15px" height="15px"><a class="text">u/<?php echo $posts->users->username; ?>
                                        </a> <span class="text-inf">
                                            <?php echo $posts->created_in; ?>
                                        </span></span>
                                </div>
                                <div class="container">
                                    <span class="text-break text text-title me-2 fw-bold">
                                        <?php echo $posts->title; ?>
                                    </span>
                                    <p class="text-break text text-body-page">
                                        <?php echo $posts->text; ?>
                                    </p>
                                </div>
                                <div class="container">
                                    <?php if (isset($_SESSION["userid"])) { ?>
                                        <?php if ($posts->user_id == ($_SESSION["userid"])) { ?>
                                            <hr class="border-devider">
                                            <form method="POST" action="<?php echo route('posts/delete'); ?>">
                                                <p class="text-end mb-05"><a
                                                        href="<?php echo route('w/' . $posts->category->title . '/' . $posts->id . '/edit'); ?>"
                                                        class="text ms-2 btn-posts"><i
                                                            class="fa-regular fa-pen-to-square me-1"></i>Edit Post</a>
                                                    <input type="hidden" name="category_id"
                                                        value="<?php echo $posts->category->id; ?>">
                                                    <input type="hidden" name="post_id" value="<?php echo $posts->id; ?>">
                                                    <button type="submit" class="btn-test text ms-2  btn-posts">
                                                        <i class="fa-solid fa-trash-can trashcan me-1"></i><a>Delete Post</a>
                                                    </button>
                                            </form>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="container">
                                        <hr class="border-devider">
                                        <span class="text">Comment as u/<?php echo $_SESSION["username"]; ?>
                                        </span>
                                        <form method="POST" action="<?php echo route('comment/create'); ?>">
                                            <input type="hidden" name="post_id" value="<?php echo $posts->id; ?>">
                                            <input type="hidden" name="category_id" value="<?php echo $category->id; ?>">
                                            <textarea id="text" class="text-comments" name="text"
                                                placeholder=" Text"></textarea>
                                            <?php if (isset($_SESSION['messagecreatecomment'])) { ?>
                                                <p class="text-white">
                                                    <?php echo $_SESSION['messagecreatecomment']; ?>
                                                </p>
                                                <?php unset($_SESSION['messagecreatecomment']); ?>
                                            <?php } ?>
                                            <div class="text-end">
                                                <button class=" bttn bttnlogin mb-2" type="submit">
                                                    <span class="nav-item nav-link text-white">Comment</span>
                                                </button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    <div>
                                        <hr class="border-devider">
                                        <p class="text">Comments</p>
                                        <?php foreach ($comments as $comment) { ?>
                                            <span class="text-inf text-align-center">
                                                <img src="<?php echo route('assets/favicon.png') ?>"
                                                    class="rounded-circle me-1 ms-1" width="30px" height="30px">
                                                <a class="text">u/<?php echo $comment->user->username; ?>
                                                </a>
                                                <span class="text-inf">
                                                    <?php echo $comment->created_in; ?>
                                                </span>
                                                <p class="text-comment text-break">
                                                    <?php echo $comment->text; ?>
                                                </p>
                                                <?php if (isset($_SESSION["userid"])) { ?>
                                                    <?php if ($comment->user_id == ($_SESSION["userid"])) { ?>
                                                        <form method="POST" action="<?php echo route('comment/delete'); ?>">
                                                            <p class="text-end mb-05 mt-n10"><a
                                                                    href="<?php echo route('w/' . $posts->category->title . '/' . $posts->id . '/comment/' . $comment->id . '/edit'); ?>"
                                                                    class="text ms-2 btn-posts"><i
                                                                        class="fa-regular fa-pen-to-square me-1"></i>Edit
                                                                    Comment</a>
                                                                <input type="hidden" name="comment_id"
                                                                    value="<?php echo $comment->id; ?>">
                                                                <input type="hidden" name="post_id"
                                                                    value="<?php echo $posts->id; ?>">
                                                                <input type="hidden" name="category_id"
                                                                    value="<?php echo $posts->category->id; ?>">
                                                                <button type="submit" class="btn-test text ms-2  btn-posts">
                                                                    <i class="fa-solid fa-trash-can trashcan me-1"></i><a>Delete
                                                                        Comment</a>
                                                                </button>
                                                        </form>
                                                        </p>
                                                    <?php } ?>
                                                <?php } ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="mainframe-footer">
                        <div class="footer-control"></div>
                        <section>
                            <div class="container">
                                <h5 class="text border-bottom">
                                    <a class="text" href="<?php echo route('w/' . $posts->category->title); ?>">w/<?php echo $posts->category->title; ?>
                                    </a>
                            </div>
                            <div class="container">
                                <p class="text text-body-page text-break">
                                    <?php echo $posts->category->description; ?>
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="spacer-15"></div>
                    <div>
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
        $('.upvote-button, .downvote-button').on('click', function (event) {
            event.preventDefault();

            var voteValue = $(this).hasClass('upvote-button') ? 'up' : 'down';
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
                    $(event.target).closest('.mainframe-upvote').find('.textupvote').text(data.karmapoints);

                    var upvoteIcon = $(event.target).closest('.mainframe-upvote').find('.upvote-button i');
                    var downvoteIcon = $(event.target).closest('.mainframe-upvote').find('.downvote-button i');

                    if (voteValue === 'up') {
                        upvoteIcon.toggleClass('vote-active');
                        if (downvoteIcon.hasClass('vote-active')) {
                            downvoteIcon.removeClass('vote-active');
                        }
                    } else if (voteValue === 'down') {
                        downvoteIcon.toggleClass('vote-active');
                        if (upvoteIcon.hasClass('vote-active')) {
                            upvoteIcon.removeClass('vote-active');
                        }
                    }
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="<?php echo route('js/javascript.js') ?>"></script>
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