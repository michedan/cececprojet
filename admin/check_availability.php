<?php 
require_once("includes/dbconnection.php");
// code admin email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "Erreur : Adresse mail invalide.";
	}
	else {
		$sql =mysqli_query($con,"SELECT StaffEmail FROM tblstaff WHERE StaffEmail='$email'");
$num=mysqli_num_rows($sql);
if($num > 0)
{
echo "<span style='color:red'> Cette adresse mail est déja associée a un compte.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}



?>
