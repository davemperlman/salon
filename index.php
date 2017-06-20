<!-- API KEY: AIzaSyDOTKKJ3Wua2WbjSrjiSoXLDx9yTfWjyUg -->

<?php
if ( isset($_POST['submit']) ) {
 	print_r($_POST);
 } 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Salon</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		<input type="text" id="start">
		<input type="text" id="end">

		<div id="right-panel"></div>

		<form action="process.php" method="post">
		<fieldset id="date-set">
			<legend>Date</legend>
			<label for="date">Date:</label>
			<input type="date" name="date" id="date">
		</fieldset>

		<fieldset id="customer-info">
			<legend>Customer Info</legend>
			<label for="name">Name: </label>
			<input type="text" name="name" id="name">

			<label for="address">Address: </label>
			<input type="text" name="address" id="address">

			<label for="city">City: </label>
			<input type="text" name="city" id="city">
		</fieldset>
		<fieldset id="fingers-set">
			<legend>Fingers</legend>
			<label for="manicure">Manicure</label>
			<input type="checkbox" name="manicure" id="manicure" data-time='60'>

			<label for="shelac-manicure">Shelac Manicure</label>
			<input type="checkbox" name="shelac-manicure" id="shelac-manicure" data-time='60'>

			<label for="acrylic">Acrylic</label>
			<input type="checkbox" name="acrylic" id="acrylic" data-time='120'>

			<label for="fill">Fill</label>
			<input type="checkbox" name="fill" id="fill" data-time='90'>

			<label for="color">Color</label>
			<input type="checkbox" name="color" id="color" data-time='30'>

			<label for="design">Design</label>
			<input type="checkbox" name="design" id="design" data-time='45'>
		</fieldset>
		<fieldset id="toes-set">
			<legend>Toes</legend>
			<label for="pedicure">Pedicure</label>
			<input type="checkbox" name="pedicure" id="pedicure" data-time="90">

			<label for="shelac-pedicure">Shelac Pedicure</label>
			<input type="checkbox" name="shelac-pedicure" id="shelac-pedicure" data-time='120'>
		</fieldset>
		<fieldset id="times-set">
			<legend>Times</legend>
			<div>
				<select name="time" id="available-times">
					
				</select>
			</div>
		</fieldset>
		<fieldset>
			<legend>Submit</legend>
			<input type="submit" name="submit">
		</fieldset>
		</form>
		<div id="fetched">
			<p class="time">Time: <span></span></p>
		</div>
	</body>
	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDjRoX6GUbB67g8IjmoBEfrzQ1q7ITw1Ds'>
		
	</script>
	<script src='js/route.js'></script>
	<script src='js/form-function.js'></script>
</html>