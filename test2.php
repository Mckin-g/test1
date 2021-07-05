<?php

if( !empty($_POST['btn_submit']) ) {
	var_dump($_POST);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>空き室登録</title>
</head>
<body>
<?php
//データベースへの接続変数
$host='mysql152.phy.lolipop.lan';
$username='LAA1322289';
$pass='11111';
$dbname='LAA1322289-vacantroom';
$con = mysqli_connect($host, $username,$pass,$dbname);
if (!$con) {
  die('データベースに接続できませんでした。');
}

$result = mysqli_select_db( $con,$dbname);
if (!$result) {
  die('データベースを選択できませんでした。');
}

$result = mysqli_query( $con,'SET NAMES utf8');
if (!$result) {
  die('文字コードを指定できませんでした。');
}
//受け取り
$postdate=$_POST["date"];
$poststok=$_POST["stock"];

// INSERT
$sql = "INSERT INTO vacant_room_DB(date,stock) VALUES ('$postdate',$poststok)";

$result = mysqli_query( $con, $sql);
if (!$result) {
  die('データを登録できませんでした。');
}

$con = mysqli_close($con);
if (!$con) {
  die('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="test1.php">戻る</a></p>
</body>
</html>