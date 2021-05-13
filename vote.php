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
    if(!isset($_SESSION['usermatric'])) {
       

        ?>

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title text-center">Let`s get you accredited</h2>
                </div>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="./accredit" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter your full name'"
                                        placeholder="Enter your full name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'" placeholder="Email">
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
                            <button type="submit" name="accredit" class="button button-contactForm boxed-btn">Submit
                                Details</button>
                        </div>
                    </form>
                </div>

            </div>


            <?php
        
    } else {
?>

            <div id="accordion">
                <div class="card">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">FRESHER OF THE YEAR</b>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p style="color: black;"><b>Ajibade Adeife</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ajibade Adeife</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>



                                        </tbody>
                                    </table>

                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Female Category</p>
                                                <td>
                                                    <p style="color: black;"><b>George Ibukun</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Folaji Phoebe</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div id="accordion">
                <div class="card">
                    <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">Mr. COSMAS</b>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adeleye Korede</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Akinmola Ayomide</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Opara David</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <a style="padding: 17px 10px; background: #7681b0; color: white;"
                                                        class="btn_1" href="#">Vote</a>
                                                </td>

                                            </tr>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }
        ?>
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