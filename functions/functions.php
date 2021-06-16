<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}


function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}


function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}


function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div style="background: #000000; color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p style="color: white;"><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}



function validator($error_message) {

$error_message = <<<DELIMITER
<div style="background: #000000; color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p style="color: white;"><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}


/********** validate user functions *******/


function email_exist($email) {

	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}


//check if the matric exit for accreditation
function matric_exist($matric) {

	$sql = "SELECT * FROM users WHERE matric = '$matric'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}



//check vote process for ip and matric + accrediatation
function checkipmatval($category, $ipaddr, $mat) {

	$sql = "SELECT * FROM secure WHERE `matric` = '$mat' AND `ip` = '$ipaddr' AND `category` = '$category'";
	$res = query($sql);

	if (row_count($res) == 1) {
		
		return true;
	} else {

		return false;
	}
}


//on submit button click
if(isset($_REQUEST['accredit'])) {

	//verify server request
	//if ($_SERVER["REQUEST_METHOD"] != "POST") {
	
	
	
	//get user details
	$name = escape(clean($_POST['name']));
	$email = escape(clean($_POST['email']));
	$matric = escape(clean($_POST['matric']));
	$dept = escape(clean($_POST['dept']));
	$gender = escape(clean($_POST['gender']));
	
	//generate activator
	$activator = $_SERVER['REMOTE_ADDR'];
	$_SESSION['activator'] = $activator;

	//date registered
	$date = date("d-m-y h:i:sa");
	
	//check if email is registered 
	if(email_exist($email) && $email != 'admin@somssa.com') {

		echo "Sorry! That email has been accredited.";

	} else {

		if(matric_exist($matric) && $matric != '180301008') {

			echo "Uh oh! You can only be accredited once.";

		} else {

		//declare a mail session
		$_SESSION['mail'] = $email;	

		//submit user details
	$sql = "INSERT INTO users(`sn`, `matric`, `name`, `dept`, `gend`, `email`, `date`, `active`, `ip`)";
	$sql.= " VALUES('1', '$matric', '$name', '$dept', '$gender', '$email', '$date', '0', '$activator')";
	$result = query($sql);

	echo "Loading...Please wait";

	$_SESSION['usermatric'] = $matric;

	//refresh page
	echo '<script>window.location.href ="./vote"</script>';

			
		}
	}
	
	}



//male fresher1
if (isset($_POST['a']) && isset($_POST['b'])) {

	//declare variables

	$nomname  = $_POST['a'];
	$category = $_POST['b'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = '$nomname' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE '$nomname' AND `category` = '$category'";
    $ves = query($vsl);

	if($_SESSION['usermatric'] == "180301008"){
		if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
	}
	
    $_SESSION['voted'] = $voted;
}
	
}
}



//male fresher2
if (isset($_POST['ab']) && isset($_POST['bb'])) {

	//declare variables

	$nomname  = $_POST['ab'];
	$category = $_POST['bb'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	//$ssl = "SELECT * FROM `votes` WHERE `name` LIKE '$nomname' AND `category` LIKE '$category'";
	$ssl = "SELECT * FROM `votes` WHERE `name` LIKE 'Otemoye Olamilekan' AND `category` LIKE '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Otemoye Olamilekan' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['voteda'] = $voted;
}
	
}
}



//male fresher 3
if (isset($_POST['abq']) && isset($_POST['bbq'])) {

	//declare variables

	$nomname  = $_POST['abq'];
	$category = $_POST['bbq'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM `votes` WHERE `name` LIKE 'Ewarawon Fola' AND `category` LIKE '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ewarawon Fola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedb'] = $voted;
}
	
}
}


//male fresher 4
if (isset($_POST['abrq']) && isset($_POST['bbrq'])) {

	//declare variables

	$nomname  = $_POST['abrq'];
	$category = $_POST['bbrq'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Gbadamosi Oluwatobi' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Gbadamosi Oluwatobi' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedc'] = $voted;
}
	
}
}




//female fresher1
if (isset($_POST['ac']) && isset($_POST['bc'])) {

	//declare variables

	$nomname  = $_POST['ac'];
	$category = $_POST['bc'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'George Ibukun' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'George Ibukun' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedb'] = $voted;
}
	
}
}



