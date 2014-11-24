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
	    $keijban_file = 'keiziban.txt';			//$keijiban_fileに文字列を格納

	    $fp = fopen($keijban_file, 'rb');		//rb：Read Binar （読み出し専用（バイナリモード））

	    if ($fp){								//ifの意味？
	        if (flock($fp, LOCK_SH)){			//LOCK_SH：共有ロック（読み取り許可・書き込み不可）
	            while (!feof($fp)) {			//feof：ファイルポインタがファイル終端に達しているか調査
	                $buffer = fgets($fp);		//fgets：１行読み込む
	                print($buffer);
	            }
	            flock($fp, LOCK_UN);			//LOCK_UN：ロック解除
	        }else{
	            print('ファイルロックに失敗しました');
	        }
	    }
	    fclose($fp);
	}

	function writeData(){
	    $name = $_POST['name'];
	    $contents = $_POST['contents'];
//	    $contents = nl2br($contents);			//nl2br：改行文字の前に HTML の改行タグを挿入する

	    $data ="<p>".$name."：　".$contents."</p>";

	    $keijban_file = 'keiziban.txt';

	    $fp = fopen($keijban_file, 'ab');

	    if ($fp){
	        if (flock($fp, LOCK_EX)){							//LOCK_EX：排他的ロック（読み書き不可）
	            if (fwrite($fp,  $data) === FALSE){				//fwrite：エラーならfalse
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