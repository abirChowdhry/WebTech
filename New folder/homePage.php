<?php
// Start the session
require('header.php');
require('userModel.php');
session_start();
$name=$_SESSION['name'];
$myId=$_SESSION['id'];


?>
<!DOCTYPE html>
<html>
<head>
<title></title
</head>
<body>
	<table  width="100%" >
		<tr> <! The Header Contain Logo , Navigations etc>
			<td colspan="2" ><a href="../views/homePage.php"><img src="../models/logos/CrowdContent-logos.jpeg" alt="image" style="width:60px;height:60px"></a></td>
			<td align="right">
				<a href="../views/member.php?ptyp=1">Upgrade</a>
				<a href="../controllers/logout.php">Logout</a></td>
		</tr>

		<tr > 
			<td width="25%" valign="top">
			<h3> <?=$name?><a href="../views/editProfile.php?id=<?=$myId?>">- View Profile<?=$myId?></a></h3></td>


			<td width="50%">
				<style>
	          		body {
			        margin-bottom: 200%;
			        }

			        /* Box styles */
			        .myBox {
			        	background-color: gray;
				        border: none;
				        padding: 5px;
				        font: 24px/36px sans-serif;
				        width: 620px;
				        height: 700px;
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
					    $contentCreator=getUserByID($cid);
					    $cName=$contentCreator['1'];
					    $cPicture=$contentCreator['5'];
					    ?>
                        <a href="../views/profile.php"><img src="<?=$cPicture?>" alt='image' style="width:60px;/*profile picture*/
                        height:60px;"><?=$cName?></a></br>
					    <img src="<?=$content?>" alt='image' style="width:600px;"></br>  
					    <h3>     </h3>
                        <?php 
					    } ?>
					?>
				</div>


			</td>
			<td width="25%" valign="top">
				<h3>People you are following </h3><br>
				<?php
		        $file = fopen('../models/follow.txt', 'r');

		              while (!feof($file)) {
		              $profile = fgets($file);
		              $profileInfo = explode("|", $profile);
		              if(isset($profileInfo[0])&&isset($profileInfo[1])){
		              ?>
                    
		            <a href="../views/profile.php?id=<?=$profileInfo[0]?>">🔴<?=$profileInfo[1]?></a><br>
	


		        <?php } } ?>
			</td>
		</tr>
	</table>
</body>
</html>