//female fresher 2
if (isset($_POST['ad']) && isset($_POST['bd'])) {

	//declare variables

	$nomname  = $_POST['ad'];
	$category = $_POST['bd'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Folaji Phoebe' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Folaji Phoebe' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedc'] = $voted;
}
	
}
}


//female fresher 3
if (isset($_POST['ad3']) && isset($_POST['bd3'])) {

	//declare variables

	$nomname  = $_POST['ad3'];
	$category = $_POST['bd3'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ibifubara Kambi' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ibifubara Kambi' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votefs3'] = $voted;
}
	
}
}


//feale fresher 4

if (isset($_POST['ad4']) && isset($_POST['bd4'])) {

	//declare variables

	$nomname  = $_POST['ad4'];
	$category = $_POST['bd4'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Flourish Aderohunmmu' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Flourish Aderohunmmu' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votefs4'] = $voted;
}
	
}
}



//mr1
if (isset($_POST['ae']) && isset($_POST['be'])) {

	//declare variables

	$nomname  = $_POST['ae'];
	$category = $_POST['be'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adeleye Korede' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adeleye Korede' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedd'] = $voted;
}
	
}
}


//mr2
if (isset($_POST['af']) && isset($_POST['bf'])) {

	//declare variables

	$nomname  = $_POST['af'];
	$category = $_POST['bf'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl =  "SELECT * FROM votes WHERE `name` = 'Femi Adenola' AND `category` = '$category'";
	$res = query($ssl);
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Femi Adenola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votede'] = $voted;
}
	
}
}


//mr3
if (isset($_POST['ag']) && isset($_POST['bg'])) {

	//declare variables

	$nomname  = $_POST['ag'];
	$category = $_POST['bg'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Opara David' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Opara David' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedf'] = $voted;
}
	
}
}


//mr4
if (isset($_POST['ah']) && isset($_POST['bh'])) {

	//declare variables

	$nomname  = $_POST['ah'];
	$category = $_POST['bh'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Uchea Daniel' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Uchea Daniel' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedg'] = $voted;
}
	
}
}


//miss1
if (isset($_POST['ak']) && isset($_POST['bk'])) {

	//declare variables

	$nomname  = $_POST['ak'];
	$category = $_POST['bk'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Omomia Favour' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Omomia Favour' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedj'] = $voted;
}
	
}
}


//miss 2
if (isset($_POST['al']) && isset($_POST['bl'])) {

	//declare variables

	$nomname  = $_POST['al'];
	$category = $_POST['bl'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Elijah Christiana' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Elijah Christiana' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedk'] = $voted;
}
	
}
}


//miss3
if (isset($_POST['am']) && isset($_POST['bm'])) {

	//declare variables

	$nomname  = $_POST['am'];
	$category = $_POST['bm'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Aremu Ololade' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Aremu Ololade' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedl'] = $voted;
}
	
}
}


//miss4
if (isset($_POST['an']) && isset($_POST['bn'])) {

	//declare variables

	$nomname  = $_POST['an'];
	$category = $_POST['bn'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Olagunju Oluwatoke' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Olagunju Oluwatoke' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedm'] = $voted;
}
	
}
}


//miss5
if (isset($_POST['ao']) && isset($_POST['bo'])) {

	//declare variables

	$nomname  = $_POST['ao'];
	$category = $_POST['bo'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oginni Precious' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = 'Oginni Precious' WHERE `name` LIKE '$nomname' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedn'] = $voted;
}
	
}
}


//miss6
if (isset($_POST['ap']) && isset($_POST['bp'])) {

	//declare variables

	$nomname  = $_POST['ap'];
	$category = $_POST['bp'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ayodele Abigael' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = 'Ayodele Abigael' WHERE `name` LIKE '$nomname' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedo'] = $voted;
}
	
}
}

//personMale1
if (isset($_POST['aq']) && isset($_POST['bq'])) {

	//declare variables

	$nomname  = $_POST['aq'];
	$category = $_POST['bq'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oluyombo Erioluwa' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oluyombo Erioluwa' AND `category` = 'maleperson'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedp'] = $voted;
}
	
}
}


