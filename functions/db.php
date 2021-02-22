<?php
//creating the database to use
$con = mysqli_connect("b529930c9ce973","us-cdbr-east-03.cleardb.com","93582d39","heroku_e3d17fc5a7a9db3");

function row_count($result) {

global $con;

	return mysqli_num_rows($result); 
}


function escape($string) {
	global $con;


	return mysqli_real_escape_string($con, $string);
}


function query($query) {
		global $con;

		return mysqli_query($con, $query);
}


function confirm($result) {
		global $con;
	if(!$result) {

		die("QUERY FAILED" . mysqli_error($con));
	}
}

function last_id($last_id) {

	global $con;

	return mysqli_insert_id($con);
}

function fetch_array($result) {

global $con;

return mysqli_fetch_array($result);

}

?>