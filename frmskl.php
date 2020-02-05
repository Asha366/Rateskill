<?php
session_start();
include_once 'buslogic.php';
if(isset($_SESSION["ucod"])==FALSE)
    header("location:index.php");
if(isset($_POST["btnsub"]))
{
    header("location:frmtst.php?tcod=".$_POST["drptec"]."&lvl=".$_POST["drplvl"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Test</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
				   <a class="navbar-brand" href="index.php">RATE MY SKILLS</a>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="frmskl.php">Rate My Skill</a></li>
					 <li><a href="index.php?lg=lg">Log-Out</a></li>
				  </ul>
				 
				</div>
			</div>
		</nav>
	</div>
	<div class="content">
		<div class="section1 sectionContact">
			<div class="section1Header">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1>Test Your Skill</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sectionSurvey">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                                    <form class="form-inline top40" method="Post" action="frmskl.php">
						<div class="form-group">
					<label class="tstSize" for="inlineFormInput">Select Technology</label>
                                        <select class="form-control input-sm dw1" name="drptec">
					<?php
                                        $obj=new clstec();
                                        $arr=$obj->disp_rec();
                                        for($i=0;$i<count($arr);$i++)
                                        {
                                            echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                                        }
                                        ?>
					</select>
						</div>
                                        <div class="form-group">
					<label class="tstSize" for="inlineFormInput">Select Level</label>
                                        <select class="form-control input-sm dw1" name="drplvl">
                                            <option value="B"/>Beginner
                                            <option value="I"/>Intermediate
                                            <option value="E"/>Expert
					</select>
						</div>
						<div class="form-group pull-right">
							<div class="input-group">
                                       <input name="btnsub" value="Submit" type="Submit"/>
							</div>
						</div>
					</form>
				</div>
			</div>
			<section class="aboutInner">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-4 paddingNone">
								<img src="images/about3.jpg" alt="">
							</div>
							<div class="col-sm-4 paddingNone">
								<img src="images/about2.jpg" alt="">
							</div>
							<div class="col-sm-4 paddingNone">
								<img src="images/about1.jpg" alt="">
							</div>
						</div>
					</div>
                                </div>
                        </section>
		</div>
	</div>
	<footer class="section">
		<div class="container">
			<p>&copy;2019 Rate My Skill. All Rights Reserved.</p>
				<ul>
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
				</ul>
		</div>
	</footer>
  <!-- modal   -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
				<form class="formTxt">
					<div class="form-group groupPosition">
						<h1>Sign Up</h1>
						<i class="fa fa-pencil iconPosition"></i>
					</div>
					<div class="paddingModal">
						<div class="form-group">
							<label for="exampleInputEmail1">User Name</label>
							<input type="text" class="form-control" id="exampleInputUser" placeholder="User Name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Conform Password</label>
							<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="marginAccept">
								<input type="checkbox"><span class="spanChk">I agree with terms and conditions</span>
							</div>
							<button type="submit" class="btn btn-default">Sign Up</button>
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
				<form class="formTxt">
					<div class="form-group groupPosition">
						<h1>Login</h1>
						<i class="fa fa-user iconPosition"></i>
					</div>
					<div class="paddingModal">
						<div class="form-group">
						<label for="exampleInputEmail1">User Name</label>
						<input type="text" class="form-control" id="exampleInputUser" placeholder="User Name">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="marginAccept">
								<input type="checkbox"><span class="spanChk">Keep me logged in </span>
							</div>
							<button type="submit" class="btn btn-default">Login</button>
						</div>
					  
					</div>
				</form>
			</div>
		  </div>
		</div>
	</div>
	<!-- modal   -->

</div>
</body>
</html>
