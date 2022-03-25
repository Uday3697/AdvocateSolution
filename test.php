<?php
// add advo to case_date;
/*include('includes/database.php');
$sql='select advo_id,case_no from case_details';
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result))
{
	$advo_id=$row['advo_id'];
	$case_no=$row['case_no'];
	
	$update="update case_date set advo_id='$advo_id' where case_no='$case_no'";
	$update_result=mysqli_query($con,$update);
}
*/?>
<?php
/*
$sent=mail('verma4435@gmail.com','test from server','testSuccess');
if($sent)
{
    echo 'sent';
}else
{
    echo 'not send';
}
*/
?>
<?php
/*$ts=time();
$headers = "MIME-Version: 1.0\r\n
            Content-Type: text/html; charset=UTF-8\r\n";
$msg="

	    Link to reset password
	    www.advocatesolution.com/user/reset_password?enroll=&tid=".base64_encode($ts)."
	        click here to reset
	</body>
	</html>
	";
	$sent=mail('verma4435@gmail.com','subject',$msg,$header);
	if($sent)
{
    echo 'sent';
}else
{
    echo 'not send';
}
*/
?>