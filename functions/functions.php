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

	$sql = "SELECT * FROM user WHERE email = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}



/**********************validate user registration**********/

$errors = [];

 	if(isset($_POST['name']) && isset($_POST['gend']) && isset($_POST['uemail']) && isset($_POST['upword']) && isset($_POST['cpword']) && isset($_POST['tel'])) {


		$name 			= clean($_POST['name']);
		$email    		= clean($_POST['uemail']);
		$gender    		= clean($_POST['gend']);
		$upword    		= clean($_POST['upword']);
		$tel            = clean($_POST['tel']);


		if(email_exist($email)) {

			echo "Sorry! That email already has an account.";

		} else {

   register_user($name, $email, $gender, $upword, $tel);


		}
}

/****register user*****/
function register_user($name, $email, $gender, $upword, $tel) {

	$name 				= escape($name);
	$email   			= escape($email);
	$tel    			= escape($tel);
	$gender				= escape($gender);
	$upword 			= md5($upword);

	$id                 = "DotL".rand(0, 999);


$sql = "INSERT INTO user(`id`, `name`, `email`, `gender`, `pword`, `tel`, `active`, `category`)";
$sql.= " VALUES('$id', '$name', '$email', '$gender', '$upword', '$tel', '0', 'user')";
$result = query($sql);
confirm($result);

verify($email);

	 }



/**********************validate landlord registration**********/

$errors = [];

 	if(isset($_POST['lname']) && isset($_POST['lgend']) && isset($_POST['lemail']) && isset($_POST['lpword']) && isset($_POST['lcpword']) && isset($_POST['ltel']) && isset($_POST['lbank']) && isset($_POST['lacct']) && isset($_POST['lnin'])) {


		$lname 			= clean($_POST['lname']);
		$lemail    		= clean($_POST['lemail']);
		$email    		= clean($_POST['lemail']);
		$lgender   		= clean($_POST['lgend']);
		$lpword    		= clean($_POST['lpword']);
		$ltel           = clean($_POST['ltel']);
		$lbank    		= clean($_POST['lbank']);
		$lacct    		= clean($_POST['lacct']);
		$lnin           = clean($_POST['lnin']);


		if(email_exist($email)) {

			echo "Sorry! That email already has an account.";

		}else {

   register_lnd($lname, $lemail, $lgender, $lpword, $ltel, $lbank, $lacct, $lnin);


		}
}

/****register landlord*****/
function register_lnd($lname, $lemail, $lgender, $lpword, $ltel, $lbank, $lacct, $lnin) {

	$lnam 				= escape($lname);
	$lemai   			= escape($lemail);
	$email   			= escape($lemail);
	$lte    			= escape($ltel);
	$lgend  			= escape($lgender);
	$lpwor  			= md5($lpword);
	$lbnk 				= escape($lbank);
	$lact    			= escape($lacct);
	$lni     			= escape($lnin);

	$id                 = "DotLnd".rand(0, 999);


$sql = "INSERT INTO user(`id`, `name`, `email`, `gender`, `pword`, `tel`, `active`, `category`, `bank`, `acct`, `nin`)";
$sql.= " VALUES('$id', '$lnam', '$lemai', '$lgend', '$lpwor', '$ltel', '0', 'landlord', '$lbnk', '$lact', '$lni')";
$result = query($sql);
confirm($result);

verify($email);

	 }

//--------- Register agent verification ----------//


$errors = [];

 	if(isset($_POST['aname']) && isset($_POST['agend']) && isset($_POST['aemail']) && isset($_POST['apword']) && isset($_POST['acpword']) && isset($_POST['atel']) && isset($_POST['abank']) && isset($_POST['aacct']) && isset($_POST['anin']) && isset($_POST['agtbn'])) {


		$aname 			= clean($_POST['aname']);
		$aemail    		= clean($_POST['aemail']);
		$email    		= clean($_POST['aemail']);
		$agender   		= clean($_POST['agend']);
		$apword    		= clean($_POST['apword']);
		$atel           = clean($_POST['atel']);
		$abank    		= clean($_POST['abank']);
		$aacct    		= clean($_POST['aacct']);
		$anin           = clean($_POST['anin']);
		$agtbn          = clean($_POST['agtbn']);


		if(email_exist($email)) {

			echo "Sorry! That email already has an account.";

		} else {

   register_agt($aname, $aemail, $agender, $apword, $atel, $abank, $aacct, $anin, $agtbn);


		}
}

