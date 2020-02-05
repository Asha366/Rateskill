<?php
session_start();
include_once 'buslogic.php';
if(isset($_SESSION["ucod"])==FALSE)
    header("location:index.php");

if(isset($_POST["btnsub"]))
{
   
    $tot=0;
    $qstpr=$_SESSION["qstpr"];
    
    for($i=0;$i<count($qstpr);$i++)
    {
       
        if($_POST["radio".$qstpr[$i][0]]=="T")
                $tot+=1;
        
    }
    
    unset($_SESSION["qstpr"]);
   header("location:frmres.php?tot=".$tot);
}
if(isset($_REQUEST["tcod"])==FALSE)
{
   // header("location:frmskl.php");
}
    else
{
    $obj=new clsqst();
    $qstpr=array();
   
    $arr=$obj->dspqst($_REQUEST["tcod"],$_REQUEST["lvl"]);
//    print_r($arr);
    for($i=0;$i<count($arr);$i++)
    {
        $r=rand(0,count($arr)-1);
        $fg=0;
        for($j=0;$j<count($qstpr);$j++)
        {
  //           print_r($qstpr);
           
            if($qstpr[$j][0]==$arr[$r][0])
            {
                $fg=1;
                break;
            }
        }
        if($fg==1)
        {
            $i--;
            continue;
        }
        $qstpr[$i][0]=$arr[$r][0];
        $qstpr[$i][1]=$arr[$r][1]; 
    }
    $_SESSION["qstpr"]=$qstpr;
    
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
  <script language ="javascript" >
        var tim = 300;
        var timset;
        function f1() {
            timset = setInterval("f2()", 1000);
        }
        function f2() {
 
            tim = parseInt(tim) - 1;
            if (parseInt(tim) < 0) {
                
               
                document.forms('fam1').submit();
                
            }
            else {
                document.getElementById("timershow").value = tim;
                
            }
 
        }
    </script>
</head>
<body onload ="f1()">
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
                    <div style="margin: 2% 3% 0% 73%;
                         border: white;"> <input type="text" id="timershow" style="border: white;width: 30px;"  name="t1"readonly="" /> Second Left</div>
                                                        
			<div class="row">
				<div class="col-sm-12">
                                    <form id="fam1" name="fam1" class="formTxt" action="frmtst.php" method="Post">
                                        <?php
                                        if(isset($_SESSION["qstpr"]))
                                        {
                                            $qstpr=$_SESSION["qstpr"];
                                            $qcod=array();
                                            for($i=0;$i<count($qstpr);$i++)
                                            {
                                                $qcod[$i][0]=$qstpr[$i][0];
                                                
                                        ?>
                                     	<div class="form-group">
							<div class="control-group">
								<h3><?php echo $qstpr[$i][1]; ?></h3>
                                                                <?php
                                                                $obj1=new clsans();
                                                                $arr1=$obj1->disp_rec($qstpr[$i][0]);
                                                                $w=array();
                                                                for($j=0;$j<count($arr1);$j++)
                                                                {
                                                            echo "<label class=control control--radio radioWidth >";
                                                            echo $arr1[$j][2];
						             echo "<input type=radio name=radio".$qstpr[$i][0]." value=".$arr1[$j][3]." />";
						      echo "<div class=control__indicator ></div>";
						      echo "</label>";      
                                                      $w[$j][0]=$arr1[$j][0];
                                                                }
                                                                $_SESSION["w"]=$w;
                                                                ?>
								
								
							</div>
						</div>
					   
                                        
                                        <?php
                                            }
                                           $_SESSION["qq"]=$qcod;
                                          // echo $qcod;
                                        }
                                        ?>
					
                                        <input type="submit" id="btn11" class="btn btn-default btnSend bottom30" value="Submit" name="btnsub"/>
					</form>
				</div>
			</div>
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


