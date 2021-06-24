<?php

    session_start();

    if(isset($_SESSION['status3']))
    {
    	if(!strcmp($_SESSION['status3'], "login"))
    	{
        	header("Location:unta.php");
        	die();
    	}
    }

?>