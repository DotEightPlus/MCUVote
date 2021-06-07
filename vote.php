<?php include("include/header.php"); ?>
<style>
button {

    cursor: pointer;
    padding: 17px 10px;
    background: #7681b0;
    color: white;
    border-radius: 10px;
    border: none;
}
</style>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Vote Nominees</h2>
                            <p id="demo"></p>
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
                            <b style="color: #ffffff;" id="fresher">Fresher of the Year</b>
                            <p id="fresher" hidden>Fresher of the Year</p>

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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <p>Male Category</p>
                                                <td>
                                                    <p id="ajibade" style="color: black;"><b>Ajibade Adeife</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>

                                                <td id="rate">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ajibade Adeife' AND `category` LIKE 'fresh_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id='fresher1'>Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="olamilekan" style="color: black;"><b>Otemoye Olamilekan</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td id="ratea">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Olamilekan' AND `category` LIKE 'fresh_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                <td>
                                                    <button id='fresher2'>Vote</button>
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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Female Category</p>
                                                <td>
                                                    <p id="george" style="color: black;"><b>George Ibukun</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td id="rateb">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'George Ibukun' AND `category` LIKE 'fresh_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="freshers1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="folajip" style="color: black;"><b>Folaji Phoebe</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td id="ratec">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Folaji Phoebe' AND `category` LIKE 'fresh_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id="freshers2">Vote</button>
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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p id="adeleye" style="color: black;"><b>Adeleye Korede</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rated">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adeleye Korede' AND `category` LIKE 'mr'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="mr1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="akinmola" style="color: black;"><b>Akinmola Ayomide</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="ratee">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Akinmola Ayomide' AND `category` LIKE 'mr'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="mr2">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="opara" style="color: black;"><b>Opara David</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratef">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Opara David' AND `category` LIKE 'mr'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="mr3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="kambi" style="color: black;"><b>Kembi Oluwatomisin</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateg">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Kambi Tomisin' AND `category` LIKE 'mr'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="mr4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="kumuyi" style="color: black;"><b>Kumuyi Wisdom</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateh">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Kumuyi Wisdom' AND `category` LIKE 'mr'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="mr5">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="ewelike" style="color: black;"><b>Ewelike Kelvin</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="ratei">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ewelike Kelvin' AND `category` LIKE 'mr'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="mr6">Vote</button>
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
                    <a class="card-link" data-toggle="collapse" href="#collapseThree">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">Miss. COSMAS</b>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p id="omomia" style="color: black;"><b>Omomia Favour</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="ratej">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Omomia Favour' AND `category` LIKE 'miss'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="miss1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="rasheed" style="color: black;"><b>Rasheed Loveth</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="ratek">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Rasheed Loveth' AND `category` LIKE 'miss'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="miss2">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="aremu" style="color: black;"><b>Aremu Ololade</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratel">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Aremu Ololade' AND `category` LIKE 'miss'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="miss3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="olagunju" style="color: black;"><b>Olagunju Oluwatoke</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratem">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Olagunju Oluwatoke' AND `category` LIKE 'miss'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="miss4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="atanda" style="color: black;"><b>Atanda Precious</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="raten">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Atanda Precious' AND `category` LIKE 'miss'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="miss5">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="ologun" style="color: black;"><b>Ologun Oyinkansola</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateo">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ologun Oyinkansola' AND `category` LIKE 'miss'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="miss6">Vote</button>
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
                    <a class="card-link" data-toggle="collapse" href="#collapseFour">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">Best Personality</b>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td id="oluyombo">
                                                    <p style="color: black;"><b>Oluyombo Erioluwa</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratep">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oluyombo Erioluwa' AND `category` LIKE 'maleperson'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id="personMale1">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="oladapo" style="color: black;"><b>Oladapo Tioluwani</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateq">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oladapo Tioluwani' AND `category` LIKE 'maleperson'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="personMale2">Vote</button>
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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Female Category</p>
                                                <td>
                                                    <p id="abiona" style="color: black;"><b>Abiona Eniola</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rater">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Abiona Eniola' AND `category` LIKE 'femaleperson'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="personFemale1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="akinsulere" style="color: black;"><b>Akinsulere Oluwakemi</b>
                                                    </p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rates">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Akinsulere Oluwakemi' AND `category` LIKE 'femaleperson'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="personFemale2">Vote</button>
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
                    <a class="card-link" data-toggle="collapse" href="#collapseFive">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">Entrepreneur of the Year</b>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p id="ikobi" style="color: black;"><b>Ikobi Stephen</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="ratet">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ikobi Stephen' AND `category` LIKE 'enter_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id="EntreMale1">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="balogun" style="color: black;"><b>Balogun Temitope</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateu">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Balogun Temitope' AND `category` LIKE 'enter_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreMale2">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="oluyombo2" style="color: black;"><b>Oluyombo Erioluwa</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratev">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oluyombo Erioluwa' AND `category` LIKE 'enter_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreMale3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="folajid" style="color: black;"><b>Folaji Daniel</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratew">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Folaji Daniel' AND `category` LIKE 'enter_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreMale4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="adooga" style="color: black;"><b>Adooga Stephen</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="ratex">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adooga Stephen' AND `category` LIKE 'enter_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreMale5">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="ibukun" style="color: black;"><b>Ibukun (Saxzy)</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="ratey">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ibukun' AND `category` LIKE 'enter_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreMale6">Vote</button>
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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Female Category</p>
                                                <td>
                                                    <p id="oni" style="color: black;"><b>Oni Oluwakemi</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateaa">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oni Oluwakemi' AND `category` LIKE 'enter_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreFemale1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="ojo" style="color: black;"><b>Ojo Eunice</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateab">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oni Oluwakemi' AND `category` LIKE 'enter_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreFemale2">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="ayaeibo" style="color: black;"><b>Ayaeibo Pere-ere</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateac">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ayaeibo Pere-ere' AND `category` LIKE 'enter_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreFemale3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="oladimeji" style="color: black;"><b>Oladimeji Olayinka (Brown
                                                            Sugar)</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="ratead">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oladimeji Olayinka' AND `category` LIKE 'enter_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreFemale4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="okechukwu" style="color: black;"><b>Okechukwu Doreen</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateae">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Okechukwu Doreen' AND `category` LIKE 'enter_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="EntreFemale5">Vote</button>
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
                    <a class="card-link" data-toggle="collapse" href="#collapseSix">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">Sportman of the Year</b>
                        </div>
                    </a>
                    <div id="collapseSix" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p id="ajibade" style="color: black;"><b>Ajibade Adeife</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td id="rateaf">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ajibade Adeife' AND `category` LIKE 'sport_man'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id="SportMale1">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="adejimi" style="color: black;"><b>Adejimi Fiyinfoluwa</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateag">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adejimi Fiyinfoluwa' AND `category` LIKE 'sport_man'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id="SportMale2">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="nwoekocha" style="color: black;"><b>Nwoekocha Chima</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateah">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Nwoekocha Chima' AND `category` LIKE 'sport_man'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportMale3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="adeniran" style="color: black;"><b>Adeniran Timileyin</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateai">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adeniran Timileyin' AND `category` LIKE 'sport_man'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportMale4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="oladipo" style="color: black;"><b>Oladipo Timileyin (Timi
                                                            Turtle)</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateaj">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oladipo Timileyin' AND `category` LIKE 'sport_man'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportMale5">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="kazeem" style="color: black;"><b>Kazeem Rufai</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateak">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Kazeem Rufai' AND `category` LIKE 'sport_man'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportMale6">Vote</button>

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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Female Category</p>
                                                <td>
                                                    <p id="omomia" style="color: black;"><b>Omomia Favour</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateal">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Omomia Favour' AND `category` LIKE 'sport_woman'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportFemale1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="ayaeibo" style="color: black;"><b>Ayaeibo Pere-ere</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateam">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ayaeibo Pere-ere' AND `category` LIKE 'sport_woman'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportFemale2">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="nwana" style="color: black;"><b>Nwana Grace</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratean">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Nwana Grace' AND `category` LIKE 'sport_woman'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportFemale3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="adediran" style="color: black;"><b>Adediran Aderonke</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateao">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adediran Aderonke' AND `category` LIKE 'sport_woman'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="SportFemale4">Vote</button>
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
                    <a class="card-link" data-toggle="collapse" href="#collapseSeven">
                        <div style="background: #7681b0;" class="card-header">
                            <b style="color: #ffffff;">Best Dressed</b>
                        </div>
                    </a>
                    <div id="collapseSeven" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: black;" scope="col">Name</th>
                                                <th style="color: black;" scope="col">Level</th>
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p id="akinmola" style="color: black;"><b>Akinmola Ayomide</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateap">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Akinmola Ayomide' AND `category` LIKE 'dress_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>
                                                <td>
                                                    <button id="dressMale1">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="balogun" style="color: black;"><b>Balogun Temitope</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateaq">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Balogun Temitope' AND `category` LIKE 'dress_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressMale2">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="oluyitan" style="color: black;"><b>Oluyitan Victor</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="ratear">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Oluyitan Victor' AND `category` LIKE 'dress_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressMale3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="abiona" style="color: black;"><b>Abiona Oluwatobiloba</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateas">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Abiona Oluwatobiloba' AND `category` LIKE 'dress_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressMale4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="adesanya" style="color: black;"><b>Adesanya Dayo</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateat">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adesanya Dayo' AND `category` LIKE 'dress_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressMale5">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="kumuyi" style="color: black;"><b>Kumuyi Wisdom</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateau">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Kumuyi Wisdom' AND `category` LIKE 'dress_male'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressMale6">Vote</button>
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
                                                <th style="color: black;" scope="col" hidden>Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Female Category</p>
                                                <td>
                                                    <p id="wisdom" style="color: black;"><b>Wisdom Promise</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateav">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Wisdom Promise' AND `category` LIKE 'dress_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressFemale1">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p id="adeyemi" style="color: black;"><b>Adeyemi Praise</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td id="rateaw">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adeyemi Praise' AND `category` LIKE 'dress_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressFemale2">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="jimoh" style="color: black;"><b>Jimoh Busola</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateax">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Jimoh Busola' AND `category` LIKE 'dress_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressFemale3">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="ayodele" style="color: black;"><b>Ayodele Abigael</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td id="rateay">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ayodele Abigael' AND `category` LIKE 'dress_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressFemale4">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="adesida" style="color: black;"><b>Adesida Bukola </b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateaz">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Adesida Bukola' AND `category` LIKE 'dress_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressFemale5">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p id="baloguns" style="color: black;"><b>Balogun Solape </b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td id="rateaba">
                                                    <?php 
                                                   $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Balogun Solape' AND `category` LIKE 'dress_female'";
                                                   $res = query($sql);
                                                   $row = mysqli_fetch_array($res);
                                                  if($_SESSION['usermatric'] == "180301008") {
                                                    echo $row['votes'];  
                                                   } else {
                                                       
                                                   } ?>
                                                </td>

                                                <td>
                                                    <button id="dressFemale6">Vote</button>
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
<script src="aja.js"></script>

