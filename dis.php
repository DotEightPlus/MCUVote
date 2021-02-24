    <?php
    //replace matric strings
        $matric = "MTE/2018/1005";
		$pass = str_replace('/', '', $matric);	

    $to 		= "";
	$from 		= "noreply@mcu-somssa.com.ng";
	
	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$headers .= "X-Priority: 1 (Highest)\n";
	$headers .= "X-MSMail-Priority: High\n";
	$headers .= "Importance: High\n";

	$subject = "SOMSSA AWARD NIGHT";

	$logo = 'https://mcu-somssa.com.ng/img/2.png';
	$url  = 'https://mcu-somssa.com.ng';
    $qrco = 'https://mcu-somssa.com.ng/upload/QRCard/'.$pass.'.png';
	$link = 'https://mcu-somssa.com.ng/./programmes';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>MCU-SOMSSA</title></head><link rel='stylesheet' href='https://mcu-somssa.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #7681b0; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='MCU-SOMSSA'>";
	$body .= "<h1 style='margin-top: 45px; color: #ffc107'>SOMSSA AWARD NIGHT</h1>
    <br />";
    $body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br /> Your
        registration for MCU-SOMSSA NIGHT was processed successful.</p>
    <br />";
	$body .= "<p style='margin-left: 45px; margin-top: 14px; text-align: left; font-size: 17px;'>Kindly take a screenshot of this mail as this serves
	as your ticket for the SOMSSA AWARD NIGHT</p>
    <br />";
    $body .= '<table class="text-center" style="width:90%; margin-left: 45px; color: white; border: 1px solid #f9f9ff;">
        <tr>
            <th style="border: 1px solid #f9f9ff;">Full Name</th>
            <th style="border: 1px solid #f9f9ff;">Department</th>
            <th style="border: 1px solid #f9f9ff;">Matric Number</th>
            <th style="border: 1px solid #f9f9ff;">Gender</th>
            <th style="border: 1px solid #f9f9ff;">Status</th>
            <th style="border: 1px solid #f9f9ff;">Date Registered</th>
        </tr>
        <tr style="border: 1px solid #f9f9ff;">
            <td style="border: 1px solid #f9f9ff;">'.$suite.'</td>
            <td style="border: 1px solid #f9f9ff;">'.$tpl.'</td>
            <td style="border: 1px solid #f9f9ff;">NGN '.number_format($all).'</td>
            <td style="border: 1px solid #f9f9ff;">Paid</td>
            <td style="border: 1px solid #f9f9ff;">Paid</td>
            <td style="border: 1px solid #f9f9ff;">'.date('D, M d, Y', strtotime($date)).'</td>
        </tr>
    </table><br />';
    $body .= "<img style='margin-top: 35px' src='{$qrco}' alt='MCU-SOMSSA'>";
    $body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email.
        This is a virtual email</p>";
    $body .= "<p style='text-align: center; padding-bottom: 50px;'><b>Victor Oluyitan</b> (SOMSSA President, McU
        Chapter)
    </p>";
    $body .= "<script src='https://mcu-somssa.com.ng/assets/js/bootstrap.min.js'></script>";
    $body .= "</section>";
    $body .= "</body>

    </html>";
    echo $to, $subject, $body, $headers;

    ?>