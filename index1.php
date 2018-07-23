<?ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Technovanza 2013: VJTI presents India's largest technomanagement festival"/>
<meta name="Keywords" content="tech, lecture, vjti, bombay, technology, conference, events, exhibition, science, fest, technical, matunga, pratigya, robotics, mumbai, coding" />

<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen" />

<!-- header-->
<link href="../css/title.css" rel="stylesheet" type="text/css" />

<!-- menubar -->
<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>  
<link type="text/css" href="../css/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/menu.js"></script>  
    

<!--event info-->
<link rel="stylesheet" media="all" type="text/css" href="../css/pro_left_right.css" />
<link rel="stylesheet" type="text/css" href="../css/domtab.css"/>
<script type="text/javascript" src="../js/domtab.js"></script>

<!--footer-->
<link href="../css/footer.css" rel="stylesheet" type="text/css" media="screen"/>
 
<link href="../css/contactus.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34320276-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>


<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="crawler.js"></script>
  <script type ="text/javascript" > 
        
    $(document).ready(
      function ()
      {      
        refreshTable (); 
        refreshScroll();  
        
      }
      );
         

  function refreshScroll()
    {
     $('#js-news').load('scroll.php');
      setTimeout(refreshScroll, 50000 );
      $('#js-news').ticker();
   }
    function refreshTable ()
    {  $('#tableHolder').load('firstpage.php');
      $('#tableHolder1').load('userpage.php');  
          
       setTimeout(refreshTable, 5000 );   
   } 
   
  
   
        
  </script>
  
<style> 
#pic img
{
  width: 8px;
  height:10px;
}
</style>
<title>VSM</title>
</head>

<?php
session_start();
if (ISSET ($_SESSION['username']))
{?>
<body>

<div id="wrapper" align="center">
<?php include"../headers/headerolevents.php"; ?>
  <div class="container" style="max-height:auto; background-image: url(../images/b2.jpg);" align="center">
        

<div id="content">     
          <p id="eventname" align="center">VSM</p> 
           
<div id="js-news" style="padding-left:80px;">
          <?php include "scroll.php" ?>
  </div>
  

        <div class="domtab">
            <ul class="domtabs" style="margin-left:50px">
            <li><a href="#buy">To Buy</a>

            </li>

                <li><a href="#sell">To Sell</a></li>
                
        </ul>
    
<!--<div id ="tableHolder" ></div>-->
</br>
</br>
</br>

<div id="discription">
        
                <h2><a name="t1" id="buy">To Buy</a></h2>
              </br>
              <div id ="tableHolder"  >

              </div>



<!-- <?php //include "buystock.php"; ?>-->

          <iframe src="buystock.php" width="800" height="100" frameborder="0"></iframe>
            <!-- Please ignore this. <p><a href="#top">back to menu</a></p> -->
            </div>

            <div id="discription">
                
                <h2><a name="t1" id="sell">To Sell</a></h2></br></br>
                <div id ="tableHolder1" ></div>
                <!-- <?php// include "sellstock.php"; ?>-->
      <iframe src="sellstock.php" width="800" height="100" frameborder="0" ></iframe>
                
              
            <!-- Please ignore this. <p><a href="#top">back to menu</a></p> -->
            </div>

</div>

</div>
</center>
<div class="clear"></div>
<br/><br/>
</div>
<!--footer-->    
<?php include "../footer/footer1.php"; ?>

</div>

</body>
<?php
}
else
{	
	header("location: ../loginform.php");
}
?>
</html>
<?ob_flush();?>