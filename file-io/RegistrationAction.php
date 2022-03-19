<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action PHP</title>
</head>
<body>

	<?php 

		if ($_SERVER["REQUEST_METHOD"] === "POST") 
		{

			function test($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test($_POST['fname']);
			$lname = test($_POST['lname']);
			$dob = test($_POST['dob']);
			$religion = test($_POST['religion']);
			$preaddress = test($_POST['preaddress']);
			$peraddress = test($_POST['peraddress']);
			$phone = test($_POST['phone']);
			$email = test($_POST['email']);
			$website = test($_POST['website']);
			$username = test($_POST['username']);
			$pass = test($_POST['pass']);
			$conpass = test($_POST['conpass']);


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

			else {
				$handle = fopen("user.json", "r");
				$fr = fread($handle, filesize("user.json"));
				$arr1 = json_decode($fr);
				$lastIndex = count($arr1);
				$fc = fclose($handle);
				$data = array('id' => $lastIndex + 1, 'fname' => $fname, 'lname' => $lname, 'gender' => $gender, 'dob' => $dob, 'religion' => 
					$religion, 'preaddress' => $preaddresserr, 'peraddress' => 
					$peraddress, 'phone' => $phone, 'email' => $email, 'website' => 
					$website, 'username' => $username, 'pass' => $pass);

				$handle = fopen("user.json", "w");

				if ($arr1 === NULL) {
					$data = array($data);
					$data = json_encode($data);
				}
				else {
					$arr1[] = $data;
					$data = json_encode($arr1);
				}

				$fw = fwrite($handle, $data);
				$fc = fclose($handle);

				if ($fw) {
					echo "Successfully Registered";
				}
			}

		}
		
	    else 
	    {
		echo "No valid request";
	    }
	?>
	
    <br><br>
	<a href="registration.html">Go Back</a>
	<br><br>

</body>
</html>