/****register agent*****/
function register_agt($aname, $aemail, $agender, $apword, $atel, $abank, $aacct, $anin, $agtbn) {

	$anam 				= escape($aname);
	$aemai   			= escape($aemail);
	$email   			= escape($aemail);
	$ate    			= escape($atel);
	$agend  			= escape($agender);
	$apwor  			= md5($apword);
	$abnk 				= escape($abank);
	$aact    			= escape($aacct);
	$ani     			= escape($anin);

	$id                 = "DotAgt".rand(0, 999);


$sql = "INSERT INTO user(`id`, `agtbiz`, `name`, `email`, `gender`, `pword`, `tel`, `active`, `category`, `bank`, `acct`, `nin`)";
$sql.= " VALUES('$id', '$agtbn', '$anam', '$aemai', '$agend', '$apwor', '$atel', '0', 'agent', '$abnk', '$aact', '$ani')";
$result = query($sql);
confirm($result);

verify($email);

	 }

//--------- Activate email registered ------------//

function verify($email) {

	$_SESSION['you'] = token_generator();
	$verify 		 = $_SESSION['you'];
	$you 			 = $email;

	$_SESSION['email'] = $you;


	$sql = "UPDATE user SET `activator` = '$verify' WHERE `email` = '$you'";
	$res = query($sql);



	$to 		= $you;
    $from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Email Activation";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./activate?id='.$verify;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Activate your email to continue</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Thank you for creating an account with us. Kindly activate your email address;</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to activate your email Address</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
    $send = mail($to, $subject, $body, $headers);

    echo "Loading...Please wait!";												
	echo '<script>window.location.href ="./verify"</script>';

}




//------------ user login validation ----------//

if (isset($_POST['email']) && isset($_POST['pword'])) {
	

	$usrname 	= clean($_POST['email']);
	$password   = clean($_POST['pword']);
	$email 		= clean($_POST['email']);

 	
		if(!email_exist($email)) {

			echo "Wrong email inputed";
		}

 	else {

 login_user($usrname, $password);

				}
		} 

// user login check
 function login_user($usrname, $password) {

	$pword  	= md5($password);
	$usrname 	= escape($usrname);
	
$sql = "SELECT * FROM `user` WHERE `email` = '$usrname' AND `pword` = '$pword'";
$result = query($sql);
if(row_count($result) == 1) {
	$row = mysqli_fetch_array($result);

	$user 	 = $row['email'];
	$active  =  $row['active'];
	$email   = $row['email']; 

	if ($active == 0) {
		echo "Loading... Please wait";
		verify($email);
		echo '<script>window.location.href ="./verify"</script>';
	} else {

	if($usrname == $user || isset($_SESSION['you'])) {
		$_SESSION['Username'] = $usrname;
		unset($_SESSION['you']);

		echo "Loading...Please wait!";												
		echo '<script>window.location.href ="./apartments"</script>';
	}
}
} else {

		echo "Wrong Password";
	}

}



//----------- forgot password ---- //
if (isset($_POST['mail'])) {
	
	$email 				= clean($_POST['mail']);

 if(!email_exist($email)) {

			echo "That email does not have an account";
		}else {

	$_SESSION['me']		= token_generator();
	$me 				= $_SESSION['me'];


	$sql = "UPDATE user SET `activator` = '$me' WHERE `email` = '$email'";
	$res = query($sql);



	$to 		= $email;
    $from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Recover Password";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./recovery?id='.$me;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Password Recovery</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> You requested a reset of your password</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to recover your password</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Kindly ignore this message if you didn`t request for a password reset.</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

    $_SESSION['femail'] = $to;

   echo "Loading...Please wait!";												
   echo '<script>window.location.href ="./recover"</script>';
}
}



//----------------- recover password ------------//

if (isset($_POST['urpword']) && isset($_POST['ucpword'])) {
	
	$pword 		= md5($_POST['urpword']);
	$me 		= $_SESSION['recc'];


	$sql = "UPDATE user SET `pword` = '$pword', `activator` = '' WHERE `email` = '$me'";
	$res = query($sql);

	echo "Loading... Please wait!";

	echo '<script>window.location.href ="./updated"</script>';

}



//--------------------------- dashboard ---------------------------------------------///

if (isset($_POST['suite']) && isset($_POST['uapty']) && isset($_POST['waterty']) && isset($_POST['pwrsrc']) && isset($_POST['state']) && isset($_POST['ultel']) && isset($_POST['apmail']) && isset($_POST['price']) && isset($_POST['loc']) && isset($_POST['desc']) && isset($_POST['aptact']) && isset($_POST['aptbnk']) && isset($_POST['toi'])) {
	

$suite 			= clean($_POST['suite']);
$apty	 		= clean($_POST['uapty']);
$waterty 		= clean($_POST['waterty']);
$pwrsrc    		= clean($_POST['pwrsrc']);
$state 	 		= clean($_POST['state']);
$ultel    		= clean($_POST['ultel']);
$apmail         = clean($_POST['apmail']);
$price 			= clean($_POST['price']);
$loc            = clean($_POST['loc']);
$desc  			= clean($_POST['desc']);
$aptact			= clean($_POST['aptact']);
$aptbnk			= clean($_POST['aptbnk']);
$toi 			= clean($_POST['toi']);




upload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi);
}


