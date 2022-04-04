<?php 
	require('header.php');
	#require('userModel.php');
	session_start();
	$myId=$_SESSION['id'];

    $data=getUserByID($myId);
    $name=$data[1];
    $pass=$data[2];
    $mail=$data[4];
    $type=$data[3];
    if($type=='0'){
    	$link="../views/freeUser.php";
    }
    else if($type=='1'){
    	$link="../views/editProfile.php";
    }
        else if($type=='2'){
    	$link="../views/editProfile.php";
    }
        else if($type=='3'){
    	$link="../views/editProfile.php";
    }
//$id= $_GET['id'];

	if(isset($_REQUEST['submit'])){
		$updateName=$_REQUEST['username'];
		$updatePassword=$_REQUEST['password'];
		$updateMail=$_REQUEST['email'];
		$name=$updateName;
	    $pass=$updatePassword;
	    $mail=$updateMail;

        $status=updateUser($myId,$updateName,$updatePassword,$updateMail);
        if($status){
        
        }
}

?>

<html>
<head>
	<title>Edit User</title>
</head>
<body>

	<a href="../views/homePage.php"> <img src="../models/logos/CrowdContent-logos.jpeg" alt="image" style="width:60px;height:60px"></a> |
	<a href="<?=$link?>"> Back</a>

	<form method="POST" action="">
		<fieldset>
			<legend>EDIT USER</legend>
		
		<table>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="username" value="<?=$name?>">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password" value="<?=$pass?>">
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="email" name="email" value="<?=$mail?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Update">
				</td>
			</tr>
		</table>
		</fieldset>
	</form>
</body>
</html>
