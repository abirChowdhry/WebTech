<?php
require('header.php');
#require('../models/userModel.php');
session_start();
$name=$_SESSION['name'];
$myId=$_SESSION['id'];

?>

<!Doctype html>
<html>
<head><title>profile</title>
	<style type="text/css">
		.table1 {
			background-color:crimson;
			height: 900px;
		}
		.contentBody {
			background-color: wheat;
		}
	</style>
</head>
<body >
	<form action="" method="POST" class="table1">
	<table broder="1px" width="100%" >
		<tr style="background-color: cornsilk;">
			<td width="30%"  valign="top"><a href="../views/homePage.php"><img src="../models/logos/CrowdContent-logos.jpeg" alt="image" style="width:60px;height:60px"></a>
			</td>
			<td width="40%" valing="center"> 

			</td>

			<td width="30%"></td>
		</tr>
		<tr>
			<td aling="top" style="position: absolute;">
				<?php
			    $data=getUserByID($myId);
			    $profilePic=$data[5];
				?>
            <img src="<?=$profilePic?>" alt="image" style="width:300px; border-radius:60px"><br>
            <h3><?=$name?></h3>
	            <a href="../views/uploadPicture.php">Upload Content </a></br> 
				<a href="../views/uploadPicture.php">Upload Photo </a></br>
				 <a href="../views/edit.php">EDIT PROFILE </a>
			</td>
			<td class="contentBody">   
			<style type="text/css">
				.myBox {
						background-color: coral;
				        border: none;
				        padding: 5px;
				        font: 24px/36px sans-serif;
				        width: 600px;
				        height: 650px;
				        overflow: scroll;
				}
			</style> 
				<div class="myBox">
		              <?php
		              	$con=getConnection();
						$sql="select * FROM content ";
						$data=mysqli_query($con,$sql);
						while($row=mysqli_fetch_assoc($data)){
					    $content=$row['content'];
					    $cid=$row['Id'];
					    if($cid==$myId){
		            ?>
    
			     	<img src=<?=$content?> alt="image" style="width:580px; border-radius: 15px;">
			     	


		        <?php }
		    	} ?>
		    </div>
		    </td>
			<td ></td>
		</tr>
	</table>
	</form>
</body>
</html>