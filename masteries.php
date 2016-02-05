<!DOCTYPE html>
<html>
<head>
	<title>Lol API Masteries</title>
</head>
<body>

<?php 
	$get = file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/mastery?masteryListData=all&api_key=a89db288-694c-41e6-8d68-057c444c1d53");
	$return = json_decode($get, true);
	$list = $return['data'];
	//print $return['data']['6121']['image']['full'];	

	foreach($list as $mastery)
	{
		print "<img src='http://ddragon.leagueoflegends.com/cdn/6.2.1/img/mastery/".$mastery['image']['full']."'>";
		print "<img style='-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-o-filter: grayscale(100%);-ms-filter: grayscale(100%);filter: grayscale(100%);' src='http://ddragon.leagueoflegends.com/cdn/6.2.1/img/mastery/".$mastery['image']['full']."'>"; 
	}

	var_dump($list);
?>

</body>
</html>