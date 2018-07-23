<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script type ="text/javascript" > 
       
 
    $(document).ready(
 function ()
      {      
        refreshTable (); 
     //   refreshScroll();  This is for news
        
      }
      );
         
/*
This is for news
  function refreshScroll()
    {
     $('#js-news').load('scroll.php');
      setTimeout(refreshScroll, 50000 );
      $('#js-news').ticker();
   }
   */
    function refreshTable ()
    {  $('#tableHolder').load('myfirstpage.php');
     // $('#tableHolder1').load('userpage.php');  
        $('#leaderboard').load('myleaderboard.php');  
       setTimeout(refreshTable, 5000 );   
   } 
   
          
  </script>
	<title>VSM</title>
</head>
<?php
ob_start();
session_start();
echo "WLCOME USER ".$_SESSION['id'];
?>
<body>
<div class="domtab">
            <ul class="domtabs" style="margin-left:50px">
            <li><a href="#buy">To Buy</a>

            </li>

                <li><a href="#sell">To Sell</a></li>
                 <li><a href="#lb">LeaderBoard</a></li>
                
        	</ul>
</div>

</br>
</br>
</br>

<div id="discription">
        
    <h2><a name="t1" id="buy">To Buy</a></h2>
    </br>

    <div id ="tableHolder">
        <?php include "myfirstpage.php"; ?>
    </div>

    <div id="userbuy">
    	<?php include "mybuystock.php"; ?>
    </div>
</div>


</br>
</br>
</br>

<div id="discription">
                
    <h2><a name="t1" id="sell">To Sell</a></h2></br></br>
    <div id ="mysell" ></div>
       <?php include "mysell1.php"; ?>         
    </div>
</div>

</br>
</br>
</br>

<div id="discription">
                
    <h2><a name="t1" id="lb">LeaderBoard</a></h2></br></br>
    <div id ="leaderboard" ></div>
       <?php include "myleaderboard.php"; ?>         
    </div>
</div>


</body>