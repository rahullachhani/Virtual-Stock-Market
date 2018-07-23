<!--Isme abi upar session start nai kia gaya hai and authentication b nai kia gaya hai -->
<?php
/*
if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $db=mysql_connect("localhost","root","") or die("Couldn't connect to server!");
      $qr=mysql_select_db("techno_test",$db) or die("Couldn't select database!"); 
      $q="select * from company where script='".$_POST['script']."'";
      $result=mysql_query($q,$db);
      $row=mysql_fetch_assoc($result) or die(mysql_error($db));
      $val=$row['presentcost'];


      $query="insert into userdet values(1, 
                   '".$_POST['script']."',
                    ".$_POST['qty'].",
                    ".$val.",
                    now())";
//upar 1st place pe values(".$userid") aayega
      if(isset($query))
      {
      mysql_query($query,$db)or die("<script>alert('Not Enough Balance or Not enough shares in market');parent.window.location.reload(true);</script>");
      }

  }


?>
*/
?>
<head>
    <script type="text/javascript">
     var q=/^\d*[0-9](\d*[0-9])?$/;
     function validate(form){
      var qt = form.qty.value;
      if (!q.test(qt)) {
        alert("Enter a valid Number");
         return false;
       }
        return true;
     }
    </script>
</head>

<body>
  <table border="0">
  <form action="mybought.php" method="POST" name="buy" onSubmit="return validate(this);" >
  <?php
      $db=mysql_connect("localhost","root","") or die("Couldn't connect to server!");
      $qr=mysql_select_db("techno_test",$db) or die("Couldn't select database!");
      $qry="select balance from ubal where userid=".$_SESSION['id']; //".$userid
      $re=mysql_query($qry,$db);
      $amtShare=mysql_result($re,0,"balance");
    ?>
    <tr>Balance is:<?php echo $amtShare; ?> </tr>
  <tr>
  <td>Select a Script:</td>
  <td>
  <select name="script">
  <?php
  $query="SELECT script FROM company";
  $result=mysql_query($query,$db);
  while($row=mysql_fetch_assoc($result))
  {
  echo "<option value=".$row['script'].">".$row['script']."</option>";
  }
  ?>
  </select>
  </td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>Quantity to be purchased:</td>
  <td><input type="text" name="qty"></td>
  <td><input type="submit"  value="BUY"></td>
  </tr>
  </form>
  </table>
  </body>