//personMale2
if (isset($_POST['ar']) && isset($_POST['br'])) {

	//declare variables

	$nomname  = $_POST['ar'];
	$category = $_POST['br'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oladapo Tioluwani' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oladapo Tioluwani' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedq'] = $voted;
}
	
}
}

//malePerson 3
if (isset($_POST['arbs3']) && isset($_POST['brbs3'])) {

	//declare variables

	$nomname  = $_POST['arbs3'];
	$category = $_POST['brbs3'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Solomon Daye-Abasi' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Solomon Daye-Abasi' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votebs3'] = $voted;
}
	
}
}

//personFemale1
if (isset($_POST['as']) && isset($_POST['bs'])) {

	//declare variables

	$nomname  = $_POST['as'];
	$category = $_POST['bs'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Abiona Eniola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Abiona Eniola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedr'] = $voted;
}
	
}
}



//personFemale2
if (isset($_POST['at']) && isset($_POST['bt'])) {

	//declare variables

	$nomname  = $_POST['at'];
	$category = $_POST['bt'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Soyemi Melody' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Soyemi Melody' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['voteds'] = $voted;
}
	
}
}

//personFemale 3
if (isset($_POST['atbss3']) && isset($_POST['btbss3'])) {

	//declare variables

	$nomname  = $_POST['atbss3'];
	$category = $_POST['btbss3'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Atanda Precious' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Atanda Precious' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['voteds3'] = $voted;
}
	
}
}

//personFemale 4
if (isset($_POST['atbss4']) && isset($_POST['btbss4'])) {

	//declare variables

	$nomname  = $_POST['atbss4'];
	$category = $_POST['btbss4'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ologun Oyinkansola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ologun Oyinkansola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['voteds4'] = $voted;
}
	
}
}

//EntreMale1
if (isset($_POST['au']) && isset($_POST['bu'])) {

	//declare variables

	$nomname  = $_POST['au'];
	$category = $_POST['bu'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ikobi Stephen' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ikobi Stephen' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedt'] = $voted;
}
	
}
}



//EntreMale2
if (isset($_POST['av']) && isset($_POST['bv'])) {

	//declare variables

	$nomname  = $_POST['av'];
	$category = $_POST['bv'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Balogun Temitope' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Balogun Temitope' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedu'] = $voted;
}
	
}
}


//EntreMale3
if (isset($_POST['aw']) && isset($_POST['bw'])) {

	//declare variables

	$nomname  = $_POST['aw'];
	$category = $_POST['bw'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oluyombo Erioluwa' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oluyombo Erioluwa' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedv'] = $voted;
}
	
}
}


//EntreMale4
if (isset($_POST['ax']) && isset($_POST['bx'])) {

	//declare variables

	$nomname  = $_POST['ax'];
	$category = $_POST['bx'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Folaji Daniel' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Folaji Daniel' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedw'] = $voted;
}
	
}
}


//EntreMale5
if (isset($_POST['ay']) && isset($_POST['by'])) {

	//declare variables

	$nomname  = $_POST['ay'];
	$category = $_POST['by'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adooga Stephen' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adooga Stephen' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedx'] = $voted;
}
	
}
}




//EntreFemale1
if (isset($_POST['aaa']) && isset($_POST['baa'])) {

	//declare variables

	$nomname  = $_POST['aaa'];
	$category = $_POST['baa'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oni Oluwakemi' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oni Oluwakemi' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedaa'] = $voted;
}
	
}
}




//EntreFemale2
if (isset($_POST['aab']) && isset($_POST['bab'])) {

	//declare variables

	$nomname  = $_POST['aab'];
	$category = $_POST['bab'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ojo Eunice' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ojo Eunice' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedab'] = $voted;
}
	
}
}




//EntreFemale3
if (isset($_POST['aac']) && isset($_POST['bac'])) {

	//declare variables

	$nomname  = $_POST['aac'];
	$category = $_POST['bac'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ayaeibo Pere-ere' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ayaeibo Pere-ere' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedac'] = $voted;
}
	
}
}



