<?php include("include/header.php"); ?>
<style>
    button {

        cursor: pointer;
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
                            <b style="color: #ffffff;" id="fresher">Fresher of the Year</b>
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
                                                 <?php
                                                    $sql = "SELECT * FROM `votes`";
                                                    $res = query($sql);
                                                    $row = mysqli_fetch_array($res);
                                                ?>

                                                <p>Male Category</p>
                                                <td>
                                                    <p id="Ajibade" style="color: black;"><b>Ajibade Adeife</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                               
                                                <td>
                                                    <?php echo $row['ip']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if(isset($_SESSION['activator']) && ($_SESSION['activator'] === $row['ip'])) {
                                                
                                                    echo "<button style='padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px' id='fresher1' hidden>Vote</button>";
                                                }else{

                                                    echo "<button style='padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px' id='fresher1'   >Vote</button>";
                                                }
                                               
                                                ?>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Olamilekan</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">100 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                   <?php
                                                    if(isset($_SESSION['activator']) && ($_SESSION['activator'] === $row['ip'])) {
                                                
                                                    echo "<button style='padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px' id='fresher1' onclick='fresher()' hidden>Vote</button>";
                                                }else{
                                                    
                                                    echo "<button style='padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px' id='fresher1' onclick='fresher()'  >Vote</button>";
                                                }
                                               
                                                ?>
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
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="freshers1" onclick="freshers()">Vote</button>
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
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="freshers2" onclick="freshers()">Vote</button>
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
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="mr1" onclick="mr()">Vote</button>
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
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="mr2" onclick="mr()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Opara David</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="mr3" onclick="mr()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Kambi Tomisin</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="mr4" onclick="mr()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Kumuyi Wisdom</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="mr5" onclick="mr()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ewelike Kelvin</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="mr6" onclick="mr()">Vote</button>
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
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Omomia Favour</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="miss1" onclick="miss()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Rasheed Loveth</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="miss2" onclick="miss()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Aremu Ololade</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="miss3" onclick="miss()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Olagunju Oluwatoke</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="miss4" onclick="miss()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Atanda Precious</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="miss5" onclick="miss()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ologun Oyinkansola</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="miss6" onclick="miss()">Vote</button>
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
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p style="color: black;"><b>Oluyombo Erioluwa</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>
                                                    <?php echo "string"; ?>
                                                </td>
                                                <td>
                                                   <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="personMale1" onclick="personMale()">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Oladapo Tioluwani</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="personMale2" onclick="personMale()">Vote</button>
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
                                                    <p style="color: black;"><b>Abiona Eniola</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="personFemale1" onclick="personFemale()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Akinsulere Oluwakemi</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="personFemale2" onclick="personFemale()">Vote</button>
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
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p style="color: black;"><b>Ikobi Stephen</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>
                                                    <?php echo "string"; ?>
                                                </td>
                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreMale1" onclick="EntreMale()">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Balogun Temitope</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreMale2" onclick="EntreMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Oluyombo Erioluwa</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreMale3" onclick="EntreMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Folaji Daniel</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreMale3" onclick="EntreMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adooga Stephen</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreMale4" onclick="EntreMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ibukun (Saxzy)</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreMale5" onclick="EntreMale()">Vote</button>
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
                                                    <p style="color: black;"><b>Oni Oluwakemi</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreFemale1" onclick="EntreFemale()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ojo Eunice</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreFemale2" onclick="EntreFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ayaeibo Pere-ere</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreFemale3" onclick="EntreFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Oladimeji Olayinka (Brown Sugar)</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreFemale4" onclick="EntreFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Okechukwu Doreen</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="EntreFemale5" onclick="EntreFemale()">Vote</button>
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
                                                    <?php echo "string"; ?>
                                                </td>
                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportMale1" onclick="SportMale()">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adejimi Fiyinfoluwa</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportMale2" onclick="SportMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Nwoekocha Chima</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportMale3" onclick="SportMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adeniran Timileyin</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportMale4" onclick="SportMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Oladipo Timileyin (Timi Turtle)</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportMale5" onclick="SportMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Kazeem Rufai</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportMale1" onclick="SportMale()">Vote</button>

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
                                                    <p style="color: black;"><b>Omomia Favour</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportFemale1" onclick="SportFemale()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ayaeyibo Pere-ere</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportFemale2" onclick="SportFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Nwana Grace</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportFemale3" onclick="SportFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adediran Aderonke</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="SportFemale4" onclick="SportFemale()">Vote</button>
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
                                                <th style="color: black;" scope="col">Rate</th>
                                                <th style="color: black;" scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <p>Male Category</p>
                                                <td>
                                                    <p style="color: black;"><b>Akinmola Ayomide</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>
                                                    <?php echo "string"; ?>
                                                </td>
                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressMale1" onclick="dressMale()">Vote</button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Balogun Temitope</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressMale2" onclick="dressMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Oluyitan Victor</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressMale3" onclick="dressMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Abiona Oluwatobiloba</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressMale4" onclick="dressMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adesanya Dayo</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressMale5" onclick="dressMale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Kumuyi Wisdom</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressMale6" onclick="dressMale()">Vote</button>
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
                                                    <p style="color: black;"><b>Wisdom Promise</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressFemale1" onclick="dressFemale()">Vote</button>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adeyemi Praise</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">200 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressFemale2" onclick="dressFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Jimoh Busola</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressFemale3" onclick="dressFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Ayodele Abigael</b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">300 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressFemale4" onclick="dressFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Adesida Bukola </b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressFemale5" onclick="dressFemale()">Vote</button>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <p style="color: black;"><b>Balogun Solape </b></p>
                                                </td>
                                                <td>
                                                    <h5 style="color: black;">400 Level</h5>
                                                </td>
                                                <td>

                                                <td>
                                                    <button style="padding: 17px 10px; background: #7681b0; color: white; border-radius: 10px" id="dressFemale6" onclick="dressFemale()">Vote</button>
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


<!-- <script>
    function fresher() {
        document.getElementById('fresher1').disabled = true;
        document.getElementById('fresher1').style.background = 'grey';
        document.getElementById('fresher1').style.clor = 'black';
        document.getElementById('fresher2').disabled = true;
        document.getElementById('fresher2').style.background = 'grey';
        document.getElementById('fresher2').style.clor = 'black';
    }

    function freshers() {
        document.getElementById('freshers1').disabled = true;
        document.getElementById('freshers1').style.background = 'grey';
        document.getElementById('freshers1').style.clor = 'black';
        document.getElementById('freshers2').disabled = true;
        document.getElementById('freshers2').style.background = 'grey';
        document.getElementById('freshers2').style.clor = 'black';
    }

    function mr() {
        document.getElementById('mr1').disabled = true;
        document.getElementById('mr1').style.background = 'grey';
        document.getElementById('mr1').style.clor = 'black';
        document.getElementById('mr2').disabled = true;
        document.getElementById('mr2').style.background = 'grey';
        document.getElementById('mr2').style.clor = 'black';
        document.getElementById('mr3').disabled = true;
        document.getElementById('mr3').style.background = 'grey';
        document.getElementById('mr3').style.clor = 'black';
        document.getElementById('mr4').disabled = true;
        document.getElementById('mr4').style.background = 'grey';
        document.getElementById('mr4').style.clor = 'black';
        document.getElementById('mr5').disabled = true;
        document.getElementById('mr5').style.background = 'grey';
        document.getElementById('mr5').style.clor = 'black';
        document.getElementById('mr6').disabled = true;
        document.getElementById('mr6').style.background = 'grey';
        document.getElementById('mr6').style.clor = 'black';
    }
    
    function miss() {
        document.getElementById('miss1').disabled = true;
        document.getElementById('miss1').style.background = 'grey';
        document.getElementById('miss1').style.clor = 'black';
        document.getElementById('miss2').disabled = true;
        document.getElementById('miss2').style.background = 'grey';
        document.getElementById('miss2').style.clor = 'black';
        document.getElementById('miss3').disabled = true;
        document.getElementById('miss3').style.background = 'grey';
        document.getElementById('miss3').style.clor = 'black';
        document.getElementById('miss4').disabled = true;
        document.getElementById('miss4').style.background = 'grey';
        document.getElementById('miss4').style.clor = 'black';
        document.getElementById('miss5').disabled = true;
        document.getElementById('miss5').style.background = 'grey';
        document.getElementById('miss5').style.clor = 'black';
        document.getElementById('miss6').disabled = true;
        document.getElementById('miss6').style.background = 'grey';
        document.getElementById('miss6').style.clor = 'black';
    }

    function personMale() {
        document.getElementById('personMale1').disabled = true;
        document.getElementById('personMale1').style.background = 'grey';
        document.getElementById('personMale1').style.clor = 'black';
        document.getElementById('personMale2').disabled = true;
        document.getElementById('personMale2').style.background = 'grey';
        document.getElementById('personMale2').style.clor = 'black';
    }

    function personFemale() {
        document.getElementById('personFemale1').disabled = true;
        document.getElementById('personFemale1').style.background = 'grey';
        document.getElementById('personFemale1').style.clor = 'black';
        document.getElementById('personFemale2').disabled = true;
        document.getElementById('personFemale2').style.background = 'grey';
        document.getElementById('personFemale2').style.clor = 'black';
    }

    function EntreMale() {
        document.getElementById('EntreMale1').disabled = true;
        document.getElementById('EntreMale1').style.background = 'grey';
        document.getElementById('EntreMale1').style.clor = 'black';
        document.getElementById('EntreMale2').disabled = true;
        document.getElementById('EntreMale2').style.background = 'grey';
        document.getElementById('EntreMale2').style.clor = 'black';
        document.getElementById('EntreMale3').disabled = true;
        document.getElementById('EntreMale3').style.background = 'grey';
        document.getElementById('EntreMale3').style.clor = 'black';
        document.getElementById('EntreMale4').disabled = true;
        document.getElementById('EntreMale4').style.background = 'grey';
        document.getElementById('EntreMale4').style.clor = 'black';
        document.getElementById('EntreMale5').disabled = true;
        document.getElementById('EntreMale5').style.background = 'grey';
        document.getElementById('EntreMale5').style.clor = 'black';
    }

    function EntreFemale() {
        document.getElementById('EntreFemale1').disabled = true;
        document.getElementById('EntreFemale1').style.background = 'grey';
        document.getElementById('EntreFemale1').style.clor = 'black';
        document.getElementById('EntreFemale2').disabled = true;
        document.getElementById('EntreFemale2').style.background = 'grey';
        document.getElementById('EntreFemale2').style.clor = 'black';
        document.getElementById('EntreFemale3').disabled = true;
        document.getElementById('EntreFemale3').style.background = 'grey';
        document.getElementById('EntreFemale3').style.clor = 'black';
        document.getElementById('EntreFemale4').disabled = true;
        document.getElementById('EntreFemale4').style.background = 'grey';
        document.getElementById('EntreFemale4').style.clor = 'black';
        document.getElementById('EntreFemale5').disabled = true;
        document.getElementById('EntreFemale5').style.background = 'grey';
        document.getElementById('EntreFemale5').style.clor = 'black';

    }

    function SportMale() {
        document.getElementById('SportMale1').disabled = true;
        document.getElementById('SportMale1').style.background = 'grey';
        document.getElementById('SportMale1').style.clor = 'black';
        document.getElementById('SportMale2').disabled = true;
        document.getElementById('SportMale2').style.background = 'grey';
        document.getElementById('SportMale2').style.clor = 'black';
        document.getElementById('SportMale3').disabled = true;
        document.getElementById('SportMale3').style.background = 'grey';
        document.getElementById('SportMale3').style.clor = 'black';
        document.getElementById('SportMale4').disabled = true;
        document.getElementById('SportMale4').style.background = 'grey';
        document.getElementById('SportMale4').style.clor = 'black';
        document.getElementById('SportMale5').disabled = true;
        document.getElementById('SportMale5').style.background = 'grey';
        document.getElementById('SportMale5').style.clor = 'black';
    }

    function SportFemale() {
        document.getElementById('SportMale1').disabled = true;
        document.getElementById('SportMale1').style.background = 'grey';
        document.getElementById('SportMale1').style.clor = 'black';
        document.getElementById('SportMale2').disabled = true;
        document.getElementById('SportMale2').style.background = 'grey';
        document.getElementById('SportMale2').style.clor = 'black';
        document.getElementById('SportMale3').disabled = true;
        document.getElementById('SportMale3').style.background = 'grey';
        document.getElementById('SportMale3').style.clor = 'black';
        document.getElementById('SportMale4').disabled = true;
        document.getElementById('SportMale4').style.background = 'grey';
        document.getElementById('SportMale4').style.clor = 'black';
        document.getElementById('SportMale5').disabled = true;
        document.getElementById('SportMale5').style.background = 'grey';
        document.getElementById('SportMale5').style.clor = 'black';
    }

    function dressMale() {
        document.getElementById('dressMale1').disabled = true;
        document.getElementById('dressMale1').style.background = 'grey';
        document.getElementById('dressMale1').style.clor = 'black';
        document.getElementById('dressMale2').disabled = true;
        document.getElementById('dressMale2').style.background = 'grey';
        document.getElementById('dressMale2').style.clor = 'black';
        document.getElementById('dressMale3').disabled = true;
        document.getElementById('dressMale3').style.background = 'grey';
        document.getElementById('dressMale3').style.clor = 'black';
        document.getElementById('dressMale4').disabled = true;
        document.getElementById('dressMale4').style.background = 'grey';
        document.getElementById('dressMale4').style.clor = 'black';
        document.getElementById('dressMale5').disabled = true;
        document.getElementById('dressMale5').style.background = 'grey';
        document.getElementById('dressMale5').style.clor = 'black';
        document.getElementById('dressMale6').disabled = true;
        document.getElementById('dressMale6').style.background = 'grey';
        document.getElementById('dressMale6').style.clor = 'black';

 }
    function dressFemale() {
        document.getElementById('dressFemale1').disabled = true;
        document.getElementById('dressFemale1').style.background = 'grey';
        document.getElementById('dressFemale1').style.clor = 'black';
        document.getElementById('dressFemale2').disabled = true;
        document.getElementById('dressFemale2').style.background = 'grey';
        document.getElementById('dressFemale2').style.clor = 'black';
        document.getElementById('dressFemale3').disabled = true;
        document.getElementById('dressFemale3').style.background = 'grey';
        document.getElementById('dressFemale3').style.clor = 'black';
        document.getElementById('dressFemale4').disabled = true;
        document.getElementById('dressFemale4').style.background = 'grey';
        document.getElementById('dressFemale4').style.clor = 'black';
        document.getElementById('dressFemale5').disabled = true;
        document.getElementById('dressFemale5').style.background = 'grey';
        document.getElementById('dressFemale5').style.clor = 'black';
        document.getElementById('dressFemale6').disabled = true;
        document.getElementById('dressFemale6').style.background = 'grey';
        document.getElementById('dressFemale6').style.clor = 'black';
    }
    
</script> -->

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

</body>

</html>