//upload apartment
function upload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi) {

$sql = "INSERT INTO apartment(`sn`, `apt`, `apartment`, `location`, `description`, `price`, `water`, `power`, `status`, `uploader`, `tel`, `acct`, `bank`, `state`, `toilet`)";
$sql.= " VALUES('1' , '$suite', '$apty', '$loc', '$desc', '$price', '$waterty', '$pwrsrc', 'available', '$apmail', '$ultel', '$aptact', '$aptbnk', '$state', '$toi')";
$result = query($sql);

echo 'Loading... Please wait!';
echo '<script>window.location.href ="./uploadagreed?id='.$suite.'"</script>';
	 }		



//Apartment image
if (!empty($_FILES["file"]["name"])) {
	
			$target_dir = "../upload/apartment/";
			$target_file =  basename($_FILES["file"]["name"]);
			$targetFilePath = $target_dir . $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
			   
			// Check if file already exists
			if (file_exists($targetFilePath)) {
			    echo "Sorry, this apartment Image is already registered on our database. Kindly rename your file and try again.";
			    $uploadOk = 0;
			} else {

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    echo "Sorry, only JPG and JPEG files are allowed.";
			    $uploadOk = 0;
			} else {
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			   echo "Sorry, your apartment Image was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			   
			   move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
			   img_prod($target_file);
			   echo 'Loading.. Please wait!';
   			echo '<script>window.location.href ="./uploaded"</script>';
		}
	}	    	
}
}


///sql update product image
function img_prod($target_file) {

	$proid    = $_SESSION['aptimg'];

	$sql 	  = "UPDATE apartment SET `pix` = '$target_file' WHERE `apt` = '$proid'";
	$res = query($sql);

	echo 'Loading.. Please wait!';

	unset($_SESSION['aptimg']);
}




/************validate update password*******/
function validate_update() {
$errors = [];

	

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$pword           = md5($_POST['pword']);
			$cpword      	 = md5($_POST['cpword']);


if($pword != $cpword) {

			$errors[] = "Password doesn`t match!";
		}

			if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(updte($pword, $cpword)) {
					
					echo validation_errors("Wrong Password or Username!");
				} else {

					
					echo validation_errors("Password updated successfully");
				}
			} 

		}

} //function

/************************ user login functions**********/

function updte($pword, $cpword) {

	$us 		= $_SESSION['Username'];
	
$sqll = "UPDATE user SET `pword` ='$pword' WHERE `email`= '$us'";
$res = query($sqll);
	}



function rev() {
if($_SERVER['REQUEST_METHOD'] == "POST") {

$msg 			= $_POST['msg'];
$ref	 		= rand(0, 9999999);
$usname	 		= $_SESSION['Username'];
$date    		= date("Y-m-d h-i-sa");
$stat 	 		= "Open";


$sql = "INSERT INTO support(`sn`, `SupportRef`, `Username`, `Msg`, `Datesent`, `Status`)";
$sql.= " VALUES('1', '$ref', '$usname', '$msg', '$date', '$stat')";
$result = query($sql);
redirect("./sent");
}
}	

//--------------- edit apartment --------------//
if (isset($_POST['edsuite']) && isset($_POST['eduapty']) && isset($_POST['edwaterty']) && isset($_POST['edpwrsrc']) && isset($_POST['edstate']) && isset($_POST['edultel']) && isset($_POST['edapmail']) && isset($_POST['edprice']) && isset($_POST['edloc']) && isset($_POST['eddesc']) && isset($_POST['edaptact']) && isset($_POST['edaptbnk']) && isset($_POST['edtoi'])) {
	

$suite 			= clean($_POST['edsuite']);
$apty	 		= clean($_POST['eduapty']);
$waterty 		= clean($_POST['edwaterty']);
$pwrsrc    		= clean($_POST['edpwrsrc']);
$state 	 		= clean($_POST['edstate']);
$ultel    		= clean($_POST['edultel']);
$apmail         = clean($_POST['edapmail']);
$price 			= clean($_POST['edprice']);
$loc            = clean($_POST['edloc']);
$desc  			= clean($_POST['eddesc']);
$aptact			= clean($_POST['edaptact']);
$aptbnk			= clean($_POST['edaptbnk']);
$toi 			= clean($_POST['edtoi']);




edupload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi);
}


