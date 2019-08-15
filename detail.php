<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>過去ログ</title>
  <style>
    .title{
      font-size: 30px;
    }

  </style>
</head>
<body>
  <a class="title">詳細</a>
<?php
$mysqli=new mysqli("localhost","root","root","zero_n_brain");
if($mysqli->connect_error){
  echo $mysqli->connect_error;
}else{
  $mysqli->set_charset("utf8");
};

$get = $_GET["action"];
//デバッグ
//echo $get;
$detail = $mysqli->query("SELECT ID,カテゴリ,お題,本文,日時 FROM zero_n_brain WHERE ID ='$get'");

$details = $detail->fetch_all();

//デバッグ
//echo $details;

$id = $details[0][0];
$day = $details[0][4];
$category = $details[0][1];
$odai = $details[0][2];
$textarea = $details[0][3];

echo "<br><br>";
echo "▼ID<br>";
echo $id,"<br><br>";
echo "▼日時<br>";
echo $day,"<br><br>";
echo "▼カテゴリ<br>";
echo $category,"<br><br>";
echo "▼お題<br>";
echo $odai,"<br><br>";
echo "▼本文<br>";
echo $textarea,"<br>";

$mysqli->close();
 ?>
<br>
<a href="list.php">一覧へ戻る</a>
<br>
 <a href="index.php">トップへ戻る</a>
</body>
</html>
