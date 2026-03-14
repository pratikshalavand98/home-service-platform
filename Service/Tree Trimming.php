<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>homeservices - Online Service Provider for your House Needs</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/services/logo2.jpg">
    <link href="assets/css/style.css" rel="stylesheet" media="screen">
    <link href="assets/css/chblue.css" rel="stylesheet" media="screen">
    <link href="assets/css/theme-responsive.css" rel="stylesheet" media="screen">
    <link href="assets/css/dtb/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/select2.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/toastr.min.css" rel="stylesheet" media="screen">        
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.1.10.4.min.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/modernizr.js"></script>
    <script>
       function calculatePrice() {
    // Get the selected damage level's price
    var damageSelect = document.getElementById('damageSelect');
    var selectedPrice = parseInt(damageSelect.value);

    // Set the price
    document.getElementById('price').innerText = '₹' + selectedPrice;

    // Calculate total (Price - Discount, if any)
    var discount = 0; // You can set a discount if needed
    var totalPrice = selectedPrice - discount;

    // Update total price
    document.getElementById('total').innerText = '₹' + totalPrice;
}
    </script>
</head>
<body>
    <div id="layout">
        <div class="info-head">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="visible-md visible-lg text-left">
                            <li><a href="tel:+911234567890"><i class="fa fa-phone"></i> +91-1234567890</a></li>
                            <li><a href="mailto:contact@surfsidemedia.in"><i class="fa fa-envelope"></i>
                                    contact@HomeServices.in</a></li>
                        </ul>
                        <ul class="visible-xs visible-sm">
                            <li class="text-left"><a href="tel:+911234567890"><i class="fa fa-phone"></i>
                                    +91-1234567890</a></li>
                            <li class="text-right"><a href="index.php/changelocation.html"><i
                                        class="fa fa-map-marker"></i> Baramati, Pune</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="visible-md visible-lg text-right">
                            <li><a href="index.php/changelocation.html"><i class="fa fa-comment"></i> Live Chat</li>
                            <li><a href="http://localhost/Hsp/change-location.html"><i class="fa fa-map-marker"></i> Baramati, Pune</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <label for="mobile-button"> <i class="fa fa-bars"></i></label>
                <input id="mobile-button" type="checkbox">

                <ul class="collapse">
                    <li class="title">
                        <a href="http://localhost/hsP/mainpage.php"><img src="\HSP\images\services\logo2.jpg" ></a>
                    </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Hsp/mainpage.php"><i class=""></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services"><i class="fas fa-concierge-bell"></i> Services</a>
                    <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Electronic%20repair.php">Electronic Repair</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/ErWiring.php">Wiring</a></li>
                            <li><a href="http://localhost/hsP/Service/erconnection.php">get connection</a></li>
                        </ul></li>
                            <li><a href="http://localhost/hsP/Service/Plumbing%20Repair.php">Plumber</a> <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/plumbingTap.php">Tap Repair</a></li>
                            <li><a href="http://localhost/hsP/Service/PlumbingPipe.php">Pipe Fixing</a></li>
                          
                        </ul>
                        </li>
                            <li><a href="http://localhost/hsP/Service/Pest%20Control.php">pest control</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Termite%20Control.php">Termite Control</a></li>
                           <li><a href="http://localhost/hsP/Service/PesticidesRodent.php">Rodent Control</a></li>
                           <li><a href="http://localhost/hsP/Service/Cockroach%20Control.php">Cockroach Control</a></li>
                          
                        </ul>
                        </li>
                            <li><a href="http://localhost/hsP/Service/Home%20Cleaning.php">Home Cleaning</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Deep%20Cleaning.php">Deep Cleaning</a></li>
                     <li><a href="http://localhost/hsP/Service/Regular%20Cleaning.php">Regular Cleaning</a></li>
                         <li><a href="http://localhost/hsP/Service/cleaning.php">Move-In/Move-Out Cleaning</a></li>
                        </ul></li>
                            <li><a href="http://localhost/hsP/Service/Gardening.php">Gardening</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Lawn%20Care.php">Lawn Care</a></li>
                       <li><a href="http://localhost/hsP/Service/Tree%20Trimming.php">Tree Trimming</a></li>
                      <li><a href="http://localhost/hsP/Service/Garden%20Design.php">Garden Design</a></li>
                          
                        </ul>
                            <li><a href="http://localhost/hsP/Service/Custom%20Carpentry.php">Carpentry</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Furniture%20Repair.php">Furniture Repair</a></li>
                                 <li><a href="http://localhost/hsP/Service/Custom%20Carpentry.php">Custom Carpentry</a></li>
                                  <li><a href="http://localhost/hsP/Service/CabinetCarpentry.php">Cabinet Installation</a></li>
                        </ul>
                        </li>
                            <li><a href="http://localhost/hsP/Service/Meal%20Preparation.php">Cooking</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Personal%20Chef.php">Personal Chef</a></li>
                            <li><a href="http://localhost/hsP/Service/Meal%20Preparation.php">Meal Preparation</a></li>
                          
                        </ul>
                        </li>
                            <li><a href="http://localhost/hsP/Service/Exterior%20Painting.php">Painting</a>
                            <ul class="drop-down one-column hover-fade">
                            <li><a href="http://localhost/hsP/Service/Interior%20Painting.php">Interior Painting</a></li>
                             <li><a href="http://localhost/hsP/Service/Exterior%20Painting.php">Exterior Painting</a></li>
                             <li><a href="http://localhost/hsP/Service/Wallpaper%20Painting.php">Wallpaper Installation</a></li>
                          
                        </ul>
                        </li>
                        
                        </ul></li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#providers"><i class=""></i> Providers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Hsp/contact-us.html"title="Contact Us"><i class=""></i> Contact</a>
                </li>
                    <li class="login-form"> <a href="index.php/register.html" title="My Account">My Account</a></li>
                    <li class="login-form"> <a href="http://localhost/hsP/forms/index.php" title="Customer_Login">Login</a></li>
                        <li class="login-form"> <a href="http://localhost/hsP/homeservices/login.php" title="Service Provider Login">Provider Login</a></li>
                    <li class="search-bar">
                    </li>
                </ul>
            </nav>
        </header>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Gardening</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="http://localhost/Hsp/mainpage.php">Home</a></li>
                            <li>/</li>
                            <li>Gardening</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="semiboxshadow text-center">
                <img src="img/img-theme/shp.png" class="img-responsive" alt="">
            </div>
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 single-blog">
                                <div class="post-item">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-header">
                                                <div class="post-format-icon post-format-standard"
                                                    style="margin-top: -10px;">
                                                    <i class="fa fa-image"></i>
                                                </div>
                                                <div class="post-info-wrap">
                                                    <h2 class="post-title"><a href="#" title="Post Format: Standard"
                                                            rel="bookmark">Tree Trimming</a></h2>
                                                    <div class="post-meta" style="height: 10px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="single-carousel">
                                                <div class="img-hover">
                                                    <img src="\HSP\Service\images\Tree Trimming.jpg" alt=""
                                                        class="img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-content">
                                                <h3>Tree Trimming</h3>
                                                <p>Tree trimming is the process of cutting away dead or overgrown branches to promote tree health and improve aesthetics. Proper tree trimming can prevent damage to property and reduce the risk of fallen branches during storms.</p>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <aside class="widget" style="margin-top: 18px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Booking Details</div>
                                        <div class="panel-body">
                                        <table class="table">
    <tr>
        <td style="border-top: none;">Price</td>
        <td style="border-top: none;" id="price">₹300</td>
    </tr>
    <tr>
        <td>Select Type</td>
        <td>
            <select id="damageSelect" onchange="calculatePrice()">
                <option value="00" data-hourly-rate="300">Small trees (up to 30 feet)</option>
                <option value="400" data-hourly-rate="400">Medium trees (30 to 60 feet)</option>
                <option value="800" data-hourly-rate="800">Large trees (60 to 80 feet)</option>
            </select>
        </td>
    </tr>
 
    <tr>
        <td>Discount</td>
        <td id="discount">₹0</td>
    </tr>
    <tr>
        <td>Total</td>
        <td id="total">₹300</td>
    </tr>
