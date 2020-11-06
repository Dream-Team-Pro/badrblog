<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Eskimo - HTML Template</title>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- CSS FILES -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="css/featherlight.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- READING POSITION INDICATOR -->
    <progress value="0" id="eskimo-progress-bar">
        <span class="eskimo-progress-container">
            <span class="eskimo-progress-bar"></span>
        </span>
    </progress>
    <!-- SITE WRAPPER -->
    <div id="eskimo-site-wrapper">
        <!-- MAIN CONTAINER -->
        <main id="eskimo-main-container">
            <div class="container">
                <!-- SIDEBAR -->
                <div id="eskimo-sidebar">
                    <div id="eskimo-sidebar-wrapper" class="d-flex align-items-start flex-column h-100 w-100">
                        <!-- LOGO -->
                        <div id="eskimo-logo-cell" class="w-100">
                            <a class="eskimo-logo-link" href="index.html">
                                <img src="images/logo.png" class="eskimo-logo" alt="eskimo" />
                            </a>
                        </div>
                        <!-- MENU CONTAINER -->
                        <div id="eskimo-sidebar-cell" class="w-100">
                            <!-- MOBILE MENU BUTTON -->
                            <div id="eskimo-menu-toggle">MENU</div>
                            <!-- MENU -->
                            <nav id="eskimo-main-menu" class="menu-main-menu-container">
                                <ul class="eskimo-menu-ul">
                                    <li><a href="#">Home</a>
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Demo 1</a></li>
                                            <li><a href="index2.html">Demo 2</a></li>
                                            <li><a href="index3.html">Demo 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">About Me</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">Demo 1</a></li>
                                            <li><a href="about-2.html">Demo 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Full Width</a></li>
                                            <li><a href="blog-2-column.html">2 Column</a></li>
                                            <li><a href="blog-3-column.html">3 Column</a></li>
                                            <li><a href="single-post.html">Single Post</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="galleries.html">Galleries</a></li>
                                    <li><a href="other-features.html">Other Features</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- SOCIAL MEDIA ICONS -->
                        <div id="eskimo-social-cell" class="mt-auto w-100">
                            <div id="eskimo-social-inner">
                                <ul class="eskimo-social-icons">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TOP ICONS -->
                <ul class="eskimo-top-icons">
                    <li id="eskimo-panel-icon">
                        <a href="#eskimo-panel" class="eskimo-panel-open"><i class="fa fa-bars"></i></a>
                    </li>
                    <li id="eskimo-search-icon">
                        <a id="eskimo-open-search" href="#"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <!-- PAGE TITLE -->
                <div class="eskimo-page-title">
                    <h1><span>Jane Doe</span></h1>
                    <p class="eskimo-page-subtitle">Photographer and Videographer</p>
                </div>
                <!-- ABOUT ME -->
                <div class="row">
                    <div class="col-12 col-lg-8 order-2 order-lg-1">
                        <p>Laborum varias in possumus philosophari nam mandaremus ad malis. Sint fidelissimae tempor fugiat expetendis. Est nisi quibusdam admodum ut noster laborum se tamen culpa aut labore. Senserit sed commodo. Occaecat concursionibus te deserunt ab nam amet mentitum est ea nam dolor malis aute ab iis sempiternum.</p>
                        <p><span class="lead"><em>Ubi nescius a iudicem, non veniam si amet a tempor ad fabulas id ipsum excepteur relinqueret non fore commodo quibusdam, incidi imitaren do mentitum.</em></span></p>
                        <p>Laboris quo ingeniis, eu dolore iudicem fabulas. Si fugiat anim est officia, aut aliqua incididunt efflorescere te varias de nostrud ab quis si si de dolore quem culpa...</p>
                    </div>
                    <div class="col-12 col-lg-4 order-1 order-lg-2 mb-5 mb-lg-0">
                        <img src="images/600x600.png" alt="Jane Doe" class="img-fluid mx-auto d-block eskimo-img-shadow" />
                    </div>
                </div>
                <!-- DIVIDER -->
                <hr />
                <!-- TABS -->
                <h2>WHAT CAN I DO</h2>
                <!-- TABS NAVIGATION -->
                <ul class="nav nav-tabs">
                    <!-- TAB 1 -->
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#mp-tab-fashion" aria-expanded="true">FASHION</a>
                    </li>
                    <!-- TAB 2 -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#mp-tab-wildlife" aria-expanded="false">WILDLIFE</a>
                    </li>
                    <!-- TAB 3 -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#mp-tab-real-estate" aria-expanded="false">REAL ESTATE</a>
                    </li>
                </ul>
                <!-- TABS CONTENT -->
                <div class="eskimo-tabs-content tab-content">
                    <!-- TAB 1 -->
                    <div class="tab-pane fade active show" id="mp-tab-fashion" role="button" aria-expanded="true">
                        <p>Senserit sed commodo. Ubi nescius a iudicem, non veniam si amet a tempor ad fabulas id ipsum excepteur relinqueret non fore commodo quibusdam, incidi imitaren do mentitum. Et enim offendit ingeniis. Dolor probant senserit si mandaremus do nulla laborum, hic aute iudicem expetendis id cupidatat tamen iudicem proident ut eram arbitror aut veniam enim, nostrud. Ex velit arbitror possumus, labore proident consequat, non aute cillum o fabulas ut probant ubi consequat.</p>
                        <p>Excepteur ea probant, expetendis quid proident sed nostrud. Doctrina quis offendit, aliquip summis occaecat singulis nam de aut magna probant ne de sunt nostrud eu ut eram philosophari, ita dolore quamquam coniunctione e ita velit excepteur, ita e dolor amet tamen. Quis occaecat si praesentibus, minim ne mentitum.</p>
                    </div>
                    <!-- TAB 2 -->
                    <div class="tab-pane fade " id="mp-tab-wildlife" role="button" aria-expanded="false">
                        <p>Senserit sed commodo. Ubi nescius a iudicem, non veniam si amet a tempor ad fabulas id ipsum excepteur relinqueret non fore commodo quibusdam, incidi imitaren do mentitum. Et enim offendit ingeniis. Dolor probant senserit si mandaremus do nulla laborum, hic aute iudicem expetendis id cupidatat tamen iudicem proident ut eram arbitror aut veniam enim, nostrud. Ex velit arbitror possumus, labore proident consequat, non aute cillum o fabulas ut probant ubi consequat.</p>
                        <p>Excepteur ea probant, expetendis quid proident sed nostrud. Doctrina quis offendit, aliquip summis occaecat singulis nam de aut magna probant ne de sunt nostrud eu ut eram philosophari, ita dolore quamquam coniunctione e ita velit excepteur, ita e dolor amet tamen. Quis occaecat si praesentibus, minim ne mentitum.</p>
                    </div>
                    <!-- TAB 3 -->
                    <div class="tab-pane fade " id="mp-tab-real-estate" role="button" aria-expanded="false">
                        <p>Senserit sed commodo. Ubi nescius a iudicem, non veniam si amet a tempor ad fabulas id ipsum excepteur relinqueret non fore commodo quibusdam, incidi imitaren do mentitum. Et enim offendit ingeniis. Dolor probant senserit si mandaremus do nulla laborum, hic aute iudicem expetendis id cupidatat tamen iudicem proident ut eram arbitror aut veniam enim, nostrud. Ex velit arbitror possumus, labore proident consequat, non aute cillum o fabulas ut probant ubi consequat.</p>
                        <p>Excepteur ea probant, expetendis quid proident sed nostrud. Doctrina quis offendit, aliquip summis occaecat singulis nam de aut magna probant ne de sunt nostrud eu ut eram philosophari, ita dolore quamquam coniunctione e ita velit excepteur, ita e dolor amet tamen. Quis occaecat si praesentibus, minim ne mentitum.</p>
                    </div>
                </div>
                <!-- DIVIDER -->
                <hr />
                <h2>PORTFOLIO</h2>
                <p>Possumus e aute sed se litteris in aliquip, a tamen quem qui pariatur ex pariatur nam nulla possumus, magna do nostrud non quid qui cernantur eram aliqua e illum labore proident consequat.</p>
                <!-- IMAGE GALLERY -->
                <div class="eskimo-masonry-grid eskimo-gallery">
                    <div class="eskimo-four-columns" data-columns>
                        <!-- GALLERY ITEM 1 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 2 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 3 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 4 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 5 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 6 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 7 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                        <!-- GALLERY ITEM 8 -->
                        <div class="eskimo-gallery-item">
                            <a href="#" data-featherlight="images/1400x1000.png" class="eskimo-lightbox">
                                <img src="images/900x600.png" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <!-- DIVIDER -->
                <hr />
                <h2>CONTACT ME</h2>
                <p>Possumus e aute sed se litteris in aliquip, a tamen quem qui pariatur ex pariatur nam nulla possumus, magna do nostrud non quid qui cernantur eram aliqua e illum labore proident consequat.</p>
                <!-- CONTACT FORM -->
                <form id="ajax-form" action="mailer.php" method="post">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <p>
                            <label>Your Name</label><br />
                            <input type="text" name="sendername" id="sendername" class="form-control" required="required" maxlength="50" />
                        </p>
                        <p>
                            <label>Your Email</label><br />
                            <input type="email" name="senderemail" id="senderemail" class="form-control" required="required" maxlength="50" />
                        </p>
                        <p>
                            <label>Phone Number</label><br />
                            <input type="text" name="senderphone" id="senderphone" class="form-control" maxlength="50" />
                        </p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p>
                            <label>Your Message</label><br />
                            <textarea name="sendermessage" id="sendermessage" required="required" class="form-control form-fixed-height"></textarea>
                        </p>
                        <button id="sendbutton" type="submit" class="btn btn-lg w-100">Send Message</button>
                    </div>
                </div>
                </form>
                <div id="form-messages"></div>
            </div>
        </main>
        <!-- FOOTER -->
        <footer id="eskimo-footer">
            <div class="container">
                <div class="row eskimo-footer-wrapper">
                    <!-- FOOTER WIDGET 1 -->
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <h5 class="eskimo-title-with-border"><span>About Me</span></h5>
                        <p>Trusted by thousands of customers, my unique themes and plugins help you make beautiful responsive web sites with ease.</p>
                        <p><a href="about.html" class="btn btn-default">Read More</a></p>
                    </div>
                    <!-- FOOTER WIDGET 2 -->
                    <div class="col-12 col-lg-6">
                        <h5 class="eskimo-title-with-border"><span>Newsletter</span></h5>
                        <form method="post" action="index.html">
                            <label>Subscribe to our mailing list!</label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="EMAIL" placeholder="Your email address" required />
                                <div class="input-group-append">
                                    <input type="submit" value="Sign up" class="btn btn-default" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CREDITS -->
                <div class="eskimo-footer-credits">
                    <p>
                        Made with love by <a href="https://themeforest.net/user/egemenerd" target="_blank">Egemenerd</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- GO TO TOP BUTTON -->
    <a id="eskimo-gototop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- SLIDE PANEL OVERLAY -->
    <div id="eskimo-overlay"></div>
    <!-- SLIDE PANEL -->
    <div id="eskimo-panels">
        <aside id="eskimo-panel" class="eskimo-panel">
            <div class="eskimo-panel-inner">
                <!-- CLOSE SLIDE PANEL BUTTON -->
                <a href="#" class="eskimo-panel-close"><i class="fa fa-times"></i></a>
                <!-- AUTHOR BOX -->
                <div class="eskimo-author-box eskimo-widget">
                    <div class="eskimo-author-img">
                        <img src="images/300x300.png" alt="JOHN DOE" />
                    </div>
                    <h3><span>JOHN DOE</span></h3>
                    <p class="eskimo-author-subtitle">WEB DESIGNER &amp; DEVELOPER</p>
                    <p class="eskimo-author-description">I'm a Web Developer and Designer with a strong passion for UX/UI design. I have experience building websites, web applications, and brand assets. Contact me if you have any questions!</p>
                    <div class="eskimo-author-box-btn">
                        <a class="btn btn-default" href="about.html">CONTACT ME</a>
                    </div>
                </div>
                <!-- RECENT POSTS -->
                <div class="eskimo-recent-entries eskimo-widget">
                    <h5 class="eskimo-title-with-border"><span>Recent Posts</span></h5>
                    <ul>
                        <li>
                            <a href="single-post.html">Ketchup Flavored Ice Cream!</a>
                            <span class="post-date">May 28, 2018</span>
                        </li>
                        <li>
                            <a href="single-post.html">Hair You've Always Dreamed Of</a>
                            <span class="post-date">May 27, 2018</span>
                        </li>
                        <li>
                            <a href="single-post.html">15 Of The World's Best Carnivals</a>
                            <span class="post-date">May 25, 2018</span>
                        </li>
                        <li>
                            <a href="single-post.html">5 Ways to a Healthy Lifestyle</a>
                            <span class="post-date">May 25, 2018</span>
                        </li>
                        <li>
                            <a href="single-post.html">Best Breakfast In The World</a>
                            <span class="post-date">May 23, 2018</span>
                        </li>
                    </ul>
                </div>
                <!-- CATEGORIES -->
                <div class="eskimo-categories eskimo-widget">
                    <h5 class="eskimo-title-with-border"><span>Categories</span></h5>
                    <ul>
                        <li>
                            <a href="category.html" title="The best restaurants, cafes, bars and shops in town.">Food &amp; Drink</a> <span class="badge badge-pill badge-default">5</span>
                        </li>
                        <li>
                            <a href="category.html" title="An up-to-date, personal urban guide.">Lifestyle</a> <span class="badge badge-pill badge-default">5</span>
                        </li>
                        <li>
                            <a href="category.html" title="Latest technology news and updates.">Technology</a> <span class="badge badge-pill badge-default">4</span>
                        </li>
                        <li>
                            <a href="category.html" title="Travel advice, information and inspiration.">Travel</a> <span class="badge badge-pill badge-default">5</span>
                        </li>
                        <li>
                            <a href="category.html" title="The latest news about movies and TV shows.">TV &amp; Movies</a> <span class="badge badge-pill badge-default">4</span>
                        </li>
                    </ul>
                </div>
                <!-- TAGS -->
                <div class="eskimo-widget">
                    <h5 class="eskimo-title-with-border"><span>Tags</span></h5>
                    <div class="eskimo-tag-cloud">
                        <a href="category.html">aute<span>7</span></a>
                        <a href="category.html">enim<span>7</span></a>
                        <a href="category.html">commodo<span>7</span></a>
                        <a href="category.html">voluptatibus<span>7</span></a>
                        <a href="category.html">culpa<span>7</span></a>
                        <a href="category.html">offendit<span>7</span></a>
                        <a href="category.html">magna<span>7</span></a>
                        <a href="category.html">quorum<span>7</span></a>
                        <a href="category.html">mandaremus<span>7</span></a>
                        <a href="category.html">ingeniis<span>7</span></a>
                        <a href="category.html">tempor<span>7</span></a>
                        <a href="category.html">summis<span>7</span></a>
                        <a href="category.html">consequat<span>6</span></a>
                        <a href="category.html">iudicem<span>6</span></a>
                        <a href="category.html">expetendis<span>6</span></a>
                        <a href="category.html">deserunt<span>6</span></a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <!-- FULLSCREEN SEARCH -->
    <div id="eskimo-fullscreen-search">
        <div id="eskimo-fullscreen-search-content">
            <a href="#" id="eskimo-close-search"><i class="fa fa-times"></i></a>
            <form role="search" method="get" action="search.html" class="eskimo-lg-form">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Enter a keyword..." name="s" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JS FILES -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/salvattore.min.js"></script>
    <script src="js/panel.js"></script>
    <script src="js/reading-position-indicator.js"></script>
    <script src="js/featherlight.js"></script>
    <script src="js/ajax-contact-form.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>