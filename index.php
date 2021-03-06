<!DOCTYPE html>
<html>
    <head>
        <title>WWC - Home</title>
        <meta charset="UTF-8">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--StyleSheets-->
        <link rel="stylesheet" type="text/css" href="views/_css/style.css"/>
        <link rel="stylesheet" type="text/css" href="views/_css/styles.css"/>
        <!--Fonts-->
        <link rel="stylesheet" type="text/css" href="views/_css/ss-pika.css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/> 
    </head>
    <body>
        <div id="container">
            <div id="header" class="header-w-btn">
                <!-- Display Sign in or Sign out button -->
                <?php
                $member_id = filter_input(INPUT_COOKIE, 'member_id', FILTER_SANITIZE_STRING);
                $security = filter_input(INPUT_COOKIE, 'security', FILTER_SANITIZE_STRING);
                if (!$member_id || !$security) {
                    echo "<div id='corner-btn'>
                                <a class='btn btn-outline-light' href='views/pages/sign_in.php'>Sign in</a>
                              </div>";
                } else {
                    echo "<div id='corner-btn'>
                                <a class='btn btn-outline-light' href='controllers/sign_out_controller.php'>Sign out</a>
                              </div>";
                }
                ?>
                <a href="#"><img src="views/_img/logo/LogoWhite.png"></a>
            </div>
            <!-- NAV -->
            <div id="nav" class="navbar navbar-expand-md navbar-light">
                <div class="container">
                    <ul>
                        <li><a class="peach" href="#">Home</a></li>
                    </ul>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav full">
                            <li><a href="views/pages/profile.php">Profile</a></li>
                            <li><a href="views/pages/nav_search_results.php?cat=1">Laugh</a></li>
                            <li><a href="views/pages/nav_search_results.php?cat=2">Innovate</a></li>
                            <li><a href="views/pages/nav_search_results.php?cat=3">Learn</a></li>
                            <li><a href="views/pages/nav_search_results.php?cat=4">Inspire</a></li>
                            <?php
                            $security = filter_input(INPUT_COOKIE, 'security', FILTER_SANITIZE_STRING);
                            if ($security === 'writer') {
                                echo "<li><a href='views/pages/write_post.php'>Write</a></li>";
                            }
                            ?>
                            <li class="icon"><a href="views/pages/search.php">🔎</a></li>
                        </ul>
                    </div>       
                </div>
            </div>

            <!-- BOTTOM SECTION -->
            <div class="container">
                <div id="blogPosts" class="home">
                    <ul class="postList">
                        <li class="blogPostsHome">
                            <a href="#"><div class="blogpic left" style="background-image: url(views/_img/Women-who-can-Ruqsana-Begum-01.jpg);"></div></a>
                            <div class="right">
                                <a href="#"><h1>Meet Ruqsana Begum</h1></a>
                                <h6>By <a href="#" class="peach">Amy Wu</a> - Posted on 18 Apr 18</h6>
                            </div>
                        </li>
                        <li class="blogPostsHome">
                            <a href="#"><div class="blogpic left" style="background-image: url(views/_img/women-leaders-powerful.jpg);"></div></a>
                            <div class="right">
                                <a href="#"><h1>Blog Item Title</h1></a>
                                <h6>By <a href="#" class="peach">Amy Wu</a> - Posted on 18 Apr 18</h6>
                            </div>
                        </li>
                        <li class="blogPostsHome">
                            <a href="#"><div class="blogpic left" style="background-image: url(views/_img/desk.jpg);"></div></a>
                            <div class="right">
                                <a href="#"><h1>Blog Item Title</h1></a>
                                <h6>By <a href="#" class="peach">Amy Wu</a> - Posted on 18 Apr 18</h6>
                            </div>
                        </li>
                        <li class="blogPostsHome">
                            <a href="#"><div class="blogpic left" style="background-image: url(views/_img/women-prints.jpg);"></div></a>
                            <div class="right">
                                <a href="#"><h1>Blog Item Title</h1></a>
                                <h6>By <a href="#" class="peach">Amy Wu</a> - Posted on 18 Apr 18</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- NEXT -->
            <div id="nextlink">
              <div class="container">
                <!-- COMMENT OUT IF NEEDED -->
<!--                <a href="#" class="left">&larr; Newer Posts</a>
                <a href="#" class="right">Older Posts &rarr;</a>-->
              </div>
              <div class="clear"></div>
            </div>

            <!-- FOOTER -->
            <div id="footer">
                <div class="container">
                  <h4>Women Who Can &copy;</h4>
                   <p>Designed and created with <span class="icon">&#x2665;</span> by <a href="https://github.com/annaecc">@annaecc</a>,
                      <a href="https://github.com/LauraCollard">@lauracollard</a>, <a href="https://github.com/loujean">@loujean</a>,
                      <a href="https://github.com/alysanne">@alysanne</a> and <a href="https://github.com/StephBrooks88">@stephbrooks88</a>. 
                      We use cookies to give you a smooth experience. We will never share your details with third parties. 
                      In order to use Women Who Can, you must agree to our Privacy Policy and our cookie policy.</p>
                </div>
            </div>

        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="controllers/home_controller.js" type="text/javascript"></script>
      </body>
</html>
