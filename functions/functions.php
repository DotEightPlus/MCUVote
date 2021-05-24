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




if (isset($_POST['a']) && ($_POST['b'])) {
	
	$a =	$_POST['a'];
	$b =	$_POST['b'];
	$pass = $_POST['c'];

	$sqll = "INSERT INTO secure(`ip`, `category`)";
	$sqll.= "VALUES('$c', '$pass')";
	$ressult = query($sqll);

	$sql = "SELECT * FROM `votes` WHERE `category` = '$b' AND `a` LIKE `a` ";
	$res = query($sql);
	$row = mysqli_fetch_array($res);

	$c = $row['vote'];
	$d = $c + 1;

	//update vote
	$sq = "UPDATE votes SET `votes` = '$d'";
	$rsult = query($sq);
	confirm($rsult);

}
?>



