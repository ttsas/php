
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
<h2>メンバー追加</h2>
登録事項を入力して下さい

<form action="insertmember.php" method="post">
	ID：<input type="text" name="id"/><br />
	名前：<input type="text" name="user"/><br />
	住所：<input type="text" name="post"/><br />
	電話番号:<input type="text" name="tel"/>
	<input type="submit" name="insert" value="メンバー追加"/>
</form>

<?php
	try{
		if( isset($_POST["insert"]) ){
			if($_POST["id"] == ""
			|| $_POST["user"] == ""
			|| $_POST["post"] == ""
			|| $_POST["tel"] == ""
			){
				throw new Exception("値を入力して下さい");
			} else {
				$link = mysql_connect('localhost', 'root', '');
				$db_selected = mysql_select_db('board', $link);

				mysql_set_charset('utf8');

				$uid 	= $_POST["id"];
				$uuser 	= $_POST["user"];
				$upost 	= $_POST["post"];
				$utel 	= $_POST["tel"];

				$result = mysql_query("INSERT INTO user
									(id, user, post, tel)
									VALUES({$uid}, '{$uuser}', '{$upost}', '{$utel}')");
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