
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
<h2>メンバー検索</h2>
メンバーIDを入力して下さい

<form action="searchmember.php" method="post">
	<input type="text" name="id"/>
	<input type="submit" value="メンバーをID検索"/>
</form>

<?php
	try{
		if( isset($_POST["id"]) ){
			if($_POST["id"] == ""){
				throw new Exception("値を入力して下さい");
			} else {
				$link = mysql_connect('localhost', 'root', '');
				$db_selected = mysql_select_db('board', $link);

				mysql_set_charset('utf8');

				$result = mysql_query('SELECT id, user, post, tel
						FROM user WHERE id = '.$_POST["id"].'');
?>
				<table border='1'>
					<th>メンバーID</th>
					<th>メンバー名</th>
					<th>住所</th>
					<th>電話番号</th>

<?php	 		while ($row = mysql_fetch_assoc($result)) {		?>
						<tr>
						<td>
<?php 				print($row['id']);							?>
						<td>
<?php 				print($row['user']);						?>
						<td>
<?php 				print($row['post']);						?>
						<td>
<?php 				print($row['tel']);							?>
					</tr>
<?php		 	}												?>
				</table>
<?php
				$close_flag = mysql_close($link);
			}
		}

	}catch(Exception $e){
		print $e->getMessage();
	}
?>
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
</body>
</html>