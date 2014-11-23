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
<h2>メンバー削除</h2>
削除したいメンバーIDを入力して下さい
<form action="deletemember.php" method="post">
	<input type="text" name="id"/><br />
<<<<<<< HEAD
	<input type="submit" name="delete" value="メンバー削除"/>
</form>

=======
	<input type="submit" name="delete" value="送信"/>
</form>
>>>>>>> parent of 61fab19... Revert "board"
<?php
	if( isset($_POST["delete"]) ){
		$link = mysql_connect('localhost', 'root', '');
		$db_selected = mysql_select_db('board', $link);

		mysql_set_charset('utf8');

		$uid = $_POST["id"];

		$result = mysql_query("DELETE FROM user WHERE id = {$uid}");

		$close_flag = mysql_close($link);
	}
<<<<<<< HEAD
?>
<br />

<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>

=======

?>
<br />
<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>
>>>>>>> parent of 61fab19... Revert "board"
</body>
</html>