//upload apartment
function edupload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi) {

$sql = "UPDATE apartment SET `sn` = '1', `apartment` = '$apty', `location` = '$loc', `description` = '$desc', `price` = '$price', `water` = '$waterty', `power` = '$pwrsrc', `status` = 'available', `uploader` = '$apmail', `tel` = '$ultel', `acct` = '$aptact', `bank` = '$aptbnk', `state` = '$state', `toilet` = '$toi' WHERE `apt` = '$suite'";
$result = query($sql);

echo 'Loading... Please wait!';
echo '<script>window.location.href ="./eduploadagreed?id='.$suite.'"</script>';
	 }



//-------------------- ads upload ------------------//
if (isset($_POST['adsid']) && isset($_POST['tagl']) && isset($_POST['dura']) && isset($_POST['targ']) && isset($_POST['link']) && isset($_POST['descp'])) {
	
$adsid			= clean($_POST['adsid']);
$tagl	 		= clean($_POST['tagl']);
$dura   		= clean($_POST['dura']); 
$targ   		= clean($_POST['targ']);
$link   		= clean($_POST['link']);
$descp    		= clean($_POST['descp']);

$r 				= $_SESSION['Username'];


//get ads pricing
if ($dura == "A Day") {
	
	$price = 500;
	$exp   = date('Y-m-d h:i:sa', strtotime($dura. ' + 1 days'));
} else {

if ($dura == "A Week") {
	
	$price = 3000;
	$exp   = date('Y-m-d h:i:sa', strtotime($dura. ' + 1 week'));
} else {

if ($dura == "3 Days") {
	
	$price = 1000;
	$exp   = date('Y-m-d h:i:sa', strtotime($dura. ' + 3 days'));
} else {

if ($dura == "A Month") {
	
	$price = 14000;
	$exp   = date('Y-m-d h:i:sa', strtotime($dura. ' + 1 month'));
} else {

if ($dura == "A Year") {
	
	$price = 160000;
	$exp   = date('Y-m-d h:i:sa', strtotime($dura. ' + 1 year'));
}
}
}
}
}

//check if user has enough funds
$sql = "SELECT * FROM user WHERE `email` = '$r'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$avlamt = $row['wallet'];
$tel    = $row['tel'];

$date   = date('Y-m-d');

if ($avlamt >= $price) {

	//deduct wallet balance
	$walbal = $avlamt - $price;
	$seqel  = "UPDATE user SET `wallet` = '$walbal' WHERE `email` = '$r'";
	$resl   = query($seqel);

	//insert details into transactions history

	$tran = "DLADS-".date("Y").rand(0, 99999999);

	$sll = "INSERT INTO wallet_his(`transref`, `user`, `amt`, `date`, `details`, `status`, `mode`, `type`)";
	$sll.= "VALUES('$tran', '$r', '$walbal', '$date', 'Ads Payment', 'paid', 'wallet', 'debit')";
	$rll = query($sll);
	
	activateads($adsid, $tagl, $dura, $targ, $link, $descp, $price, $tel, $r, $exp);
} else {

	echo "You don`t have enough funds in your wallet to run this advert.<br/> Kindly fund your wallet with an amount above NGN".number_format($price)." to run this ad.";
}
}


function activateads($adsid, $tagl, $dura, $targ, $link, $descp, $price, $tel, $r, $exp) {

$date = date("Y-m-d h:i:sa");

$sql = "INSERT INTO ads(`sn`, `ads_id`, `tagline`, `descrip`, `user`, `date`, `duration`, `price`, `session`, `tel`, `link`, `target`, `click`, `expiry`)";
$sql.= " VALUES('1', '$adsid', '$tagl', '$descp', '$r', '$date', '$dura', '$price', 'active', '$tel', '$link', '$targ', '0', '$exp')";
$result = query($sql);

echo "Loading.. Please wait";
echo '<script>window.location.href ="./adfile?id='.$adsid.'"</script>';
}


//ads image upload
if (!empty($_FILES["fle"]["name"])) {
	
			$target_dir = "../upload/ads/";
			$target_file =  basename($_FILES["fle"]["name"]);
			$targetFilePath = $target_dir . $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    echo "Sorry, only JPG and JPEG files are allowed.";
			    $uploadOk = 0;
			} else {
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			   echo "Sorry, your ads image was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			   
			   move_uploaded_file($_FILES["fle"]["tmp_name"], $targetFilePath);
			   img_ads($target_file);
   			
		
	}	    	
}
}


///sql update ads image
function img_ads($target_file) {

	$code     = $_SESSION['adsimg'];

	$sql 	  = "UPDATE ads SET `file` = '$target_file' WHERE `ads_id` = '$code'";
	$res 	  = query($sql);

	echo 'Loading.. Please wait';
	echo '<script>window.location.href ="./done"</script>';

}