<?php

//disable button for male fresher category begins
if(isset($_SESSION['voted']) || isset($_SESSION['voteda'])) {

    echo "
        <script>
    document.getElementById('fresher1').style.visibility = 'hidden';
    document.getElementById('fresher2').style.visibility = 'hidden';
    </script>
    ";
}
//disable button for male fresher category ends




//disable button for female fresher category begins
if(isset($_SESSION['votedb']) || isset($_SESSION['votedc'])) {

    echo "
        <script>
    document.getElementById('freshers1').style.visibility = 'hidden';
    document.getElementById('freshers2').style.visibility = 'hidden';
    </script>
    ";
}
//disable button for female fresher category ends




//disable button for mr category begins
if(isset($_SESSION['votedd'])  || isset($_SESSION['votede']) || isset($_SESSION['votedf']) || isset($_SESSION['votedg']) || isset($_SESSION['votedh']) || isset($_SESSION['votedi'])) {

    echo "
        <script>
    document.getElementById('mr1').style.visibility = 'hidden';
    document.getElementById('mr2').style.visibility = 'hidden';
    document.getElementById('mr3').style.visibility = 'hidden';
    document.getElementById('mr4').style.visibility = 'hidden';
    document.getElementById('mr5').style.visibility = 'hidden';
    document.getElementById('mr6').style.visibility = 'hidden';
    </script>
    ";
}


