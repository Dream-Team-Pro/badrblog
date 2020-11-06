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
                <div class="eskimo-page-title eskimo-author-title">
                    <h1>
                        <img alt='' src='images/100x100.png' />
                        <span><small>All Posts By</small> Egemenerd</span>
                    </h1>
                    <p class="eskimo-page-subtitle">I&#039;m a Web Developer and Graphic Designer Living in New York.</p>
                </div>
                <!-- BLOG POSTS -->
                <!-- POST 1 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Food &amp; Drink</a>
                            </div>
                            <h3 class="card-title"><a href="single-post.html">Ketchup Flavored Ice Cream!</a></h3>
                            <div class="card-excerpt">
                                <p>Mandaremus illum possumus ullamco e qui de nisi enim anim. Si nulla si nisi, veniam litteris sed excepteur ne ut amet deserunt tempor nam expetendis de enim mandaremus. Ita ea minim esse cillum ut eram arbitror ullamco. Tamen ad expetendis ab ipsum proident...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 28, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">3 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 2 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">Hair You've Always Dreamed Of</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Ex si esse deserunt, et dolore occaecat, singulis tamen e possumus voluptatibus, varias cernantur si aute quid. Noster vidisse iis exquisitaque, deserunt te irure. Ubi illum nostrud fidelissimae id occaecat duis probant. Occaecat hic quorum aliquip se...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 27, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">3 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 3 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Lifestyle</a>, <a href="category.html">Travel</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">15 Of The World's Best Carnivals</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Aliquip e duis. Se labore ullamco excepteur iis ullamco sint duis laboris amet sed ita occaecat de cernantur quo fore coniunctione voluptate enim senserit. Si ut nulla laboris, an eiusmod e incididunt. Non varias enim duis singulis, a quorum cupidatat. Voluptate summis...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 25, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">2 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 4 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">5 Ways to a Healthy Lifestyle</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Mandaremus veniam ab cupidatat exquisitaque, e quae laboris domesticarum, non sint mentitum fabulas de anim proident transferrem, ita aliqua imitarentur in in labore illum eram offendit, nisi fidelissimae possumus noster ullamco se eiusmod multos ex...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 25, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">3 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 5 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Food &amp; Drink</a>, <a href="category.html">Travel</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">Best Breakfast In The World</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Fabulas relinqueret aut quamquam. Lorem possumus pariatur ut quibusdam transferrem an tempor. E consequat nam senserit, aliquip tamen est commodo illustriora. An cillum sunt ut quamquam. Laboris culpa occaecat, quo fugiat dolore varias consequat...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 23, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">3 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 6 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Food &amp; Drink</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">Best and Worst Summer Foods</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Admodum comprehenderit id non cillum anim de appellat, ubi tamen singulis sempiternum, occaecat sunt appellat appellat ex varias an in quem laborum an si ita quid multos irure do excepteur culpa quamquam. Nam aliqua iudicem aliquip o sunt cupidatat...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 22, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">3 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 7 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">What Is Perfect Training?</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Non in familiaritatem, esse mentitum deserunt. Sunt excepteur quamquam. Enim ullamco consequat, nisi se singulis non fugiat. Nulla laboris tractavissent, tempor hic illum vidisse. Tempor qui noster incurreret, officia in ingeniis ubi in sunt arbitror ubi...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 21, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">2 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- POST 8 -->
                <div class="card card-horizontal">
                    <div class="card-body">
                        <div class="card-horizontal-left">
                            <div class="card-category">
                                <a href="category.html">Technology</a>
                            </div>
                            <h3 class="card-title">
                                <a href="single-post.html">The Best Cameras For Beginners</a>
                            </h3>
                            <div class="card-excerpt">
                                <p>Pariatur ab enim ita in ne philosophari, cillum incididunt voluptate hic aut quorum vidisse distinguantur, quis possumus cohaerescant, mentitum eruditionem iis aliquip, ubi quem possumus quamquam ea o eiusmod graviterque culpa expetendis ingeniis...</p>
                            </div>
                            <div class="card-horizontal-meta">
                                <div class="eskimo-author-meta">
                                    By <a class="author-meta" href="author.html">Egemenerd</a>
                                </div>
                                <div class="eskimo-date-meta">
                                    <a href="single-post.html">May 20, 2018</a>
                                </div>
                                <div class="eskimo-reading-meta">2 min read</div>
                            </div>
                        </div>
                        <div class="card-horizontal-right" data-img="images/1024x680.png">
                            <a class="card-featured-img" href="single-post.html"></a>
                        </div>
                    </div>
                </div>
                <!-- PAGINATION -->
                <div class="eskimo-pager">
                    <ul class='pagination flex-wrap'>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href="#"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
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
    <script src="js/panel.js"></script>
    <script src="js/reading-position-indicator.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>