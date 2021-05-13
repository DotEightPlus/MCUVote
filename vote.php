<?php include("include/header.php"); ?>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Vote Nominees</h2>
                            <p>Votng Starts: | Voting Ends: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">


            <?php
    if(!isset($_SESSION['matric'])) {
       

        ?>

            <div class="col-12">
                <h4 class="contact-title text-center">Ouch! Your details aren`t registered.
                </h4>
            </div>
            <div class="col-lg-12">
                <form class="form-contact contact_form" action="./accredit" method="post" id="contactForm"
                    novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your full name'"
                                    placeholder="Enter your full name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control valid" name="matric" id="matric" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Matric Number'"
                                    placeholder="Matric Number">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-select form-group">
                                <select name="dept" id="dept">
                                    <option name="dept" id="dept">Accounting</option>
                                    <option name="dept" id="dept">Banking and Finance</option>
                                    <option name="dept" id="dept">Economics</option>
                                    <option name="dept" id="dept">Business Administration</option>
                                    <option name="dept" id="dept">International Relations</option>
                                    <option name="dept" id="dept">Mass Communication</option>
                                    <option name="dept" id="dept">My department is not listed</option>fd
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-select form-group">
                                <select name="gender" id="gender">
                                    <option name="gender" id="gender">Male</option>
                                    <option name="gender" id="gender">Female</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-3">
                        <p>Your details aren`t saved. The magic happens right here on your browser. We respect your
                            privacy</p>
                        <button type="submit" name="register" class="button button-contactForm boxed-btn">Register
                            Me</button>
                    </div>
                </form>
            </div>


            <?php
        
    } else {

        
    }

?>

            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="assets/img/gallery/card1.png" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" value="1" min="0" max="10">
                                        <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="assets/img/gallery/card2.png" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$360.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" value="1" min="0" max="10">
                                        <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>$720.00</h5>
                                </td>
                            </tr>
                            <tr class="bottom_button">
                                <td>
                                    <a class="btn_1" href="#">Update Cart</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="cupon_text float-right">
                                        <a class="btn_1" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
</main>

<?php include("include/footer.php"); ?>

<!-- JS here -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: #f9f9ff; color: #ff0000;" class="modal-content">
            <div class="modal-body">
                <div id="msg" class="text-center"></div>
            </div>
        </div>
    </div>
</div>



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

<!-- Scrollup, nice-select, sticky -->
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
<script src="ajax.js"></script>

</body>

</html>