//disable button for male fresher category ends




//disable button for miss category begins
if(isset($_SESSION['votedj']) || isset($_SESSION['votedk']) || isset($_SESSION['votedl']) || isset($_SESSION['votedm']) || isset($_SESSION['votedn']) || isset($_SESSION['votedo'])) {

    echo "
        <script>
    document.getElementById('miss1').style.visibility = 'hidden';
    document.getElementById('miss2').style.visibility = 'hidden';
    document.getElementById('miss3').style.visibility = 'hidden';
    document.getElementById('miss4').style.visibility = 'hidden';
    document.getElementById('miss5').style.visibility = 'hidden';
    document.getElementById('miss6').style.visibility = 'hidden';
    </script>
    ";
}//disable button for miss category ends


//disable button for person male category begins
if(isset($_SESSION['votedp']) || isset($_SESSION['votedq'])) {

    echo "
        <script>
    document.getElementById('personMale1').style.visibility = 'hidden';
    document.getElementById('personMale2').style.visibility = 'hidden';
    </script>
    ";
}//disable button for person male category ends


//disable button for person Female category begins
if(isset($_SESSION['votedr']) || isset($_SESSION['voteds'])) {

    echo "
        <script>
    document.getElementById('personFemale1').style.visibility = 'hidden';
    document.getElementById('personFemale2').style.visibility = 'hidden';
    </script>
    ";
}//disable button for person Female category ends


