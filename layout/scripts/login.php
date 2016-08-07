<!DOCTYPE html>
<html>
<head>
<title>SVA - Student Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="http://localhost/educational/layout/styles/layout.css" type="text/css"/>
</head>
<body>
<div class="wrapper col0">
 <div id="topbar">      
    <div id="loginpanel">
      <ul>
        <li class="left">Counselling Code&raquo; 1215</li>
        </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="http://localhost/educational/images/demo/21.jpg" style="height:70px">SVA College of Engineering</h1>
      <p>- a Temple of Wisdom</p>
    </div>
    <div class="fl_right">
      <ul>
        <li>
	 <form action="#" method="post" id="sitesearch">
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;" onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="image" src="http://localhost/educational/layout/search.gif" id="search" alt="Search" height="15px"/>
      </form> </li>
      </ul>
      <p>Tel: 044-22239786 | Mail: svacoe@edu.com</p>
	<p>Fax:04-3425617</p>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col2">
  <div id="topnav">
<ul>
<li class="active"><a href="http://localhost/educational/index.html">Home</a>
<ul style="color:white"><br>
<marquee dir="right">
This is a work of the student section committee of SVA College of Engineering</marquee>
</ul>
</li>
      <li><a href="http://localhost/educational/pages/About-welcome.html">About Us</a>
	</li>
      <li><a href="http://localhost/educational/pages/Departments-it.html">Departments</a >
        </li>
      <li><a href="http://localhost/educational/pages/academic-co.html">Academic</a></li>
      <li><a href="http://localhost/educational/pages/placement.html">Placements</a>
	<ul>
 	 <li><a href="placement-profile.html">Profile</a></li>
          	<li><a href="placement-intern.html">Internships</a></li>
          	<li class="last"><a href="placement-req.html">Requiters</a></li>
	</ul>
      </li>
</ul>
  </div>
</div>
<div class="wrapper col3">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
      <li>&#187;</li>
      <li><a href="#">Academic</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#">Student Login</a></li>
	</ul>
  </div>
</div>
<div class="wrapper col4">
<div id="container">
 <h2 style="float:right"><a href="http://localhost/educational/pages/academic-login.html">Logout</a>
</h2>
<caption><h1>Latest News</h1></caption>
<div style="height:300px;width;700px;border=1;color:#666666;background-color:#FDFFE1">
<font size="6px">
<marquee direction="up">
	Affiliated colleges May/June 2016 PG Degree examination - Time Table released in anna university.<br>
	Affiliated colleges UG Even Semester Examinations to start on May 23.<br>
	Laboratory Examination Marks 2016 are been notified on the central notice board.<br>
	Certification Course on Introduction to Programming for HSC Candidates - RSS.<br>
	Government of Tamil Nadu - Scholarshipt to Minority candidates.
