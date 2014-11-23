<html>
<head>
<<<<<<< HEAD
	<title>メンバーアプリ</title>
</head>
<body>

<h1>メンバーアプリへようこそ</h1>
<h2>メンバー表一覧</h2>
<?php
=======
<title>メンバーアプリ</title>
</head>
<body>
<h1>メンバーアプリへようこそ</h1>
<h2>メンバー表一覧</h2>
<?php

>>>>>>> parent of 61fab19... Revert "board"
	$link = mysql_connect('localhost', 'root', '');
	$db_selected = mysql_select_db('board', $link);

	mysql_set_charset('utf8');

	$result = mysql_query('SELECT id, user, post, tel  FROM user');
<<<<<<< HEAD
?>
	<table border='1'>
		<th>メンバーID</th><th>メンバー名</th><th>住所</th><th>電話番号</th>

<?php 	while ($row = mysql_fetch_assoc($result)) {		?>
		<tr>
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

=======
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
>>>>>>> parent of 61fab19... Revert "board"
</body>
</html>