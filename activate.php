<?php include("include/header.php");

//validate link
if(!isset($_GET['id']) ||  $_GET['id'] == '') {

    redirect("./opps");
} else {

 $data = $_GET['id'];
    
//retrieve activator details
$sql = "SELECT * FROM users WHERE `activator` = '$data'";
$rsl = query($sql);

if(row_count($rsl) == '') {
   
   redirect("./opps"); 
} else {

    //verify email
    $ssl = "UPDATE users SET `activator` = '', `active` = '1' WHERE `activator` = '$data'";
    $rl  = query($ssl);

    unset($_SESSION['mail']);
}

}
?>
<main>
    <!--? Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Hurray!</h2>
                            <p style="font-size: 15px;">Your email has been verified successfully<br> Check your mail
                                for a voting code</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--? Hero Area End-->

</main>
<?php include("include/footer.php"); ?>

<!-- JS here -->

<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>

<!-- Scroll up, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

<script>
function goBack() {
    window.history.back()
}
</script>

</body>

</html>