</marquee>
</font>
</div>
<?php
session_start();
$timeout = 1200; 
if(isset($_SESSION['timeout'])) 
{
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        session_destroy();
        session_start();
    }
}
$_SESSION['timeout'] = time();
$link=mysqli_connect("localhost","root","","project");
	if($link==false)
	{
		die("ERROR:Could not connect.".mysqli_connect_error());
	}
	$sql="SELECT *FROM STUDENT_DETAIL WHERE REGISTER_NUMBER='$_POST[regno]' AND PASSWORD='$_POST[studpass]'";
	if($result=mysqli_query($link,$sql))
	{
	       if(mysqli_num_rows($result)>0)
	        {
  		echo"<h1>Profile</h1>";
		echo"<table summary='Summary Here'cellpadding='0' cellspacing='0' border='1' width='600px' height='350px'>";   
		echo"<tr class='light'>";
		echo"<th>Headings</th>";
		echo"<th>Details</th>";
		echo"</tr>";			
	       if($row=mysqli_fetch_array($result))
	       {	
		echo"<tr class='dark'>";
		echo"<td>Name</td>";
		echo"<td>".$row['NAME']."</td>";
		echo"</tr>";			

		echo"<tr class='light'>";
		echo"<td>Register No</td>";
		echo"<td>".$row['REGISTER_NUMBER']."</td>";
		echo"</tr>";			

		echo"<tr class='dark'>";
		echo"<td>Department</td>";
		echo"<td>".$row['DEPARTMENT']."</td>";
		echo"</tr>";			

		echo"<tr class='light'>";
		echo"<td>Email_ID</td>";
		echo"<td>".$row['EMAIL_ID']."</td>";
		echo"</tr>";			

		echo"<tr class='dark'>";
		echo"<td>Phone Number</td>";
		echo"<td>".$row['PHONENUMBER']."</td>";

		echo"</tr>";
		
	           }			
	echo"</table>";
	mysqli_free_result($result);
	}
	else
	{
		echo"No Records matching your register number...";
	}
}
else
{
	echo"Enter a valid register number and password";
}	  
	
	$sql1="SELECT *FROM MARK_DETAILS WHERE REGNO='$_POST[regno]'";
	if($result=mysqli_query($link,$sql1))
	{
	       if(mysqli_num_rows($result)>0)
	        {
  		echo"<h1>Recent Examination Marks...</h1>";
		echo"<table summary='Summary Here'cellpadding='0' cellspacing='0' border='1' width='600px' height='350px'>";   
		echo"<tr class='light'>";
		echo"<th>Headings</th>";
		echo"<th>Details</th>";
		echo"</tr>";			
	       if($row=mysqli_fetch_array($result))
	       {	
		echo"<tr class='dark'>";
		echo"<td>Register Number</td>";
		echo"<td>".$row['REGNO']."</td>";
		echo"</tr>";			

		echo"<tr class='light'>";
		echo"<td>TECHNICAL ENGLISH I</td>";
		echo"<td>".$row['SUB1']."</td>";
		echo"</tr>";			

		echo"<tr class='dark'>";
		echo"<td>MATHEMATICS I</td>";
		echo"<td>".$row['SUB2']."</td>";
		echo"</tr>";			

		echo"<tr class='light'>";
		echo"<td>CHEMISTRY</td>";
		echo"<td>".$row['SUB3']."</td>";
		echo"</tr>";			

		echo"<tr class='dark'>";
		echo"<td>FUNDAMENTALS OF COMPUTING</td>";
		echo"<td>".$row['SUB4']."</td>";
		echo"</tr>";
		
		echo"<tr class='light'>";
		echo"<td>PHYSICS</td>";
		echo"<td>".$row['SUB5']."</td>";
		echo"</tr>";
	
	           }			
	echo"</table>";
	mysqli_free_result($result);
	}
	else
	{
		echo"No Records matching your register number...";
	}
}
else
{
	echo"Enter a valid register number and password";
}	  
	mysqli_close($link);
?>
<p><h2>'0' or 'N/A' means not yet updated by your instructor</h2></p>
</div>
</div>
<div class="wrapper col5">
  <div id="footer">
    <div id="newsletter">
      <h2>Stay In The Know !</h2>
      <p>Please enter your email to join our mailing list</p>
      <form action="#" method="post">
        <fieldset>
          <legend>News Letter</legend>
          <input type="text" value="Enter Email Here&hellip;"  onfocus="this.value=(this.value=='Enter Email Here&hellip;')? '' : this.value ;" />
          <input type="submit" name="news_go" id="news_go" value="GO" />
        </fieldset>
      </form>
      <p>To unsubscribe please <a href="#">click here &raquo;</a></p>
    </div>
       <div class="footbox">
      <h2>Connect With Us</h2>
	with any of this following social media..
<a href="https://www.facebook.com/login"><img src="http://localhost/educational/images/demo/facebook.gif" alt="" /></a>
<a href="https://twitter.com/login"><img src="http://localhost/educational/images/demo/twitter.gif" alt="" /></a>
<a href="https://www.flickr.com/login"><img src="http://localhost/educational/images/demo/flickr.gif" alt="" /> </a>
<a href="https://www.youtube.com/channel/UCRNeXX-0F9hTpLXGRkWeJbw"><img src="http://localhost/educational/images/demo/youtube.gif" alt="" /></a>
<a href="https://www.rss.com/login"><img src="http://localhost/educational/images/demo/rss.gif" alt="" /></a>
    </div>
    <div class="footbox">
      <h2>Quick Links</h2>
      <ul>
        <li><a href="http://localhost/educational/index.html">&raquo;Home page</a></li>
        <li><a href="http://localhost/educational/pages/academic-stud.html">&raquo;Student Registration</a></li>
        <li><a href="http://localhost/educational/pages/library.html">&raquo;Library</a></li>
        <li><a href="http://localhost/educational/pages/placement.html">&raquo;Placement</a></li>
        <li class="last"><a href="http://localhost/educationalpages/contact.html">&raquo;Contact Us</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Locations of our college</h2>
      <ul>
        <li>Kaatankulathur</a></li>
        <li>Kanyakumari</a></li>
        <li>Trichy</a></li>
        <li>Vadapalani</a></li>
        <li class="last"><a href="#">Salem</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">SVA College of Engineering</a></p>
    <p class="fl_right">By webteam of SVA College</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>