//------- edit ads ----------//
if (isset($_POST['edadsid']) && isset($_POST['edtagl']) && isset($_POST['eddura']) && isset($_POST['edtarg']) && isset($_POST['edlink']) && isset($_POST['eddescp'])) {
	
$edadsid		= clean($_POST['edadsid']);
$edtagl	 		= clean($_POST['edtagl']);
$eddura   		= clean($_POST['eddura']); 
$edtarg   		= clean($_POST['edtarg']);
$edlink   		= clean($_POST['edlink']);
$eddescp    	= clean($_POST['eddescp']);

$edr			= $_SESSION['Username'];


//check if ads is still active
$sql2 = "SELECT * FROM ads where `user` = '$r' AND `ads_id` = '$edadsid'";
$res2 = query($sql2);
$row2 = mysqli_fetch_array($res2);
if ($row2['expiry'] == "expired") {
	
	echo "You can`t edit this ad. It has expired!";
} else {



//get user telephone
$sql = "SELECT * FROM user WHERE `email` = '$edr'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$edtel    = $row['tel'];
	
	edactivateads($edadsid, $edtagl, $edtarg, $edlink, $eddescp, $edtel, $edr);

}
}


function edactivateads($edadsid, $edtagl, $edtarg, $edlink, $eddescp, $edtel, $edr) {

$sql = "UPDATE ads SET `tagline` = '$edtagl', `descrip` = '$eddescp', `tel` = '$edtel', `link` = '$edlink', `target` = '$edtarg' WHERE `ads_id` = '$edadsid' AND `user` = '$edr'";
$result = query($sql);

echo "Loading.. Please wait";
echo '<script>window.location.href ="./edadfile?id='.$edadsid.'"</script>';
}


//---- count ads click ----//
if (isset($_POST['adsid']) && isset($_POST['click'])) {
	
	$ads = $_POST['adsid'];
	$clc = $_POST['click'];

	$clck = $clc + 1;

	$sql = "UPDATE ads SET `click` = '$clck' WHERE `ads_id` = '$ads'";
	$res = query($sql);

}



//--- pay for apartment from wallet --//
if (isset($_POST['drt']) && isset($_POST['all']) && isset($_POST['upl']) && isset($_POST['trpwod'])) {

	$suite = clean($_POST['drt']);
	$all   = clean($_POST['all']);
	$upl   = clean($_POST['upl']);
	$trps  = md5($_POST['trpwod']);

	$tran = "DLAPT-".date("Y").rand(0, 99999999);

	$r   = $_SESSION['Username'];
	
//retrieve user details
$sql = "SELECT * FROM user WHERE `email` = '$r'";
$res = query($sql);
$row = mysqli_fetch_array($res);

//confirm password for transction
if ($row['pword'] != $trps) {
	
	echo "Invalid Password inputed";
} else {

$avlmt  = $row['wallet'];
$tel    = $row['tel'];

//get previous temporary wallet balance
$temp   = $row['tempwallet'];

//add new price plus previous temporary wallet bal
if ($temp == "") {
	$temp = 0;
}

$newtemp = $temp + $all;


$date   = date('Y-m-d h:i:s');

//set the expiry date for the user next rent
$expy = date('Y-m-d', strtotime($date. ' + 1 year'));

//check if user has enough funds
if ($avlmt >= $all) {

	rentapt($suite, $date, $r, $tel, $tran, $all, $upl, $expy, $newtemp, $walbal);
} else {

	echo "You don`t have enough funds in your wallet.<br/> Kindly fund your wallet with an amount above NGN".number_format($all)." to rent this apartment.";

}
}
}



