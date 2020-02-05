<?php
session_start();
include_once 'buslogic.php';
if(isset($_REQUEST["lg"]))
{
    unset($_SESSION["ucod"]);
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $obj->regdat=  date('y-m-d');
    $obj->regeml=$_POST["txteml"];
    $obj->regpwd=$_POST["txtpwd"];
    $obj->regsts='U';
    $obj->save_rec();
}
if(isset($_POST["btnlog"]))
{
    $obj=new clsreg();
    $b=$obj->logincheck($_POST["txteml1"], $_POST["txtpwd1"]);
    if($b==TRUE)
    {
        if($_SESSION["rol"]=='A')
            header("location:admin/frmtec.php");
        else if($_SESSION["rol"]=='U')
            header("location:frmskl.php");
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>PLACEMENT BUZZER</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function abc()
{
    var a=document.getElementById("pwd").value;
    var b=document.getElementById("cpwd").value;
    if(a!=b)
    {
        alert("Password And Conform Password Must Match");
        document.getElementById("pwd").focus();
        return false;
    }
}
</script>
</head>
<body>
<div class="mainNew">
	<div class="MainHeader">
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				   <a class="navbar-brand" href="index.php">PLACEMENT BUZZER</a>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
				
					<li><a href="frmskl.php">Rate My Skill</a></li>
					
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li class="modalClas" data-toggle="modal" data-target="#myModal"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li class="modalClas" data-toggle="modal" data-target="#myModalLogin"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<li class="active"><a href="visit.php">Visited companies</a></li>
				  </ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="content">
		<div class="sliderSection">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				  <li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				  <div class="item active">
				<img src="images/slide1.jpg" alt="Flower" width="460" height="100">
					<div class="carousel-caption">
					  <h3>PLACEMENT BUZZER</h3>
					  <p>Thanks to the training I have received here, now I feel capable enough to face any challenge.</p>
					  <a class="btn btnSignUp" href="#" data-toggle="modal" data-target="#myModal">Sign Up Free</a>
					</div>
				  </div>

				  <div class="item">
					<img src="images/slide4.jpg" alt="Flower" width="460" height="345">
					<div class="carousel-caption">
					  <h3>Rate My Skills</h3>
					  <p>“Apart from giving me technical skills, it has instilled self-confidence in me, which I think is equally important for the placements.”</p>
					  <a class="btn btnSignUp" href="#" data-toggle="modal" data-target="#myModal">Sign Up Free</a>
					</div>
				  </div>
				
				  <div class="item">
					<img src="images/slide2.jpg" alt="Flower" width="460" height="345">
					<div class="carousel-caption">
					  <h3>Rate My Skills</h3>
					   <p>Thanks to the training I have received here, now I feel capable enough to now I feel capable enough to face any challenge.</p>
					  <a class="btn btnSignUp" href="#" data-toggle="modal" data-target="#myModal">Sign Up Free</a>
					</div>
				  </div>

				  <div class="item">
					<img src="images/slide3.jpg" alt="Flower" width="460" height="345">
					<div class="carousel-caption">
					  <h3>Rate My Skills</h3>
					  <p>“Apart from giving me technical skills, it has instilled self-belief in me, which I think is equally important for the placements.”</p>
					  <a class="btn btnSignUp" href="#" data-toggle="modal" data-target="#myModal">Sign Up Free</a>
					</div>
				  </div>
			  
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		</div> <!-- End Slider Section -->
		
		<section id="RateMySkilId" class="sectionRateMySkil">
			<div class="blueBack">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h1 class="marginBottomNone">Test your skills</h1>
							<hr class="hrWhite"></hr>
							<p class="top-para white">Better prepare now than never </p>
							
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="progresCls">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="progress blue">
								<span class="progress-left">
									<span class="progress-bar"></span>
								</span>
								<span class="progress-right">
									<span class="progress-bar"></span>
								</span>
								<div class="progress-value">90%</div>
							</div>
							<h4 class="rateH text-center white">Subject - 1</h4>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="progress pink">
								<span class="progress-left">
									<span class="progress-bar"></span>
								</span>
								<span class="progress-right">
									<span class="progress-bar"></span>
								</span>
								<div class="progress-value">60%</div>
							</div>
							<h4 class="rateH text-center white">Subject - 2</h4>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="progress green">
								<span class="progress-left">
									<span class="progress-bar"></span>
								</span>
								<span class="progress-right">
									<span class="progress-bar"></span>
								</span>
								<div class="progress-value">80%</div>
							</div>
							<h4 class="rateH text-center white">Subject - 3</h4>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="progress yellow">
								<span class="progress-left">
									<span class="progress-bar"></span>
								</span>
								<span class="progress-right">
									<span class="progress-bar"></span>
								</span>
								<div class="progress-value">75%</div>
							</div>
							<h4 class="rateH text-center white">Subject- 4</h4>
						</div>

					</div>
				</div>
			</div>
		</section>

		
		
	
		
	   
		
		<footer class="section footerSection">
			<div class="container">
				<p>&copy;2019 Placement Buzzer. All Rights Reserved.</p>
					<!---<ul>
					<li><a href="http://www.facebook.com/" class="facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="http://www.twitter.com/" class="twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="https://plus.google.com/" class="google" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
					<li><a href="http://www.linkedin.com/" class="linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li><a href="http://www.instagram.com/" class="instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="https://www.youtube.com/" class="youtube" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					<li><a href="http://www.vimeo.com/" class="vimeo" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					<li><a href="http://www.tumblr.com/" class="tumblr" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
					<li><a href="http://www.dribbble.com/" class="dribbble" target="_blank"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					<li><a href="https://www.behance.net/" class="behance" target="_blank"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					<li><a href="https://www.flickr.com/" class="flickr" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
					</ul>-->
			</div>
		</footer>
  <!-- modal   -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <form class="formTxt" name="index" method="Post" onsubmit="return abc()" action="index.php">
					<div class="form-group groupPosition">
						<h1>Sign Up</h1>
						<i class="fa fa-pencil iconPosition"></i>
					</div>
					<div class="paddingModal">
					
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
                                                        <input name="txteml" type="email" required=""  class="form-control" id="exampleInputEmail1" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
                                                        <input name="txtpwd" type="password" required="" class="form-control" id="pwd" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Confirm Password</label>
                                                        <input name="txtconpwd" type="password" class="form-control" required="" id="cpwd" placeholder="Password">
						</div>
						<div class="form-group">
							
                                                    <input type="submit" class="btn btn-default" name="btnsub" value="Submit"/>
						</div>
					</div>
				</form>
			</div>
		  </div>
		</div>
	</div>
	<div class="modal fade" id="myModalLogin" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <form class="formTxt" method="Post" action="index.php">
					<div class="form-group groupPosition">
						<h1>Login</h1>
						<i class="fa fa-user iconPosition"></i>
					</div>
					<div class="paddingModal">
						<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
                                                <input name="txteml1" type="email" required="" class="form-control" 
                                                       id="exampleInputUser" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
                                                        <input name="txtpwd1" required="" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<div class="form-group">
					<input type="submit" class="btn btn-default"
                                               name="btnlog" value="Login"/>
						</div>
					  
					</div>
				</form>
			</div>
		  </div>
		</div>
	</div>
	<!-- modal   -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="js/custom.js"></script>
</div>
</body>
</html>
