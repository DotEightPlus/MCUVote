<?php include("include/header.php"); ?>
<main>
    <!--? Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Programmes</h2>
                            <p id="demo"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Hero Area End-->

    <!-- About Details Start -->
    <div class="about-details section-padding30">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-lg-8">
                    <div class="about-details-cap mb-50">
                        <h4>Monday, 21st June 2021</h4>
                        <p> • Game Night :- <b>
                                Time: 7:00PM – 9:00PM
                        </p>
                    </div>

                    <div class="about-details-cap mb-50">
                        <h4>Tuesday, 22nd June 2021</h4>
                        <p>• Symposium by a Guest Lecturer :- <b>Time: 3:00PM - 4:30PM</b>
                        </p>
                        <p> • Questions and Answers with Alumni <b>
                                :- Time: 4:30PM - 5:00PM
                            </b>
                        </p>
                    </div>

                    <div class="about-details-cap mb-50">
                        <h4>Wednessday, 23rd June 2021</h4>
                        <p>• Sports (Indoor and Outdoor Events :- <b> Time: 3:00PM - 6:00PM
                        </p>
                        <p> • Movie Night:- <b> Time: 7:00PM - 9:00PM</b>

                        </p>
                    </div>

                    <div class="about-details-cap mb-50">
                        <h4>Thursday, 24th June 2021</h4>
                        <p>• STUDPRENUERSHIP :- <b>Time: 3:00PM - 5:00PM</b>
                        </p>
                        <p> • Bonfire :- <b> Time: 7:00PM – 9:30PM</b>

                        </p>
                    </div>

                    <div class="about-details-cap mb-50">
                        <h4>Friday, 25th June 2021</h4>
                        <p>• Dinner/Award Night :- <b> Time: 8:00PM - 11:45PM </b>
                        </p>
                    </div>

                    <div class="about-details-cap mb-50">
                        <h4>Sunday, 27th June 2021</h4>
                        <p>• Thanksgiving :- <b> Time: 9:00AM - 11:00AM </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Details End -->

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
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jun 25, 2021 12:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "Days | " + hours + "Hours | " +
        minutes + "Minutes | " + seconds + "Seconds";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
</body>

</html>