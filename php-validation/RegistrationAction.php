<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action PHp</title>
</head>
<body>

	<?php 

		if ($_SERVER["REQUEST_METHOD"] === "POST") 
		{

		$fnameerr = $lnameerr = $gendererr = $doberr = $religionerr = 
		$preaddresserr = $emailerr = $usernameerr = $passerr = $conpasserr 
		= $matcherr = "";


        if (empty($_POST["fname"])) {
        $fnameerr = "First Name Required!";
        echo $fnameerr;
        }

		else if (empty($_POST["lname"])) {
		$lnameerr = "Last Name Required!";
		echo $lnameerr;
		}

		else if (empty($_POST["gender"])) {
		$gendererr = "Gender Required!";
		echo $gendererr;
		}

		else if (empty($_POST["dob"])) {
		$doberr = "Date of Birth Required!";
		echo $doberr;
		}

		else if(empty($_POST["religion"])){
	    $religionerr = "Religion Required!";
	    echo $religionerr;
		}

	    else if(empty($_POST["preaddress"])){
	    $preaddresserr = "Present Address Required!";
	    echo $preaddresserr;
		}

	    else if(empty($_POST["email"])){
	    $emailerr = "Email Required!";
	    echo $emailerr;
		}

	    else if(empty($_POST["username"])){
	    $usernameerr = "Username Required!";
	    echo $usernameerr;
		}

	    else if(empty($_POST["pass"])){
	    $passerr = "Password Required!";
	    echo $passerr;
		}

	    else if(empty($_POST["conpass"])){
	    $conpasserr = "Confirm Password Required!";
	    echo $conpasserr;
		}

	    else if(($_POST["conpass"]) !== ($_POST["pass"])){
	    $matcherr = "Password & Confirm Password Doesn't Match!";
	    echo $matcherr;
		}

		else 
		{
			echo "Name: " . $_POST["fname"] . $_POST["lname"];
			echo "<br><br>";
            echo "Gender: ". $_POST["gender"]; 
            echo "<br><br>";
            echo "Date of Birth: ". $_POST["dob"]; 
            echo "<br><br>";
            echo "Religion: ". $_POST["religion"]; 
            echo "<br><br>";
            echo "Present Address: ". $_POST["preaddress"]; 
            echo "<br><br>";
            echo "Permanent Address: ". $_POST["peraddress"]; 
            echo "<br><br>";
            echo "Phone: ". $_POST["phone"]; 
            echo "<br><br>";
            echo "Email: ". $_POST["email"]; 
            echo "<br><br>";
            echo "Personal Website Link: ". $_POST["website"]; 
            echo "<br><br>";
            echo "Username: ". $_POST["username"]; 
            echo "<br><br>";
            echo "Password: ". $_POST["pass"]; 
            echo "<br><br>";
		}

		}
		
	    else 
	    {
		echo "No valid request";
	    }
	?>

</body>
</html>