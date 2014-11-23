<html>
<head>
<<<<<<< HEAD
	<title>メンバーアプリ</title>
</head>
<body>

=======
<title>メンバーアプリ</title>
</head>
<body>
>>>>>>> parent of 61fab19... Revert "board"
<h1>メンバーアプリへようこそ</h1>
<h2>メンバー追加</h2>
登録事項を入力して下さい
<?php
<<<<<<< HEAD
=======

>>>>>>> parent of 61fab19... Revert "board"
	$link = mysql_connect('localhost', 'root', '');
	$db_selected = mysql_select_db('board', $link);

	mysql_set_charset('utf8');
<<<<<<< HEAD
?>
	<form action="insertmember.php" method="post">
		ID：<input type="text" name="id"/><br />
		名前：<input type="text" name="user"/><br />
		住所：<input type="text" name="post"/><br />
		電話番号:<input type="text" name="tel"/>
		<input type="submit" name="insert" value="メンバー追加"/>
	</form>

<?php
=======
	?>
	<form action="insertmember.php" method="post">
	ID：<input type="text" name="id"/><br />
	名前：<input type="text" name="user"/><br />
	住所：<input type="text" name="post"/><br />
	電話番号:<input type="text" name="tel"/>
	<input type="submit" name="insert" value="送信"/>
	</form>


	<?php
>>>>>>> parent of 61fab19... Revert "board"
	if( isset($_POST["insert"]) ){
		$link = mysql_connect('localhost', 'root', '');
		$db_selected = mysql_select_db('board', $link);

		mysql_set_charset('utf8');

<<<<<<< HEAD
		$uid 	= $_POST["id"];
		$uuser 	= $_POST["user"];
		$upost 	= $_POST["post"];
		$utel 	= $_POST["tel"];

		$result = mysql_query("INSERT INTO user
							(id, user, post, tel)
							VALUES({$uid}, '{$uuser}', '{$upost}', '{$utel}')");
		$close_flag = mysql_close($link);
	}
?>

<br />

<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>

=======
		$uid = $_POST["id"];
		$uuser = $_POST["user"];
		$upost = $_POST["post"];
		$utel = $_POST["tel"];

		$result = mysql_query("INSERT INTO user (id, user, post, tel) VALUES({$uid}, '{$uuser}', '{$upost}', '{$utel}')");
		$close_flag = mysql_close($link);
	}

?>

<br />
<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>
>>>>>>> parent of 61fab19... Revert "board"
</body>
</html>