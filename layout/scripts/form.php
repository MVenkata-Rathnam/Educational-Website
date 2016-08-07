<!DOCTYPE html>
<html>
<head>
<title>SVA - Student Registration</title>
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
      <li class="current"><a href="#">Student Registration</a></li>
	</ul>
  </div>
</div>
<div class="wrapper col4">
<div id="container">
<?php
	/*create table student_details(name varchar(50),DOB varchar(20),age int,sex varchar(10),
	  department varchar(20),address varchar(150),email_id varchar(20),phonenumber 
	  varchar(15),register_number varchar(20),password varchar(20));*/
	$link=mysqli_connect("localhost","root","","project");
	if($link==false)
	{
		die("ERROR:Could not connect.".mysqli_connect_error());
	}
	$sql="insert into STUDENT_DETAIL 
	            VALUES('$_POST[name]','$_POST[dob]','$_POST[age]','$_POST[gender]','$_POST[dep]',
	       '$_POST[address]','$_POST[email]','$_POST[pnum]','$_POST[rno]','$_POST[password]')";
	if(mysqli_query($link,$sql))
	{
		echo"<br>";
		echo "<h3>You have successfully registered! <h3><br>";
		echo"<h3>Login into your account to view the details of your profile, internal marks, semester marks and the latest news<h3>";
                    }
	else
	{
		echo"<br>";
		echo "ERROR:Unable to retrieve".mysqli_error($link);
	}
	$sql1="SELECT COUNT(*) FROM STUDENT_DETAIL";
	if($result=mysqli_query($link,$sql1))
	{
	       if(mysqli_num_rows($result)>0)
	        {
  		       if($row=mysqli_fetch_array($result))
	       	   {	
		               echo"<h2>Count of students registered&raquo;".$row['COUNT(*)']."</h2>";
		   }
	      mysqli_free_result($result);
	       }
	      else
	       {
		echo"<h2>Count is Zero<h2>";
	        }
	}
	else
	{
		echo"Unable to retrieve data ....";
	}
	mysqli_close($link);
?>
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


