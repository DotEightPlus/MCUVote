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
	$activator = token_generator();
	
	//date registered
	$date = date("d-m-y h:i:sa");
	
	//check if email is registered 
	if(email_exist($email)) {

		echo "Sorry! That email has been verified.";

	} else {

		if(matric_exist($email)) {

			echo "Uh oh! You can only be accredited once.";

		} else {

		//declare a mail session
		$_SESSION['mail'] = $email;	

		//submit user details
	$sql = "INSERT INTO users(`sn`, `matric`, `name`, `dept`, `gend`, `email`, `date`, `active`, `activator`)";
	$sql.= " VALUES('1', '$matric', '$name', '$dept', '$gender', '$email', '$date', '0', '$activator')";
	$result = query($sql);


	//verify email
	verify($email, $activator);
			
		}
	}
	
	}
	//} else {
	
	//redirect("./opps");
	//}
	
	function verify($email, $activator) {
	
	$to 		= $email;
    $from 		= "noreply@mcu-somssa.com.ng";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Email Verification";

    $logo = 'https://mcu-somssa.com.ng/img/2.png';
    $url  = 'https://mcu-somssa.com.ng';
    $link = 'https://mcu-somssa.com.ng/./activate?id='.$activator;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>MCU-SOMSSA</title></head><link rel='stylesheet' href='https://mcu-somssa.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #7681b0; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='MCU-SOMSSA'>";
	$body .= "<h1 style='margin-top: 45px; color: #ffc107'>Activate your email to continue</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Kindly complete your accreditation by verifying this email belongs to you.</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none; border: 1px solid black'>Click here to verify this email Address</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'><b>Victor Oluyitan</b> (SOMSSA President, McU Chapter)
    </p>";	
	$body .= "<script src='https://mcu-somssa.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
    $send = mail($to, $subject, $body, $headers);

    echo "Loading...Please wait!";												
	echo '<script>window.location.href ="./verify"</script>';
	}
?>