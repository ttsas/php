
<?php
	session_start();
	if( !isset($_SESSION["usr"]) ){
		header('location: login.php');
		exit();
	}
?>

<html>
<head>
	<title>メンバーアプリ</title>
</head>
<body>

<h1>メンバーアプリへようこそ</h1>
<h2>メンバー表一覧</h2>

		<table border='1'>
			<th>メンバーID</th>
			<th>メンバー名</th>
			<th>住所</th>
			<th>電話番号</th>
<?php
		$link = mysql_connect('localhost', 'root', '');
		$db_selected = mysql_select_db('board', $link);

		mysql_set_charset('utf8');

		$result = mysql_query('SELECT id, user, post, tel  FROM user');

		while ($row = mysql_fetch_assoc($result)) {
?>				<tr>
				<td>
<?php 		print($row['id']);				?>
				<td>
<?php 		print($row['user']);			?>
				<td>
<?php 		print($row['post']);			?>
				<td>
<?php 		print($row['tel']);				?>
				</tr>
<?php 	}									?>
		</table>
<?php	$close_flag = mysql_close($link);	?>

<br />

<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>

<?php
	if(isset($_POST["usr"])){
	   $name = $_POST["usr"];
	   $_SESSION["usr"] = $name;
	}
	if( !isset($_SESSION["usr"]) ){
	} else {
		$name = $_SESSION["usr"];
		print "Name：{$name}でログイン中<br/><br/>\n";
	}
?>

<form action="login.php" method="post">
	<input type="submit" name="logout" value="ログアウト"/>
</form>

</body>
</html>