//get apartment
function rentapt($suite, $date, $r, $tel, $tran, $all, $upl, $expy, $newtemp, $walbal) {

	//get apartment details from uploader
	$rsl = "SELECT * FROM apartment WHERE `apt` = '$suite'";
	$rss = query($rsl);
	$rlw = mysqli_fetch_array($rss);

	if ($upl == $r) {
		
		echo "This apartment belongs to you. <br/> You are not allowed to rent an apartment that belongs to you.";

	} else {

	//deduct available balance and credit tepmporary wallet
	$walbal = $avlmt - $all;
	$seqel  = "UPDATE user SET `tempwallet` = '$newtemp', `wallet` = '$walbal' WHERE `email` = '$r'";
	$resl   = query($seqel);

	//insert details into transactions history
	$sll = "INSERT INTO wallet_his(`transref`, `user`, `amt`, `date`, `details`, `status`, `mode`, `type`)";
	$sll.= "VALUES('$tran', '$r', '$all', '$date', 'Apartment Rent', 'pending', 'wallet', 'debit')";
	$rll = query($sll);


	$pix = $rlw['pix'];
	$tpl = $rlw['apartment'];

	//give tenant a week to secure the apartment
	$due        = date('D, M d, Y', strtotime($date. ' + 1 week'));

	//insert user rent records
	$sql = "INSERT INTO rent(`sn`, `apt`, `paydate`, `expiry`, `tenantmail`, `tenanttel`, `tranref`, `price`, `uploader`, `status`, `type` , `pix`, `pendlimit`)";
	$sql.= " VALUES('1', '$suite', '$date', '$expy', '$r', '$tel', '$tran', '$all', '$upl', 'pending', '$tpl', '$pix', '$due')";
	$result = query($sql);


	//notify user about the new transaction on the dashboard
	$ref = "DSPR-".rand(0, 99999); 
	$msg = "Hi there, <br> you just rented an apartment.<br/>Kindly check your transaction history for details.<br/> Your rent will be due by <b>".date('D, M d, Y', strtotime($expy))."</b>";
	$sqln = "INSERT INTO support_reply(`sn`, `ref`, `usname`, `msg`, `date`, `status`)";
	$sqln.= " VALUES('1', '$ref', '$r', '$msg', '$date', 'unread')";
	$resultn = query($sqln);


	//notify uploader of apartment about the new update
	$ref2 = "DSPR-".rand(0, 99999); 
	$msg2 = "Hi there, <br> your apartment with suite number <b>".$suite."</b> has been scheduled for rentage.<br/>Kindly check your apartment store for details.";
	$sqln2 = "INSERT INTO support_reply(`sn`, `ref`, `usname`, `msg`, `date`, `status`)";
	$sqln2.= " VALUES('1', '$ref2', '$upl', '$msg2', '$date', 'unread')";
	$resultn2 = query($sqln2);


	//notify user via email
	$to         = $r;
	$from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "You rented an apartment";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./dashboard/./myapartments';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>You rented an apartment</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> thank you for choosing DotLive as your apartment agency. <br/><br/> We noticed that you just rented an apartment. Below are <br/> details about the apartment rented ;</p>
		<br/>";
	$body .= '<table class="text-center" style="width:90%; margin-left: 45px; color: white; border: 1px solid #f9f9ff;">
   <tr>
    <th style="border: 1px solid #f9f9ff;">Suite</th>
    <th style="border: 1px solid #f9f9ff;">Apartment</th>
    <th style="border: 1px solid #f9f9ff;">Amount Paid</th>
    <th style="border: 1px solid #f9f9ff;">Date Paid</th>
    <th style="border: 1px solid #f9f9ff;">Next Due Date</th>
    <th style="border: 1px solid #f9f9ff;">Mode of Payment</th>
  </tr>
  <tr style="border: 1px solid #f9f9ff;">
    <td style="border: 1px solid #f9f9ff;">'.$suite.'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tpl.'</td>
    <td style="border: 1px solid #f9f9ff;">NGN '.number_format($all).'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($date)).'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($expy)).'</td>
    <td style="border: 1px solid #f9f9ff;">wallet</td>
  </tr>
</table><br/>';
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Kindly note that you are to verify this apartment and get your apartment key on or before  ".$due." <br/> else this apartment will no longer be yours. <br/><br/> Click here to visit your apartment center</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
	$send = mail($to, $subject, $body, $headers);


	//notify uploader via email
	$to         = $upl;
	$from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Your Apartment was Rented";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./dashboard/./myapartments';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Your Apartment was Rented</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> thank you for choosing DotLive as your apartment agency. <br/><br/> One of your apartment has been rented. Below are <br/> details about the apartment rented ;</p>
		<br/>";
	$body .= '<table class="text-center" style="width:90%; margin-left: 45px; color: white; border: 1px solid #f9f9ff;">
   <tr>
    <th style="border: 1px solid #f9f9ff;">Suite</th>
    <th style="border: 1px solid #f9f9ff;">Apartment</th>
    <th style="border: 1px solid #f9f9ff;">Date Paid</th>
    <th style="border: 1px solid #f9f9ff;">Tenant Tel</th>
  </tr>
  <tr style="border: 1px solid #f9f9ff;">
    <td style="border: 1px solid #f9f9ff;">'.$suite.'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tpl.'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($date)).'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tel.'</td>
  </tr>
</table><br/>';
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to review this rent</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
	$send = mail($to, $subject, $body, $headers);


	//update apartment to pending
	$ssl = "UPDATE apartment SET `status` = 'pending' WHERE `apt` = '$suite'";
	$rsl = query($ssl);


	echo "Loading...Please wait!";												
	echo '<script>window.location.href ="./success?id='.$tran.'"</script>';


}
}








