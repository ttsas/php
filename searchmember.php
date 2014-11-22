<html>
<head>
<title>メンバーアプリ</title>
</head>
<body>
<h1>メンバーアプリへようこそ</h1>
<h2>メンバー検索</h2>
メンバーIDを入力して下さい
<?php

	$link = mysql_connect('localhost', 'root', '');
	$db_selected = mysql_select_db('board', $link);

	mysql_set_charset('utf8');
	?>
	<form action="searchmember.php" method="post">
	<input type="text" name="id"/>
	<input type="submit" value="送信"/>
	</form>

	<?php
	if( isset($_POST["id"]) ){
		$link = mysql_connect('localhost', 'root', '');
		$db_selected = mysql_select_db('board', $link);

		mysql_set_charset('utf8');

		$result = mysql_query('SELECT id, user, post, tel  FROM user WHERE id = '.$_POST["id"].'');
		print "<table border='1'>";
		print("<th>メンバーID</th><th>メンバー名</th><th>住所</th><th>電話番号</th>");
		while ($row = mysql_fetch_assoc($result)) {
			print("<tr>");
			print("<td>");
				print($row['id']);
			print("<td>");
				print($row['user']);
			print("<td>");
				print($row['post']);
			print("<td>");
				print($row['tel']);
			print("</tr>");
		}
		print"</table>";

		$close_flag = mysql_close($link);
	}

?>

<br />
<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>
</body>
</html>