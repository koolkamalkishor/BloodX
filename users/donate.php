<?php

session_start();
if(isset($_SESSION['uid']))
{
    echo "";
}
else{
    header('location: ../login.php');
}

?>

<html>
  <head>
      <link rel="stylesheet" type="text/css" href="style.css">

    <body>
        
        
        <ul id="myDIV">
            <li><h1>Welcome <?php echo"Divesh"?></h1></li>
            <li><hr></li>
            
            
            <li><a href="home.php">
              Home</a></li>
            <li><a class="navbar active" href="donate.php">Donate</a></li>
            <li><a class="navbar" href="request.php">Find Donar</a></li>
            <li><a class="navbar" href="availability.php">Availability</a></li>
            <li><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr></li>
            <li><a class="navbar" href="logout.php">Logout</a></li>
        </ul>
        
        
        
<br><h1 align="center">Donate Blood Nearby..</h1><br>
<table align="center">
<form action="donate.php" method="post">
    <tr>
        <th>
            Enter Blood Group
        </th>
        <td>
            <input type="text" name="city" placeholder="Enter City" required="required"/>
        </td>
    
    
        <td colspan="1"><input type="submit" name="submit" value="Search"/></td>
    </tr>
    
    
</form>
</table>
<br>

<table align="center" width="80%" border="1" style:"margin-top:10px;">
    <tr style="background-color:#000; color:#fff; ">
        <th>No.</th>
        <th>Organization</th>
        <th>Address</th>
        <th>City</th>
        <th>Contact Number</th>
        <th>Contact Email</th>
        <th>Date</th>
        <th>Time</th>
        
        
    </tr>
    
    <?php

    if(isset($_POST['submit'])){
        include('../dbcon.php');

        
        $city = $_POST['city'];
        

        $sql = "SELECT * FROM `blood camps` WHERE `city`='$city'"; 

        $run=mysqli_query($con, $sql);

        if(mysqli_num_rows($run)<1){
            echo "<tr><td colspan='8'>No Records Found</td></tr>";
        }
        else{
            $count=0;
            while($data=mysqli_fetch_assoc($run)){
                $count++;
                ?>
                <tr align="center">
                    <td><?php echo $count;?></td>
                    <td><?php echo $data['name'] ?> </td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo $data['city']; ?></td>
                    <td><?php echo $data['number']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['time']; ?></td>
                    
                </tr>

        <?php
            }
        }
    }
?>
    
</table>


      </body>
    </head>
</html>
    