<?php
session_start();
include_once '../buslogic.php';
if(isset($_REQUEST["tcod"]))
{
    $_SESSION["tcod"]=$_REQUEST["tcod"];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script language="javascript">
function abc(a)
{
    window.location="frmqstbnk.php?tcod="+a;
}
</script>
</head>
<body>
<!-- wrapper start -->
<div class="MainHeader">
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				   <a class="navbar-brand" href="index.html">Placement Buzzer</a>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="../index.php">Home</a></li>
					<li><a href="frmtec.php">Technologies</a></li>
					<li><a href="frmqstbnk.php">Question Bank</a></li>
                                        <li><a href="frmqst.php">Add New Question</a></li>	
				   <li><a href="../index.php?lg=lg">Log-Out</a></li>
                                  </ul>
				 
				</div>
			</div>
		</nav>
	</div>
	<div class="content">
		
		<div class = "container-fluid">
			<section id="contact" class="contact section">
				<div class="container">
					
						<div class="heading">
						<h2>Question Bank</h2>
						<div class="divider"></div>
						</div>			
						<div class="form">
							<div class="col-xs-12 col-sm-9 col-md-9 centered">
                                               <form class="contactform has-validation-callback" 
                                                     method="Post" action="frmqstbnk.php">
                                                   <table width="100%">
                                                       <tr><td>Select Technology</td>
                                                           <td>
                                        <select name="drptec" onchange="abc(this.value);">
                                                <?php
                                                $obj=new clstec();
                                                $arr=$obj->disp_rec();
                                                for($i=0;$i<count($arr);$i++)
                                                {
                                         if(isset($_SESSION["tcod"]) && $_SESSION["tcod"]==$arr[$i][0])
                                         echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1];   
                                          else
                                         echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                                                }
                                                ?>
                                                               </select>
                                                           </td>
                                                       </tr>
                                                   
                                                   </table>
						</form>
                                                            <p class="error">
                                                <?php
                                                  if(isset($_SESSION["tcod"]))              
                                                  {
                                                      $obj=new clsqst();
                                                  $arr=$obj->disp_rec($_SESSION["tcod"]);
                                                  if(count($arr)>0)
                                                  {
                                                      echo "<table width=100% border=2 ><tr><th>Question</th><th>Level</th></tr>";
                                                      for($i=0;$i<count($arr);$i++)
                                                      {
                                                        echo "<tr><td>".$arr[$i][1]."</td>";
                                                        echo "<td>".$arr[$i][3]."</td>";
                                                        echo "<td><a href=frmans.php?qcod=".$arr[$i][0]." >Answer Options</a></td></tr>";
                                                      }
                                                      echo "</table>";
                                                  }
                                                  }
                                                ?>
                                                            </p>
							</div>
						</div>
                                
				</div>
			</section>
		</div>
		
		<footer class="section">
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
	</div>


<!-- wrapper closed -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="js/custom.js"></script>

</body>
</html>

