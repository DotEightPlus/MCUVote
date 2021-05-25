<?php
include("functions/init.php");

 $sql = "SELECT * FROM `votes` WHERE `name` LIKE 'Ajibade' AND `category` LIKE 'Fresher of the Year'";
                                                    $res = query($sql);
                                                    $row = mysqli_fetch_array($res);
                                                    echo $row['votes']; 
?>