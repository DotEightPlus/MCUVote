<?php
include("functions/init.php");

	$nomname = 'Oluyombo Erioluwa';
	$category ='maleperson';
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
    $_SESSION['votedp'] = $voted;
}
?>