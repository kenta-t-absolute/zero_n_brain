<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>入力内容確認</title>
</head>
<body>
  入力内容確認
<br>
  以下内容を保存しますか？
<br>
<br>
<?php
session_start();
$check_odai=$_POST["odai"];
$rand =rand(0,2);
$category =[
  "芸能"=>["ジャニーズについて","ロックについて","ドラマについて"],
  "政治"=>["国内","海外","経済"],
  "スポーツ"=>["サッカー","野球","ゴルフ"]
];

$return =$category[$check_odai][$rand];
$_SESSION["check_odai"]=$check_odai;
$_SESSION["odai"]=$return;
//echo $check_odai;
//echo $return;

$check_odai2 = $_SESSION["check_odai2"];
$return_odai2 = $_SESSION["return_odai2"];

if($_GET["action"]=="odai"){
  header("Location:index.php?action=kettei");
  exit;
}elseif($_GET["action"]=="check"){
  echo "▼カテゴリ<br>";
  echo $check_odai2,"<br><br>";
  echo "▼お題<br>";
  echo $return_odai2,"<br><br>";
  echo "▼本文<br>";
  echo $_POST["textarea"],"<br>";
};

//予備
// $check_odai2 = $_SESSION["check_odai2"];
// $return_odai2 = $_SESSION["return_odai2"];

//デバッグ
//echo $check_odai2 ;
//echo $return_odai2;
$_SESSION["textarea"]=$_POST["textarea"];

 ?>

<br>
<a href="thanks.php">はい</a>
<br>
<a href="index.php">リセットして戻る</a>

</body>
</html>