</table>
                                        </div>
                                        <div class="panel-footer">
                                        <form>                                                
                                               <a href="http://localhost/hsP/homeservices/index.php"> <button class="btn btn-primary" type="button">search</button></a>
                                            </form>
                                        </div>
                                    </div>
                                </aside>
                                <aside>
                                   
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </section>
        <footer id="footer" class="footer-v1">   
            <div class="footer-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <h3 style="margin-top: 10px">FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="https://www.facebook.com/"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="https://x.com/i/flow/login"></a></li>
                            <li class="github"><span><i class="fa fa-instagram"></i></span><a href="https://www.instagram.com/"></a></li>
                        </ul>
                            <ul class="nav-footer">
                                <li><a href="http://localhost/Hsp/about-us.html">About Us</a> </li>
                                <li><a href="http://localhost/Hsp/contact-us.html">Contact Us</a></li>
                                <li><a href="http://localhost/Hsp/faq.html">FAQ</a></li>
                                <li><a href="http://localhost/Hsp/terms-of-use.html">Terms of Use</a></li>
                                <li><a href="http://localhost/Hsp/privacy.html">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p class="text-xs-center crtext">&copy; 2024 HomeServices. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>                
            </div>            
        </footer>
    </div>
    <script type="text/javascript" src="assets/js/nav/jquery.sticky.js"></script>
    <script type="text/javascript" src="assets/js/totop/jquery.ui.totop.js"></script>
    <script type="text/javascript" src="assets/js/accordion/accordion.js"></script>
    <script type="text/javascript" src="assets/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="assets/js/maps/gmap3.js"></script>
    <script type="text/javascript" src="assets/js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="assets/js/carousel/carousel.js"></script>
    <script type="text/javascript" src="assets/js/filters/jquery.isotope.js"></script>
    <script type="text/javascript" src="assets/js/twitter/jquery.tweet.js"></script>
    <script type="text/javascript" src="assets/js/flickr/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="assets/js/theme-options/theme-options.js"></script>
    <script type="text/javascript" src="assets/js/theme-options/jquery.cookies.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap-slider.js"></script>
    <script type="text/javascript" src="assets/js/dtb/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dtb/jquery.table2excel.js"></script>
    <script type="text/javascript" src="assets/js/dtb/script.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/validation-rule.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html> 