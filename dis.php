    <?php
    $to 		= "";
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
    $link = 'https://mcu-somssa.com.ng/./activate?id=';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://mcu-somssa.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #7681b0; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #ffc107'>Activate your email to continue</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! 👋 <br/> Kindly complete your accreditation by verifying this email belongs to you.</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none; border: 1px solid black'>Click here to verify this email Address</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'><b>Victor Oluyitan</b> (SOMSSA President, McU Chapter)
    </p>";	
	$body .= "<script src='https://mcu-somssa.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
    echo $to, $subject, $body, $headers;

?>