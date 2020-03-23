<?php
echo isset($_POST['home']);
if(isset($_POST['home'])){
    echo"hello";
    header("location : front.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/css/mail.css">
</head>

<body>
<div class="container">

	<h1 class="brand"><span>Library</span>
    
    </h1>
    <span> <a href="front.php">HOME</a></span>
	<div class="wrapper">

		<!-- COMPANY INFORMATION -->
		<div class="company-info">
			<h3>DARK MATTER 0826</h3>

			<ul>
				<li><i class="fa fa-road"></i> 44 Main Street</li>
				<li><i class="fa fa-phone"></i> (555) 555-5555</li>
				<li><i class="fa fa-envelope"></i> radium@dark.com</li>
			</ul>
		</div>
		<!-- End .company-info -->

		<!-- CONTACT FORM -->
		<div class="contact">
			<h3>E-mail Us</h3>

			<form id="contact-form" method="POST" action="mailler.php" >

				<p>
					<label>Name</label>
					<input type="text" name="name" id="name" required>
				</p>

				<p>
					<label>Company</label>
					<input type="text" name="company" id="company">
				</p>

				<p>
					<label>E-mail Address</label>
					<input type="email" name="email" id="email" required>
				</p>

				<p>
					<label>Phone Number</label>
					<input type="text" name="phone" id="phone">
				</p>

				<p class="full">
					<label>Message</label>
					<textarea name="message" rows="5" id="message"></textarea>
				</p>

				<p class="full">
					<button type="submit">Submit</button>
				</p>

			</form>
            
			<!-- End #contact-form -->
		</div>
		<!-- End .contact -->

	</div>
	<!-- End .wrapper -->
</div>
<!-- End .container -->

</body>
</html>
