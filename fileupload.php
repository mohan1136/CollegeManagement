

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
    <style type="text/css">
        #form1
        {
            border:2px solid black;
            padding:20px;
        }
    </style>
</head>

<?php
    
    if(isset($_POST['submit']))
    {
        $connection=new mysqli('localhost','root','','cms');
        $query="SELECT * FROM faculty ORDER BY id DESC LIMIT 1";
        $output=mysqli_query($connection,$query);
        

        $row=mysqli_fetch_array($output);
        $mainid=$row['id'];
        $mainid=substr($mainid,3);
        $count=(int)$mainid;
        $count++;


        $id="RF1".$count;


        $mobile=$_POST['mobile'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $workAs=$_POST['workAs'];
        $email=$_POST['email'];
        $education=$_POST['education'];
        $branch=$_POST['branch'];
        $imgpath=$branch."/".$id;
        $dateOfBirth=$_POST['dateOfBirth'];
        $address=$_POST['address'];

        $branch=$_POST['branch'];
        if($_FILES["photo"]["error"] > 0)
        {
            echo "Error: " . $_FILES["photo"]["error"] . "<br>";
        }
        else
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"],"/opt/lampp/htdocs/project/".$branch."/".$id);
        }


        $query="insert into faculty values('$id','$name','$mobile','$gender','$workAs','$email','$education','$imgpath','$branch','$dateOfBirth','$address')";
        mysqli_query($connection,$query);

    }
?>

<body>
    <form method="post" enctype="multipart/form-data" id="form1">
        <label>Name</label>  <input type="text" name="name"> <br>         <br>              
        <label>Mobile no:</label>   <input type="text" name="mobile">  <br>   <br>                                            
        <label>Gender</label>     <input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female                                          <br> <br>         
        <label>workAs</label>   <input type="text" name="workAs"><br><br>
        <label>email</label>     <input type="text" name="email"> <br> <br>             
        <label>education</label>  <input type="text" name="education"><br><br>
        <label>dateOfBirth</label> <input type="text" name="dateOfBirth"><br><br>
        <label>address</label>  <input type="text" name="address">

        <label>branch</label>  
            <select name="branch">
              <option value="CSE">CSE</option>
              <option value="MECH">MECH</option>
              <option value="CIVIL">CIVIL</option>
              <option value="ECE">ECE</option>
            </select>



        <label for="fileSelect">Filename:</label><input type="file" name="photo" id="fileSelect">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>


