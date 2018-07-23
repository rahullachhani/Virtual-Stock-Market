<html>
<head>
	<title>login</title>
	<script>
	function validateForm()
{
var x=document.forms["form"]["userid"].value;
var y=document.forms["form"]["password"].value;
if (x==null || x=="")
  {
  alert("Username must be filled out");
  return false;
  }
  else if (y==null || y=="")
  {
  alert("Password must be filled out");
  return false;
  }
  
}

	</script>
</head>
<body>


<form name='form' action='mycheck.php' onsubmit="return validateForm()" method="post">
userid
&nbsp
<input type=text name='userid'  >
password
&nbsp
<input type=password name='password'>
<input type=submit value='login'>
</form>

<form action='myregister.php'>
<input type=submit value='signup'>
</form>


</body>
</html>
