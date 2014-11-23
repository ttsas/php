<html>
<head>
	<title>PHP TEST</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<form action="board.php" method="post">
	<input type="submit" value="メニューへ戻る"/>
</form>
<h1>掲示板</h1>

<form method="POST" action="keiziban.php">
	<input type="text" name="name"><br>
	<br>
	<textarea name="contents" rows="8" cols="40"></textarea><br>
	<br>
	<input type="submit" name="btn1" value="投稿する">
</form>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    writeData();
	}
	readData();

	function readData(){
	    $keijban_file = 'keiziban.txt';

	    $fp = fopen($keijban_file, 'rb');

	    if ($fp){
	        if (flock($fp, LOCK_SH)){
	            while (!feof($fp)) {
	                $buffer = fgets($fp);
	                print($buffer);
	            }
	            flock($fp, LOCK_UN);
	        }else{
	            print('ファイルロックに失敗しました');
	        }
	    }

	    fclose($fp);
	}

	function writeData(){
	    $name = $_POST['name'];
	    $contents = $_POST['contents'];
	    $contents = nl2br($contents);

	    $data ="<p>".$name."：　".$contents."</p>";

	    $keijban_file = 'keiziban.txt';

	    $fp = fopen($keijban_file, 'ab');

	    if ($fp){
	        if (flock($fp, LOCK_EX)){
	            if (fwrite($fp,  $data) === FALSE){
	                print('ファイル書き込みに失敗しました');
	            }
	            flock($fp, LOCK_UN);
	        }else{
	            print('ファイルロックに失敗しました');
	        }
	    }
	    fclose($fp);
	}
?>


</body>
</html>