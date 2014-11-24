
<?php
	session_start();

?>

<html>
<head>

	<title>メンバーアプリ</title>
</head>
<body>

<h1>メンバーアプリへようこそ</h1>

<form>
	<select size="5" name ="menu">
		<option value="memberlist.php" selected>メンバー表一覧</option>
		<option value="searchmember.php">メンバー検索</option>
		<option value="insertmember.php">メンバー追加</option>
		<option value="deletemember.php">メンバー削除</option>
		<option value="keiziban.php">掲示板</option>
	</select>
	<input type="button" onClick="top.location.href=menu.value" value="選択"/>
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