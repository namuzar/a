
<form action="BMI.php" method="post">
<fieldset><legend>BMI Calculator:</legend>

<p><b>Name:</b> <input type="text" name="name" size="20" maxlength="40" /></p>
<p><b>Weight (Kg):</b> <input type="text" name="weight" size="20" maxlength="40" /></p>
<p><b>Height (Meter):</b> <input type="text" name="height" size="20" maxlength="40" /></p>

</fieldset>
<div align="left"><input type="submit" name="submit" value="Calculate" /></div>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST') { 
// Validate name
if (!empty($_POST['name'])) {
$name = $_POST['name'];
} else {
$name = NULL;
echo '<p><b>You forgot to enter your name!</b></p>';
}
// Validate weight
if (!empty($_POST['weight'])) {
$weight = $_POST['weight'];
} else {
$weight = NULL;
echo '<p><b>You forgot to enter your weight!</b></p>';
}
// Validate height
if (!empty($_POST['height'])) {
$height = $_POST['height'];
} else {
$height = NULL;
echo '<p><b>You forgot to enter your height!</b></p>';
}

// If everything is okay, print the message.
if ($weight && $height) {
// Calculate the total.
$total = $weight / ($height^2);
$total = number_format ($total, 2);

if ($total < 18.6){
	$scale = "Underweight";
}
elseif (18.6 < $total && $total < 25.0){
	$scale = "Normal";
}
elseif (24.9 < $total && $total < 30.0){
	$scale = "Overweight";
}
else {
	$scale = "Obese";
}

// Print the results.
echo "<br />Hi <b> $name! <b>
		<br />Your BMI: <b>$total<b>
		<br />Scale: $scale";
	
} else { // One form element was not filled out properly.
echo '<p><font color="red">Please fill out the form again.</font></p>';

}
}
?>
