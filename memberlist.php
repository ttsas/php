<html>
<head>
<title>メンバーアプリ</title>
</head>
<body>
<h1>メンバーアプリへようこそ</h1>
<h2>メンバー表一覧</h2>
<?php

	$link = mysql_connect('localhost', 'root', '');
	$db_selected = mysql_select_db('board', $link);

	mysql_set_charset('utf8');

	$result = mysql_query('SELECT id, user, post, tel  FROM user');
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

?>
<br />
<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>
</body>
</html>