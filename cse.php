<!DOCTYPE html>
<html>
<head>
	<title>Faculty</title>

	<style type="text/css">
		#main
		{
			width:700px;
			height:270px;
			position: absolute;
			top:10%;
			left:-50%;
			box-shadow: 0px 0px 5px black;
			padding:20px;
			background:white;
			overflow: hidden;
			animation-delay: 0.2s;
			animation-duration: 2s;
			animation-name: move;
			animation-fill-mode: forwards;
		}

		@keyframes move
		{
			40%
			{
		    	left:25%;	
		 	}
		  
		  	60%
		  	{
		    	left:18%;
		  	}
		  	80%
		  	{
		  		left:22%;
		  	}
		  	100%
		  	{
		  		left: 20%;
		  	}
		}



		@keyframes shake 
		{
			10%, 90% 
			{
		    	transform: translate3d(-10px, 0, 0);
		 	}
		  
		  	20%, 80% 
		  	{
		    	transform: translate3d(10px, 0, 0);
		  	}

		  	30%, 50%, 70%
		  	{
		    	transform: translate3d(-13px, 0, 0);
		  	}

		  	40%, 60%
		  	{
		    	transform: translate3d(13px, 0, 0);
		  	}
		}



		#profile
		{
			width:30%;
			height:98%;
			/*border: 2px solid blue;*/
		}
		#details
		{
			position: absolute;
			top:7%;
			left:35%;
			width:60%;
			height:85%;
			/*border: 2px solid blue;*/
		}
		#department
		{
			color: red;
			margin-top: 35px;
			text-align: center;
		}
	</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>



</body>
<?php



	if((!isset($_GET['branch'])) && (!isset($_GET['branchFullName'])))
	{
		die();
	}
    $branch=$_GET['branch'];
    $branchFullName=$_GET['branchFullName'];
	echo '<h2 id="department">Department of '.$branchFullName.'</h2>'; 	

	$connection=new mysqli('localhost','root','','cms');
    $query="select * from faculty where branch='".$branch."'";
    $output=mysqli_query($connection,$query);
    $top=20;
    while($row=mysqli_fetch_array($output))
    {
    	$imgpath=$row['imgpath'];
    	$fname=$row['fname'];
    	$workAs=$row['workAs'];
    	$education=$row['education'];
    	$mobile=$row['mobile'];
    	$email=$row['email'];
    	$dateOfBirth=$row['dateOfBirth'];
    	$address=$row['address'];
 
    	echo '<div id="main" style="top:'.$top.'%;">';

    		echo '<div style="background-image:url('.$imgpath.');background-size:cover;" id="profile">';
    		echo '</div>';


    		echo '<div id="details">';

    			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h style="font-family:Cursive;font-size:30px;"><b>'.$fname.'</b></h>';
    			echo '<br><br>&nbsp;&nbsp;&nbsp;   <h style="font-family:verdana;font-style: oblique;">Working as '.$workAs.' in RGUKT and I had Completed my graduation in '.$education.' </h>';

    			echo '<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;'.$dateOfBirth.'</p>';
    			echo '&#128222;&nbsp;&nbsp;'.$mobile;
    			echo '<p style="margin-top:15px;"><i class="fa fa-envelope"></i>&nbsp;&nbsp;'.$email.'</p>';
    			echo '<p><i class="fa fa-home" style="font-size:20px;" aria-hidden="true"></i>&nbsp;&nbsp;'.$address.'</p>';

    		echo '</div>';


    	echo "</div>";
    	$top+=55;
    }



?>



</html>