//disable button for Male Entrepreneur category begins
if(isset($_SESSION['votedt']) || isset($_SESSION['votedu']) || isset($_SESSION['votedv']) || isset($_SESSION['votedw']) || isset($_SESSION['votedx']) || isset($_SESSION['votedy'])) {

    echo "
        <script>
    document.getElementById('EntreMale1').style.visibility = 'hidden';
    document.getElementById('EntreMale2').style.visibility = 'hidden';
    document.getElementById('EntreMale3').style.visibility = 'hidden';
    document.getElementById('EntreMale4').style.visibility = 'hidden';
    document.getElementById('EntreMale5').style.visibility = 'hidden';
    document.getElementById('EntreMale6').style.visibility = 'hidden';
    </script>
    ";
}//disable button for Male Entrepreneur category ends


//disable button for Female Entrepreneur category begins
if(isset($_SESSION['votedaa']) || isset($_SESSION['votedab']) || isset($_SESSION['votedac']) || isset($_SESSION['votedad']) || isset($_SESSION['votedae'])) {

    echo "
        <script>
    document.getElementById('EntreFemale1').style.visibility = 'hidden';
    document.getElementById('EntreFemale2').style.visibility = 'hidden';
    document.getElementById('EntreFemale3').style.visibility = 'hidden';
    document.getElementById('EntreFemale4').style.visibility = 'hidden';
    document.getElementById('EntreFemale5').style.visibility = 'hidden';
    </script>
    ";
}//disable button for Female Entrepreneur category ends


//disable button for Male Sport category begins
if(isset($_SESSION['votedaf']) || isset($_SESSION['votedag']) || isset($_SESSION['votedah']) || isset($_SESSION['votedai']) || isset($_SESSION['votedaj']) || isset($_SESSION['votedak'])) {

    echo "
        <script>
    document.getElementById('SportMale1').style.visibility = 'hidden';
    document.getElementById('SportMale2').style.visibility = 'hidden';
    document.getElementById('SportMale3').style.visibility = 'hidden';
    document.getElementById('SportMale4').style.visibility = 'hidden';
    document.getElementById('SportMale5').style.visibility = 'hidden';
    document.getElementById('SportMale6').style.visibility = 'hidden';
    </script>
    ";
}//disable button for Male Sport category ends


//disable button for Female Sport category begins
if(isset($_SESSION['votedal']) || isset($_SESSION['votedam']) || isset($_SESSION['votedan']) || isset($_SESSION['votedao'])) {

    echo "
        <script>
    document.getElementById('SportFemale1').style.visibility = 'hidden';
    document.getElementById('SportFemale2').style.visibility = 'hidden';
    document.getElementById('SportFemale3').style.visibility = 'hidden';
    document.getElementById('SportFemale4').style.visibility = 'hidden';
    </script>
    ";
}//disable button for Female Sport category ends


//disable button for Male Dress category begins
if(isset($_SESSION['votedap']) || isset($_SESSION['votedaq']) || isset($_SESSION['votedar']) || isset($_SESSION['votedas']) || isset($_SESSION['votedat']) || isset($_SESSION['votedau'])) {

    echo "
        <script>
    document.getElementById('dressMale1').style.visibility = 'hidden';
    document.getElementById('dressMale2').style.visibility = 'hidden';
    document.getElementById('dressMale3').style.visibility = 'hidden';
    document.getElementById('dressMale4').style.visibility = 'hidden';
    document.getElementById('dressMale5').style.visibility = 'hidden';
    document.getElementById('dressMale6').style.visibility = 'hidden';
    </script>
    ";
}//disable button for Male Dress category ends


//disable button for Female Dress category begins
if(isset($_SESSION['votedav']) || isset($_SESSION['votedaw']) || isset($_SESSION['votedax']) || isset($_SESSION['voteday']) || isset($_SESSION['votedaz']) || isset($_SESSION['votedba'])) {

    echo "
        <script>
    document.getElementById('dressFemale1').style.visibility = 'hidden';
    document.getElementById('dressFemale2').style.visibility = 'hidden';
    document.getElementById('dressFemale3').style.visibility = 'hidden';
    document.getElementById('dressFemale4').style.visibility = 'hidden';
    document.getElementById('dressFemale5').style.visibility = 'hidden';
    document.getElementById('dressFemale6').style.visibility = 'hidden';
    </script>
    ";
}//disable button for Female Dress category ends

?>

?>
<script>
if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('service-worker.js')
        .then(function(reg) {
            console.log("Yes, it did.");
        }).catch(function(err) {
            console.log("No it didn't. This happened: ", err)
        });
}
</script>
<script src="service-worker.js">
// Service worker for Progressive Web App
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('service-worker.js', {
        scope: '.' // THIS IS REQUIRED FOR RUNNING A PROGRESSIVE WEB APP FROM A NON_ROOT PATH
    }).then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
    });
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