//EntreFemale4
if (isset($_POST['aad']) && isset($_POST['bad'])) {

	//declare variables

	$nomname  = $_POST['aad'];
	$category = $_POST['bad'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Omopariola Anjola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Omopariola Anjola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedad'] = $voted;
}
	
}
}



//EntreFemale5
if (isset($_POST['aae']) && isset($_POST['bae'])) {

	//declare variables

	$nomname  = $_POST['aae'];
	$category = $_POST['bae'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Okechukwu Doreen' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Okechukwu Doreen' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedae'] = $voted;
}
	
}
}


//SportMale1
if (isset($_POST['aaf']) && isset($_POST['baf'])) {

	//declare variables

	$nomname  = $_POST['aaf'];
	$category = $_POST['baf'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Otemoye Olamilekan' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = 'Otemoye Olamilekan' WHERE `name` LIKE '$nomname' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedaf'] = $voted;
}
	
}
}


//SportMale2
if (isset($_POST['aag']) && isset($_POST['bag'])) {

	//declare variables

	$nomname  = $_POST['aag'];
	$category = $_POST['bag'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adejimi Fiyinfoluwa' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adejimi Fiyinfoluwa' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedag'] = $voted;
}
	
}
}



//SportMale3
if (isset($_POST['aah']) && isset($_POST['bah'])) {

	//declare variables

	$nomname  = $_POST['aah'];
	$category = $_POST['bah'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Nwoekocha Chima' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Nwoekocha Chima' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedah'] = $voted;
}
	
}
}


//SportMale4
if (isset($_POST['aai']) && isset($_POST['bai'])) {

	//declare variables

	$nomname  = $_POST['aai'];
	$category = $_POST['bai'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adeniran Timileyin' AND `category` = '$category'";
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adeniran Timileyin' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedai'] = $voted;
}
	
}
}


//SportMale5
if (isset($_POST['aaj']) && isset($_POST['baj'])) {

	//declare variables

	$nomname  = 'Oladipo Timileyin';
	$category = $_POST['baj'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adeniran Timileyin' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adeniran Timileyin' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedaj'] = $voted;
}
	
}
}


//SportMale6
if (isset($_POST['aak']) && isset($_POST['bak'])) {

	//declare variables

	$nomname  = $_POST['aak'];
	$category = $_POST['bak'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oladipo Timileyin' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oladipo Timileyin' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedak'] = $voted;
}
	
}
}



//sportmale 7
if (isset($_POST['aaksp7']) && isset($_POST['baksp7'])) {

	//declare variables

	$nomname  = $_POST['aaksp7'];
	$category = $_POST['baksp7'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Alao Remi Dayo' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Alao Remi Dayo' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedsp7'] = $voted;
}
	
}
}
//sportman 8
if (isset($_POST['aaksp8']) && isset($_POST['baksp8'])) {

	//declare variables

	$nomname  = $_POST['aaksp8'];
	$category = $_POST['baksp8'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adesanya Dayo' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adesanya Dayo' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votesp8'] = $voted;
}
	
}
}

//SportFemale1
if (isset($_POST['aal']) && isset($_POST['bal'])) {

	//declare variables

	$nomname  = $_POST['aal'];
	$category = $_POST['bal'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Omomia Favour' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Omomia Favour' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedal'] = $voted;
}
	
}
}


//SportFemale2
if (isset($_POST['aam']) && isset($_POST['bam'])) {

	//declare variables

	$nomname  = $_POST['aam'];
	$category = $_POST['bam'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Abraham Victoria' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Abraham Victoria' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedam'] = $voted;
}
	
}
}


//SportFemale3
if (isset($_POST['aan']) && isset($_POST['ban'])) {

	//declare variables

	$nomname  = $_POST['aan'];
	$category = $_POST['ban'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Nwana Grace' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Nwana Grace' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedan'] = $voted;
}
	
}
}


