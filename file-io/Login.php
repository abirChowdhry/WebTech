<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<?php 

		if ($_SERVER["REQUEST_METHOD"] === "POST") 
		{
	    
	    $id = "";
		$username = "";
		$pass = "";
		
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$handle = fopen("user.json", "r");
			$fr = fread($handle, filesize("user.json"));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			for ($i = 0; $i < count($arr1); $i++) {
				if ($id == $arr1[$i]->id) {
					
				}
			}
		}
		else {
			die("Invalid Request");
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