<?php
include("functions/init.php");

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
?>