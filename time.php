<html>
<body>
<?php
date_default_timezone_set('Asia/Calcutta');
$current_time = date("G");
$current_min = date("i");
if($current_time=22 && $current_min<10)
	echo 'true';
?>
</body>
</html>