//SportFemale4
if (isset($_POST['aao']) && isset($_POST['bao'])) {

	//declare variables

	$nomname  = $_POST['aao'];
	$category = $_POST['bao'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adetayo Boluwatife' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adetayo Boluwatife' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedao'] = $voted;
}
	
}
}
//SportFemale5
if (isset($_POST['aaosw5']) && isset($_POST['baosw5'])) {

	//declare variables

	$nomname  = $_POST['aaosw5'];
	$category = $_POST['baosw5'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Rasheed Loveth' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Rasheed Loveth' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votesw5'] = $voted;
}
	
}
}
//SportFemale6
if (isset($_POST['aaosw6']) && isset($_POST['baosw6'])) {

	//declare variables

	$nomname  = $_POST['aaosw6'];
	$category = $_POST['baosw6'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ogundare Omotola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ogundare Omotola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votesw8'] = $voted;
}
	
}
}
//SportFemale7
if (isset($_POST['aaosw7']) && isset($_POST['baosw7'])) {

	//declare variables

	$nomname  = $_POST['aaosw7'];
	$category = $_POST['baosw7'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Akowoleyin Beloveth' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Akowoleyin Beloveth' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votesw7'] = $voted;
}
	
}
}


//dressMale1
if (isset($_POST['aap']) && isset($_POST['bap'])) {

	//declare variables

	$nomname  = $_POST['aap'];
	$category = $_POST['bap'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Akinmola Ayomide' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Akinmola Ayomide' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedap'] = $voted;
}
	
}
}


//dressMale2
if (isset($_POST['aaq']) && isset($_POST['baq'])) {

	//declare variables

	$nomname  = $_POST['aaq'];
	$category = $_POST['baq'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Balogun Temitope' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Balogun Temitope' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedaq'] = $voted;
}
	
}
}


//dressMale3
if (isset($_POST['aar']) && isset($_POST['bar'])) {

	//declare variables

	$nomname  = $_POST['aar'];
	$category = $_POST['bar'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oluyitan Victor' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oluyitan Victor' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedar'] = $voted;
}
	
}
}


//dressMale4
if (isset($_POST['aas']) && isset($_POST['bas'])) {

	//declare variables

	$nomname  = $_POST['aas'];
	$category = $_POST['bas'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Abiona Oluwatobiloba' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Abiona Oluwatobiloba' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedas'] = $voted;
}
	
}
}


//dressMale5
if (isset($_POST['aat']) && isset($_POST['bat'])) {

	//declare variables

	$nomname  = $_POST['aat'];
	$category = $_POST['bat'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adesanya Dayo' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adesanya Dayo' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedat'] = $voted;
}
	
}
}



//dressMale6
if (isset($_POST['aau']) && isset($_POST['bau'])) {

	//declare variables

	$nomname  = $_POST['aau'];
	$category = $_POST['bau'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oyebanji Tobi' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oyebanji Tobi' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedau'] = $voted;
}
	
}
}

//dressMale7
if (isset($_POST['aaubd7']) && isset($_POST['baubd7'])) {

	//declare variables

	$nomname  = $_POST['aaubd7'];
	$category = $_POST['baubd7'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ewarawon Fola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ewarawon Fola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votebd7'] = $voted;
}
	
}
}
//dressMale8
if (isset($_POST['aaubd8']) && isset($_POST['baubd8'])) {

	//declare variables

	$nomname  = $_POST['aaubd8'];
	$category = $_POST['baubd8'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oyakhilome Caleb' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oyakhilome Caleb' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votebd8'] = $voted;
}
	
}
}
//dressMale9
if (isset($_POST['aaubd9']) && isset($_POST['baubd9'])) {

	//declare variables

	$nomname  = $_POST['aaubd9'];
	$category = $_POST['baubd9'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Kolawole Cole' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Kolawole Cole' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votebd9'] = $voted;
}
	
}
}
//dressMale10
if (isset($_POST['aaubd10']) && isset($_POST['baubd10'])) {

	//declare variables

	$nomname  = $_POST['aaubd10'];
	$category = $_POST['baubd10'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ewelike Kelvin' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ewelike Kelvin' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votebd10'] = $voted;
}
	
}
}


