<?php
include("conneectftest.php");
$query="select * from newsab limit 3";
$result=mysql_query($query);
echo '<div class="marquee" id="mycrawler2" >';
echo '<span  style="color:red; padding-left:30px;">VSM has ended. Wish you all Happy New Year. Do attend Technovanza on 6th, 7th and 8th Jan at VJTI</span>';
while($row=mysql_fetch_array($result))
{
extract ($row);

//echo '<span  style="padding-left:30px;">'.$row['news'].'</span>';
}
echo '</div>';

$style= <<<ht
<script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler2',
	style: {
		'width': '1050px',
		'height': '20px'
	},
	
	inc: 1, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 1,
	direction: 'left',
	neutral: 500,
	addDelay: 10,
	savedirection:'d',
	random:'false'
});
</script>
ht;
echo $style;
?>

