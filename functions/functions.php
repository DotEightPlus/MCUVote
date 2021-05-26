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

    echo $voted;
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
    $_SESSION['votedc'] = $voted;
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
    $_SESSION['votedg'] = $voted;
}
	
}
}


//mr5
if (isset($_POST['ai']) && isset($_POST['bi'])) {

	//declare variables

	$nomname  = $_POST['ai'];
	$category = $_POST['bi'];
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
    $_SESSION['votedh'] = $voted;
}
	
}
}


//mr6
if (isset($_POST['aj']) && isset($_POST['bj'])) {

	//declare variables

	$nomname  = $_POST['aj'];
	$category = $_POST['bj'];
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
    $_SESSION['votedi'] = $voted;
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
    $_SESSION['votedm'] = $voted;
}
	
}
}


//mr5
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
    $_SESSION['votedn'] = $voted;
}
	
}
}


//mr6
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
    $_SESSION['votedo'] = $voted;
}
	
}
}
?>



