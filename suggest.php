<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

	$name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
	$details = trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS));

	if($name == "" || $email == "" || $detail == ""){
		echo "Please fill out the required field: NAME, EMAIL, DETAILS.";
		exit;
	} 
	if($_POST['address'] != ""){
		echo "Bad Form Input";
		exit;
	} 

	echo '<pre>';
	$email_body = "";
	$email_body .= "Name: ". $name . "<br>";
	$email_body .= "email: ". $email . "<br>";
	$email_body .= "details: ". $details . "\n";
	echo $email_body;
	echo '</pre>';

	//to do send email
	header("location:thanks.php?status=thanks"); 
}

$pageTitle = "Suggest a media item";
$section = "suggest";
include("header.php"); ?>

<div class="section page">
	<h1>Suggest a Media Item</h1>
	<?php if(isset($_GET['STATUS']) && $_GET["STATUS"] == 'thanks'){ ?>
		<p>Thanks for the email! I&rsquo;ll check out your suggestion shortly.</p>
</div>
<?php } else { ?>

<div class="section page">
	<div class="wrapper"></div>
	<h1>Suggest a Media Theme</h1>
	<p>If you think there is something I&rsquo;m missing complete, Let me know. Complete the form to let me know.</p>
	<form method="post" action="suggest.php">
		<table>
			<tr>
				<th><label for="name">Name</label></th>
				<td><input id="name" type="text" name="name"/></td>
			</tr>
			<tr>
				<th><label for="email">Email</label></th>
				<td><input id="email" type="text" name="email"/></td>
			</tr>
			<tr>
				<th><label for="details">Suggest Item Details</label></th>
				<td><textarea name="details" id="details" cols="30" rows="10"></textarea></td>
			</tr>
			<tr style="display:none;">
				<th><label for="address">Name</label></th>
				<td><input id="address" type="text" name="address"/>Please leave this field blank</td>
			</tr>
		</table>
		<input type="submit" value="send" />
		
	</form>
</div>
<?php } ?>
<?php include("footer.php"); ?>