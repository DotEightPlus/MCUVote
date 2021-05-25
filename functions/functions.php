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
	if(email_exist($email)) {

		echo "Sorry! That email has been accredited.";

	} else {

		if(matric_exist($email)) {

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

    echo $voted;
    $_SESSION['voted'] = $voted;
}
	
}
}




if (isset($_POST['aa']) && isset($_POST['b'])) {

	//declare variables

	$nomname  = $_POST['aa'];
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

    echo $voted;
    $_SESSION['voteda'] = $voted;
}
	
}
}
?>



