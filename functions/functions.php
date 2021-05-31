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
	$ssl = "SELECT * FROM votes WHERE `name` = 'Oluyombo Erioluwa' AND `category` = 'maleperson'";
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

    echo $voted;
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
    $_SESSION['votedq'] = $voted;
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
    $_SESSION['voteds'] = $voted;
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
    $_SESSION['votedx'] = $voted;
}
	
}
}


//EntreMale6
if (isset($_POST['az']) && isset($_POST['bz'])) {

	//declare variables

	$nomname  = $_POST['az'];
	$category = $_POST['bz'];
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
    $_SESSION['votedy'] = $voted;
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
    $_SESSION['votedak'] = $voted;
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
    $_SESSION['votedal'] = $voted;
}
	
}
}


//SportFemale2
if (isset($_POST['aam']) && isset($_POST['bam'])) {

	//declare variables

	$nomname  = 'Ayaeyibo Pereere';
	$category = 'sport_woman';
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
    $_SESSION['votedao'] = $voted;
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
    $_SESSION['votedau'] = $voted;
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
    $_SESSION['votedaz'] = $voted;
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
    $_SESSION['votedba'] = $voted;
}
	
}
}


?>



