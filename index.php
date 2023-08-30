<?php 
	//include header file
	include ('include/header.php');
?>

<style>
/* CSS for animations and styling */
.header {
	animation: fadeIn 2s ease;
}

@keyframes fadeIn {
	from { opacity: 0; }
	to { opacity: 1; }
}

.container-fluid.red-background {
	background-color: #e74c3c;
	padding: 50px 0;
}

.container-fluid.red-background h1 {
	font-size: 36px;
	font-weight: 700;
	color: white;
	padding-top: 10px;
}

.container-fluid.red-background hr {
	border-color: white;
}

.pera-text {
	color: white;
}

.card {
	animation: slideIn 1s ease;
	margin-bottom: 30px;
	opacity: 0; /* Initially hide the cards */
	transition: opacity 1s ease;
}

@keyframes slideIn {
	from { transform: translateY(50px); opacity: 0; }
	to { transform: translateY(0); opacity: 1; }
}

.hide {
	opacity: 0; /* Initially hide the content */
	transition: opacity 1s ease;
}

.show {
	opacity: 1; /* Show the content on scroll */
}
.white-bar {
	position: absolute;
	left: -2%;
	width: 110%;
}

.custom-button {
  background-color: #ffc107;
  color: #333;
  padding: 8px 20px; /* Reduced the button height */
  border-radius: 4px;
  text-decoration: none;
  transition: background-color 0.3s ease;
  position: absolute;
  left: 40%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  font-family: Arial, sans-serif; /* Added font-family */
}

.custom-button:hover {
  background-color: #4CAF50;
  color: white;
  animation: button-pulse 0.5s ease-in-out infinite alternate;
}

@keyframes button-pulse {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(1.1);
  }
}



</style>

<div class="container-fluid header-img">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="header">
				<h1 class="text-center">Donate the blood, save the life</h1>
				<p class="text-center">Donate the blood to help others.</p>
			</div>
			<hr class="white-bar text-center">
			<br>
				<br>
			<div class="form-group">
				<ul style="text-align: left">
					<li>Excuses never save a life, Blood donation does</li>
					<li>Donate! It is a bloody good job.</li>
					<li>There is hope to someone in your blood donation</li>
					<li>Opportunities knock the door sometimes, so don’t let it go and donate blood</li>
					<li>No one has ever become poor by giving</li>
					<li>It feels good, It makes me Proud, I am a blood donor</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- donate section -->
<div class="container-fluid red-background">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center" style="color: white; font-weight: 700; padding: 10px 0 0 0;">Donate The Blood</h1>
			<hr class="white-bar">
			<p class="text-center pera-text">
				We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
			</p>
			<a href="http://localhost/donatetheblood/search.php" class="btn btn-default btn-lg text-center center-aligned custom-button">Become a Life Saver!</a>

		</div>
	</div>
</div>
<!-- end donate section -->

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card hide"> <!-- Initially hide the card -->
				<h3 class="text-center red">Our Vision</h3>
				<img src="img/binoculars.png" alt="Our Vision" class="img img-responsive" width="168" height="168">
				<p class="text-center hide"> <!-- Initially hide the content -->
					We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
				</p>
			</div>
		</div>
		
		<div class="col">
			<div class="card hide"> <!-- Initially hide the card -->
				<h3 class="text-center red">Our Goal</h3>
				<img src="img/target.png" alt="Our Goal" class="img img-responsive" width="168" height="168">
				<p class="text-center hide"> <!-- Initially hide the content -->
					We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
				</p>
			</div>
		</div>
	
		<div class="col">
			<div class="card hide"> <!-- Initially hide the card -->
				<h3 class="text-center red">Our Mission</h3>
				<img src="img/goal.png" alt="Our Mission" class="img img-responsive" width="168" height="168">
				<p class="text-center hide"> <!-- Initially hide the content -->
					We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
				</p>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
	$(window).scroll(function() {
		$('.card').each(function() {
			var top_of_element = $(this).offset().top;
			var bottom_of_element = top_of_element + $(this).outerHeight();
			var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
			var top_of_screen = $(window).scrollTop();

			if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
				$(this).removeClass('hide').addClass('show');
				$(this).find('p').removeClass('hide').addClass('show');
			}
		});
	});
});
</script>

<?php
//include footer file
include ('include/footer.php');
?>