//------------- pay for apartment from online wallet -----------//
if (isset($_POST['onldrt']) && isset($_POST['onlall']) && isset($_POST['onlupl']) && isset($_POST['onltrpwod'])) {

	$suite = clean($_POST['drt']);
	$all   = clean($_POST['all']);
	$upl   = clean($_POST['upl']);
	$trps  = md5($_POST['trpwod']);

	$tran = "DLAPT-".date("Y").rand(0, 99999999);

	$r   = $_SESSION['Username'];
	
//retrieve user details
$sql = "SELECT * FROM user WHERE `email` = '$r'";
$res = query($sql);
$row = mysqli_fetch_array($res);

//confirm password for transction
if ($row['pword'] != $trps) {
	
	echo "Invalid Password inputed";
} else {

$tel    = $row['tel'];

//get previous temporary wallet balance
$temp   = $row['tempwallet'];

//add new price plus previous temporary wallet bal
if ($temp == "") {
	$temp = 0;
}

$newtemp = $temp + $all;


$date   = date('Y-m-d h:i:s');

//set the expiry date for the user next rent
$expy = date('Y-m-d', strtotime($date. ' + 1 year'));


	onlrentapt($suite, $date, $r, $tel, $tran, $all, $upl, $expy, $newtemp);
}
}



//get apartment
function onlrentapt($suite, $date, $r, $tel, $tran, $all, $upl, $expy, $newtemp) {

	//get apartment details from uploader
	$rsl = "SELECT * FROM apartment WHERE `apt` = '$suite'";
	$rss = query($rsl);
	$rlw = mysqli_fetch_array($rss);

	if ($upl == $r) {
		
		echo "This apartment belongs to you. <br/> You are not allowed to rent an apartment that belongs to you.";

	} else {

	//credit tepmporary wallet
	$seqel  = "UPDATE user SET `tempwallet` = '$newtemp' WHERE `email` = '$r'";
	$resl   = query($seqel);

	//insert details into transactions history
	$sll = "INSERT INTO wallet_his(`transref`, `user`, `amt`, `date`, `details`, `status`, `mode`, `type`)";
	$sll.= "VALUES('$tran', '$r', '$all', '$date', 'Apartment Rent', 'pending', 'online pay', 'debit')";
	$rll = query($sll);


	$pix = $rlw['pix'];
	$tpl = $rlw['apartment'];

	//give tenant a week to secure the apartment
	$due        = date('D, M d, Y', strtotime($date. ' + 1 week'));

	//insert user rent records
	$sql = "INSERT INTO rent(`sn`, `apt`, `paydate`, `expiry`, `tenantmail`, `tenanttel`, `tranref`, `price`, `uploader`, `status`, `type` , `pix`, `pendlimit`)";
	$sql.= " VALUES('1', '$suite', '$date', '$expy', '$r', '$tel', '$tran', '$all', '$upl', 'pending', '$tpl', '$pix', '$due')";
	$result = query($sql);


	//notify user about the new transaction on the dashboard
	$ref = "DSPR-".rand(0, 99999); 
	$msg = "Hi there, <br> you just rented an apartment.<br/>Kindly check your transaction history for details.<br/> Your rent will be due by <b>".date('D, M d, Y', strtotime($expy))."</b>";
	$sqln = "INSERT INTO support_reply(`sn`, `ref`, `usname`, `msg`, `date`, `status`)";
	$sqln.= " VALUES('1', '$ref', '$r', '$msg', '$date', 'unread')";
	$resultn = query($sqln);


	//notify uploader of apartment about the new update
	$ref2 = "DSPR-".rand(0, 99999); 
	$msg2 = "Hi there, <br> your apartment with suite number <b>".$suite."</b> has been scheduled for rentage.<br/>Kindly check your apartment store for details.";
	$sqln2 = "INSERT INTO support_reply(`sn`, `ref`, `usname`, `msg`, `date`, `status`)";
	$sqln2.= " VALUES('1', '$ref2', '$upl', '$msg2', '$date', 'unread')";
	$resultn2 = query($sqln2);


	//notify user via email
	$to         = $r;
	$from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "You rented an apartment";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./dashboard/./myapartments';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>You rented an apartment</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> thank you for choosing DotLive as your apartment agency. <br/><br/> We noticed that you just rented an apartment. Below are <br/> details about the apartment rented ;</p>
		<br/>";
	$body .= '<table class="text-center" style="width:90%; margin-left: 45px; color: white; border: 1px solid #f9f9ff;">
   <tr>
    <th style="border: 1px solid #f9f9ff;">Suite</th>
    <th style="border: 1px solid #f9f9ff;">Apartment</th>
    <th style="border: 1px solid #f9f9ff;">Amount Paid</th>
    <th style="border: 1px solid #f9f9ff;">Date Paid</th>
    <th style="border: 1px solid #f9f9ff;">Next Due Date</th>
    <th style="border: 1px solid #f9f9ff;">Mode of Payment</th>
  </tr>
  <tr style="border: 1px solid #f9f9ff;">
    <td style="border: 1px solid #f9f9ff;">'.$suite.'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tpl.'</td>
    <td style="border: 1px solid #f9f9ff;">NGN '.number_format($all).'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($date)).'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($expy)).'</td>
    <td style="border: 1px solid #f9f9ff;">wallet</td>
  </tr>
</table><br/>';
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Kindly note that you are to verify this apartment and get your apartment key on or before  ".$due." <br/> else this apartment will no longer be yours. <br/><br/> Click here to visit your apartment center</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
	$send = mail($to, $subject, $body, $headers);


	//notify uploader via email
	$to         = $upl;
	$from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Your Apartment was Rented";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./dashboard/./myapartments';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Your Apartment was Rented</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> thank you for choosing DotLive as your apartment agency. <br/><br/> One of your apartment has been rented. Below are <br/> details about the apartment rented ;</p>
		<br/>";
	$body .= '<table class="text-center" style="width:90%; margin-left: 45px; color: white; border: 1px solid #f9f9ff;">
   <tr>
    <th style="border: 1px solid #f9f9ff;">Suite</th>
    <th style="border: 1px solid #f9f9ff;">Apartment</th>
    <th style="border: 1px solid #f9f9ff;">Date Paid</th>
    <th style="border: 1px solid #f9f9ff;">Tenant Tel</th>
  </tr>
  <tr style="border: 1px solid #f9f9ff;">
    <td style="border: 1px solid #f9f9ff;">'.$suite.'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tpl.'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($date)).'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tel.'</td>
  </tr>
</table><br/>';
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to review this rent</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
	$send = mail($to, $subject, $body, $headers);


	//update apartment to pending
	$ssl = "UPDATE apartment SET `status` = 'pending' WHERE `apt` = '$suite'";
	$rsl = query($ssl);


	echo "Loading...Please wait!";												
	echo '<script>window.location.href ="./success?id='.$tran.'"</script>';


}
}


