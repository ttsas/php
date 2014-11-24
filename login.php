<?php
	session_start();
//	setcookie("count", true);
	if(isset($_POST["logout"])){
		unset( $_SESSION["usr"] );
	}
?>

<html>
<head>
	<title>ログイン</title>
</head>
<body>

<h1>ログイン</h1>

	<form action="board.php" method="post">
		名前を入力して下さい
		<input type="text" name="usr"/><br/>
		<input type="submit" value="送信"/>
 	</form>

</body>
</html>