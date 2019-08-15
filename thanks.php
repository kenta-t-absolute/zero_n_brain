<?php
session_start();
$check_odai=$_SESSION["check_odai2"];
$return=$_SESSION["return_odai2"];
$textarea=$_SESSION["textarea"];

$mysqli = new mysqli("localhost","root","root","zero_n_brain");
if($mysqli->connect_error){
  echo $mysqli->connect_error;
}else{
  $mysqli->set_charset("utf8");
};

$mysqli->query("INSERT INTO zero_n_brain(カテゴリ,お題,本文) values ('$check_odai','$return','$textarea')");

$mysqli->close();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>保存完了</title>
  <style type="text/css">
  .title{
    font-size: 20px;
    color:red;
  }

  .main_title{
    font-size: 30px;
  }

  .textarea{
    font-size: 20px;
  }
  </style>
  </title>
</head>
<body>
  <h1 class="title">保存完了しました</h1>
  <br>
  <a href="index.php">トップへ戻る</a>
</body>
</html>
