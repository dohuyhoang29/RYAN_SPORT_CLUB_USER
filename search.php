<?php
    require_once('./Database.php');
    require_once('./initialize.php');
    
    $search = $_GET['search'];
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RYAN SPORT CLUB</title>

    <!-- Font chữ Google -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Link Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Tạo animation cho phần load file -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- header -->
    <?php
        include_once('./header.php');
    ?>

    <!-- Menu con -->
    <section class="breadcrumb-section set-bg spad" data-setbg="img/aboutbread.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Gallery</h2>
                        <div class="breadcrumb-controls">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Search</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- nỘI DUNG SEARCH -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery-controls">
                        <ul>
                            <li class="active" data-filter="*">All GALLERY</li>
                            <li data-filter=".indoor">Indoor Sport</li>
                            <li data-filter=".outdoor">Outdoor Sport</li>
                            <li data-filter=".recreation">Recreation</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row gallery-filter">
                <?php
                $picture_set = search_all($search);
                $count = mysqli_num_rows($picture_set);
                for ($i = 0; $i < $count; $i++) :
                    $picture = mysqli_fetch_assoc($picture_set);
                ?>
                    <?php if ($picture['CategoryName'] == "Indoor Sport") : ?>
                        <div class="col-lg-3 col-sm-4 mix * indoor">
                        <?php endif; ?>
                    <?php if ($picture['CategoryName'] == "Outdoor Sport") : ?>
                        <div class="col-lg-3 col-sm-4 mix * outdoor">
                    <?php endif; ?>
                    <?php if ($picture['CategoryName'] == "Recreation") : ?>
                        <div class="col-lg-3 col-sm-4 mix * recreation">
                    <?php endif; ?>
                    <div class="gallery-item">
                        <img style="width: 370px; height: 282px;" src="<?php echo  './img/' . $picture['URL']; ?>" alt="">
                        <div class=" gi-hover-warp">
                            <div class="gi-hover">
                                <a href="<?php echo  './img/' . $picture['URL']; ?>" class="image-popup"><i class="fa fa-search-plus"></i></a>
                                <a href="<?php echo "ViewService.php?ServiceID=" . $picture['ServiceID']; ?>"><i class="fa fa-chain"></i></a>
                                <h6><?php echo $picture['Name']; ?>
                                    <?php if ($picture['CategoryName'] == "Indoor Sport") : ?>
                                        <span><?php echo $picture['CategoryName']; ?></span>
                                    <?php endif; ?>
                                    <?php if ($picture['CategoryName'] == "Outdoor Sport") : ?>
                                        <span><?php echo $picture['CategoryName']; ?></span>
                                    <?php endif; ?>
                                    <?php if ($picture['CategoryName'] == "Recreation") : ?>
                                        <span><?php echo $picture['CategoryName']; ?></span>
                                    <?php endif; ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endfor;
                        mysqli_free_result($picture_set);
                    ?>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo-item">
                        <div class="f-logo">
                            <a href="./home.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <p>Despite growth of the Internet over the past seven years, the use of toll-free phone numbers
                            in television advertising continues.</p>
                        <div class="social-links">
                            <h6>Follow us</h6>
                            <a href="https://www.facebook.com/aptechvietnam.com.vn/"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.aptechvietnam.com.vn/"><i class="fa fa-globe"></i></a>
                            <a href="https://www.youtube.com/user/aprotrainaptechvn"><i
                                    class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Our Blog</h5>
                        <div class="footer-blog">
                            <a href="./event.html" class="fb-item">
                                <h6>Annual football tournament </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> May 05, 2021</span>
                            </a>
                            <a href="./event.html" class="fb-item">
                                <h6>Annual basketball tournament</h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> May 06, 2021</span>
                            </a>
                            <a href="./event.html" class="fb-item">
                                <h6>International swimming tournament </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> May 07, 2021</span>
                            </a>
                            <a href="./event.html" class="fb-item">
                                <h6>International badminton tournament </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> May 08, 2021</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Program</h5>
                        <ul class="workout-program">
                            <li><a href="./Service.php">Indoor Sport</a></li>
                            <li><a href="./Service.php">Outdoor Sport</a></li>
                            <li><a href="./Service.php">Recreation</a></li>
                            <li><a href="./gallery.php">Pictures</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>Get Info</h5>
                        <ul class="footer-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>Phone:</span>
                                (+84) 866539370 <br>
                                (+84) 853039990 <br>
                                (+84) 965806180 <br>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <span>Email:</span>
                                hoang.dh.866@aptechlearning.edu.vn
                                khang.pd.873@aptechlearning.edu.vn
                                tu.na.856@aptechlearning.edu.vn
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>Address</span>
                                285 Đội Cấn-Vĩnh Phú-Ba Đình-Hà Nội
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="ct-inside">
                            Copyright &copy; All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by eProject 2</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Link js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php
db_disconnect($db);
?>