
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
<h2>メンバー削除</h2>
削除したいメンバーIDを入力して下さい

<form action="deletemember.php" method="post">
	<input type="text" name="id"/><br />
	<input type="submit" name="delete" value="メンバー削除"/>
</form>

<?php
	try{
		if( isset($_POST["delete"]) ){
			if($_POST["delete"] == ""){
				throw new Exception("値を入力して下さい");
			} else {
				$link = mysql_connect('localhost', 'root', '');
				$db_selected = mysql_select_db('board', $link);

				mysql_set_charset('utf8');

				$uid = $_POST["id"];

				$result = mysql_query("DELETE FROM user WHERE id = {$uid}");

				$close_flag = mysql_close($link);
			}
		}
	}catch(Exception $e){
		$e->getMessage();
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