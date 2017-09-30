<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname="calibs";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	$name=$_POST['name'];
	$dept=$_POST['dept'];
	$sec=$_POST['sec'];
	$mob=$_POST['mob'];
	$checkbox1=$_POST['event'];
	$chk="";
	$chk2="";    
	foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";
      $chk2.= "1,";
   } 
   $col=rtrim($chk,", ");
   $val=rtrim($chk2,", ");
   /*echo "::".$col;
   echo "::".$val;
   echo "::".$mob;*/

   $sql="select * from calibs2k17 where mob=".$mob;
   $flag=0;
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)==0)
   {
   		$sql1="INSERT INTO calibs2k17 (name,dept,sec,mob,".$col.") values ('".$name."','".$dept."','".$sec."',".$mob.",".$val.");";
   		if (mysqli_query($conn, $sql1)) {
   			//echo "New record created successfully";
            echo "<html><script>location.href = 'succes.html';</script></html>";
            //header('Location:succes.html')
		} else {
		       //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               //header('Location: failure.html');
         echo "<html><script>location.href = 'failure.html';</script></html>";
		}
      //echo $sql1;
   	    
   }
   else
   {
    	header('Location: failure.html');
   }
}
?>