//----universal check for ads expiry---//
$sqller = "SELECT * FROM ads WHERE `session` = 'active'";
$result = query($sqller);

if (row_count($result) <= 0) {	
	
} else {
while($row = mysqli_fetch_array($result)) {

//check if ads is due for expiry
$duration = date('Y-m-d', strtotime($row['date']));
$expiry   = date('Y-m-d', strtotime($row['expiry']));

$date     = date('Y-m-d');

if ($date >= $expiry) {

	//constants
	$ads 	  = $row['ads_id'];
	$tag      = $row['tagline'];
	$username = $row['user'];
	$prcn     = $row['price'];
	$dap      = $row['date'];
	
	$sqli = "UPDATE ads SET `session` = 'expired' WHERE `ads_id` = '$ads'";
	$resi = query($sqli);

	//notify user about the update
	$ref = "DSPR-".rand(0, 99999);
	$msg = "Hi there, <br> your ad(s) with Ads ID :- <b>$ads</b> and Ads Tagline - <b>$tag</b>  got expired. Kindly check your ads center for details.";

	$sqln = "INSERT INTO support_reply(`sn`, `ref`, `usname`, `msg`, `date`, `status`)";
	$sqln.= " VALUES('1', '$ref', '$username', '$msg', '$date', 'unread')";
	$resultn = query($sqln);


	//notify user via email
	$to         = $username;
	$from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Your Ad has expired";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./dashboard/./adscenter';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Your Ad has expired</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> one of your ad got expired and will no longer be active. <br/> Kindly check the table below for details; </p>
		<br/>";
	$body .= '<table class="text-center" style="width:90%; margin-left: 45px; color: white; border: 1px solid #f9f9ff;">
   <tr>
    <th style="border: 1px solid #f9f9ff;">Ads ID</th>
    <th style="border: 1px solid #f9f9ff;">Tagline</th>
    <th style="border: 1px solid #f9f9ff;">Amount Paid</th>
    <th style="border: 1px solid #f9f9ff;">Date Paid</th>
    <th style="border: 1px solid #f9f9ff;">Mode of Payment</th>
  </tr>
  <tr style="border: 1px solid #f9f9ff;">
    <td style="border: 1px solid #f9f9ff;">'.$ads.'</td>
    <td style="border: 1px solid #f9f9ff;">'.$tag.'</td>
    <td style="border: 1px solid #f9f9ff;">NGN '.number_format($prcn).'</td>
    <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($dap)).'</td>
    <td style="border: 1px solid #f9f9ff;">wallet</td>
  </tr>
</table><br/>';
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to visit your ads center.</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><a href='https://doteightplus.com/contact'><img src='https://dotlive.com.ng/assets/img/icon/5.png'></a>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
	$send = mail($to, $subject, $body, $headers);

}

}

}

//-- universal check for apartment expiry --//

?>