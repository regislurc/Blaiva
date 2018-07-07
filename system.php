<!DOCTYPE HTML>
<html>
	<head>
		<title>Blaiva</title>
		<meta charset="utf-8" />
		<link rel="icon" href="Blaiva.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" 	href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo row">
					<a href="index.html">AI Vision Robot <span>by Rwanda Robotics Team</span></a>
					<!-- <img style="width: 200px; height: 0px" src="Blaiva.png" class="img-responsive"> -->
				</div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
		

			<!-- <nav id="menu">

				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="generic.html">Generic</a></li>
					<li><a href="elements.html">Elements</a></li>
				</ul>
			</nav> -->

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>AI Vision for the blind</h1>
						<p>Blaiva gives a gift of sight to the blind through Artificial intelligence powered device.</p>

						<p>It's whole new world to see with Blaiva</p>
					</header>
					<a href="#main" class="button big scrolly">Learn More</a>
				</div>
			</section>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
				<section class="wrapper style1">
					<div class="" style="padding: 0 10%">
						<video id="video" width="640" height="480" autoplay></video>
						<button id="snap">Read Text</button>
						<canvas id="canvas" width="640" height="480"></canvas
						<img id="loadfeed" src="images/pic01.jpg" alt="" />
					</div>
				</section>

			</div>

		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					<ul class="icons">
						<li><a href="https://web.facebook.com/Blaiva-1074866389320658/" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://web.facebook.com/Blaiva-1074866389320658/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<!-- <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li> -->
						<!-- <li><a href="#" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li> -->
					</ul>
					<p>&copy; Blaiva. All rights reserved.</p>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
				// Grab elements, create settings, etc.
				var video = document.getElementById('video');

				// Get access to the camera!
				if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
				    // Not adding `{ audio: true }` since we only want video now
				    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
				        video.src = window.URL.createObjectURL(stream);
				        video.play();
				    });
				}

				// Elements for taking the snapshot
				var canvas = document.getElementById('canvas');
				var context = canvas.getContext('2d');
				var video = document.getElementById('video');

				// Trigger photo take
				document.getElementById("snap").addEventListener("click", function() {
					context.drawImage(video, 0, 0, 640, 480);
					var img = canvas.toDataURL("image/png");


					// preparing to send
					var formdata = new FormData();
					var ajax = new XMLHttpRequest();

					formdata.append('action', 'text');
					formdata.append('file', img);
					ajax.open("POST", "api/process.php");        
					ajax.send(formdata);
					ajax.addEventListener("load", function(){
						// alert("Hello")
						// setTimeout(function(){
						// 	location.reload()
						// }, 100)                    
					})
					         

					//send the image for analysis
					// $.post('api/process.php', {action:'text', file:video})
				});
			</script>
			<!-- <script type="text/javascript">
				setInterval(function(){
					$.get('api/getFeed.php', function(data){
						console.log(data)
						//get that
						$("#loadfeed").attr('src', "api/"+data);
					});
					

				}, 100)
				// var source = new EventSource("../api/getFeed.php");
				// source.onmessage = function(event) {
				//     document.getElementById("result").innerHTML += event.data + "<br>";
				// };
			</script> -->
	</body>
</html>