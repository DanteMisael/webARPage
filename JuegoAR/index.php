<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Juego AR</title>
    <meta name="description" content="Juego DE REALIDAD AUMENTADA">
  	<meta name="keywords" content="realidad, aumentada, game, android, celular, foro">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Librerías de google para el Login -->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="958039031969-s0nu6gc033ef45gduslqbkjptaar4kt3.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!-- 1. Link to jQuery (1.8 or later), -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

    <!-- fotorama.css & fotorama.js. -->
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

    <!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
  	<link rel="stylesheet" href="css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="css/font-awesome.min.css"/>
  	<link rel="stylesheet" href="css/owl.carousel.css"/>
  	<link rel="stylesheet" href="css/style.css"/>
  	<link rel="stylesheet" href="css/animate.css"/>

  </head>
  <body>
    <!-- Page Preloder -->
  	<div id="preloder">
  		<div class="loader"></div>
  	</div>

    <!-- Header section -->
  	<header class="header-section">
  		<div class="container">
  			<!-- logo -->
  			<a class="site-logo" href="index.html">
          <img src="img/Logo3D_50p.png" alt="">
  			</a>
  			<div class="user-panel">
          <button onclick="document.getElementById('id01').style.display='block'">Login</button>
  			     	 <!-- <a href="login.php">Login</a>  /  <a href="login.php">Register</a> -->
  			</div>
  			<!-- barra responsiva -->
  			<div class="nav-switch">
  				<i class="fa fa-bars"></i>
  			</div>
  			<!-- site menu -->
  			<nav class="main-menu">
  				<ul>
  					<li><a href="index.php" style="color:#17a2b8;">Página principal</a></li>
  					<li><a href="categories.html">Notas de versión</a></li>
  					<li><a href="community.html">Foro</a></li>
  					<li><a href="contact.html">Contacto</a></li>
  				</ul>
  			</nav>
  		</div>
  	</header>
  	<!-- Header section end -->

    <section class="content Fondo", id="Fondo">
      <div class="fotorama">
        <img src="img/App.JPG">
        <img src="img/App2.jpg">
        <img src="img/App3.jpg">
        <img src="img/App4.jpg">
      </div>
    </section>


    <div id="id01" class="modal">

  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}
</script>

<script>
    function onSignIn(googleUser) {
      // Useful data for your client-side scripts:
      var profile = googleUser.getBasicProfile();
      console.log("ID: " + profile.getId()); // Don't send this directly to your server!
      console.log('Full Name: ' + profile.getName());
      console.log('Given Name: ' + profile.getGivenName());
      console.log('Family Name: ' + profile.getFamilyName());
      console.log("Image URL: " + profile.getImageUrl());
      console.log("Email: " + profile.getEmail());
      // The ID token you need to pass to your backend:
      var id_token = googleUser.getAuthResponse().id_token;
      console.log("ID Token: " + id_token);
    }
  </script>

    <!--====== Javascripts & Jquery ======-->
  	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/owl.carousel.min.js"></script>
  	<script src="js/jquery.marquee.min.js"></script>
  	<script src="js/main.js"></script>
  </body>

</html>
