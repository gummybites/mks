<?php 

			$dbLocalhost = mysql_connect("localhost", "root", "")
	or die("Could not connect: " . mysql_error());
mysql_select_db("mks", $dbLocalhost)
	or die("Could not find database: " . mysql_error());
?>