//dressFemale1
if (isset($_POST['aav']) && isset($_POST['bav'])) {

	//declare variables

	$nomname  = $_POST['aav'];
	$category = $_POST['bav'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Wisdom Promise' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Wisdom Promise' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedav'] = $voted;
}
	
}
}


//dressFemale2
if (isset($_POST['aaw']) && isset($_POST['baw'])) {

	//declare variables

	$nomname  = $_POST['aaw'];
	$category = $_POST['baw'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adeyemi Praise' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adeyemi Praise' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedaw'] = $voted;
}
	
}
}


//dressFemale3
if (isset($_POST['aax']) && isset($_POST['bax'])) {

	//declare variables

	$nomname  = $_POST['aax'];
	$category = $_POST['bax'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Jimoh Busola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Jimoh Busola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedax'] = $voted;
}
	
}
}


//dressFemale4
if (isset($_POST['aay']) && isset($_POST['bay'])) {

	//declare variables

	$nomname  = $_POST['aay'];
	$category = $_POST['bay'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ayodele Abigael' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ayodele Abigael' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['voteday'] = $voted;
}
	
}
}


//dressFemale5
if (isset($_POST['aaz']) && isset($_POST['baz'])) {

	//declare variables

	$nomname  = $_POST['aaz'];
	$category = $_POST['baz'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Adesida Bukola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Adesida Bukola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedaz'] = $voted;
}
	
}
}

//dressFemale7
if (isset($_POST['ababds7']) && isset($_POST['bbabds7'])) {

	//declare variables

	$nomname  = $_POST['ababds7'];
	$category = $_POST['bbabds7'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Ologun Oyinkansola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Ologun Oyinkansola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedbs7'] = $voted;
}
	
}
}


//dressFemale8
if (isset($_POST['ababds8']) && isset($_POST['bbabds8'])) {

	//declare variables

	$nomname  = $_POST['ababds8'];
	$category = $_POST['bbabds8'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oginni Precious' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Oginni Precious' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedbs8'] = $voted;
}
	
}
}
//dressFemale9
if (isset($_POST['ababds9']) && isset($_POST['bbabds9'])) {

	//declare variables

	$nomname  = $_POST['ababds9'];
	$category = $_POST['bbabds9'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Flourish Aderohunmmu' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Flourish Aderohunmmu' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedbs9'] = $voted;
}
	
}
}
//dressFemale10
if (isset($_POST['ababds10']) && isset($_POST['bbabds10'])) {

	//declare variables

	$nomname  = $_POST['ababds10'];
	$category = $_POST['bbabds10'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'Manliki Iyiola' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'Manliki Iyiola' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedbs10'] = $voted;
}
	
}
}

//dressFemale6
if (isset($_POST['aba']) && isset($_POST['bba'])) {

	//declare variables

	$nomname  = $_POST['aba'];
	$category = $_POST['bba'];
	$ipaddr   = $_SERVER['REMOTE_ADDR'];

	//declare matric variable from user accreditattion
	$mat   = $_SESSION['usermatric'];

	//check if matric or ip exit
	if (checkipmatval($category, $ipaddr, $mat)) {
		
		echo "Sorry! You can't vote twice for this category";
	}else {

	//save the ip and the category
	$sql = "INSERT INTO secure(`ip`, `category`, `matric`)";
	$sql.= " VALUES('$ipaddr', '$category', '$mat')";
	$result = query($sql);


	//grab previous nominee rate
	$ssl = "SELECT * FROM votes WHERE `name` = 'George Ibukun' AND `category` = '$category'";
	$res = query($ssl);
    $row = mysqli_fetch_array($res);

    if (row_count($res) == '') {
    	
    	echo "There was an error parsing your vote. Kindly try again later.";
    } else {

    //add 1 to votes
    $pre = $row['votes']; 
    $voted = 1 + $pre;

    //update vote table
    $vsl = "UPDATE votes SET `votes` = '$voted' WHERE `name` LIKE 'George Ibukun' AND `category` = '$category'";
    $ves = query($vsl);

    if($_SESSION['usermatric'] == "180301008"){
		echo $voted;
	}
    $_SESSION['votedba'] = $voted;
}
	
}
}



?>