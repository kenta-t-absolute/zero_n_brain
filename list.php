<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>過去ログ</title>
</head>
<body>
  過去ログ一覧
<?php
$mysqli=new mysqli("localhost","root","root","zero_n_brain");
if($mysqli->connect_error){
  echo $mysqli->connect_error;
}else{
  $mysqli->set_charset("utf8");
};

$list = $mysqli->query("SELECT * FROM zero_n_brain");
//デバッグ
//print_r($list);
//print_r($list->fetch_all());
echo "<table border=1>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>カテゴリ</th>";
echo "<th>お題</th>";
echo "<th>日時</th>";
echo "</tr>";

foreach($list as $rows){
  echo"<tr>";
  echo "<td><a href='detail.php?action=".$rows["ID"]."'>".$rows["ID"]."</a></td>";
  echo "<td>".$rows["カテゴリ"]."</td>";
  echo "<td>".$rows["お題"]."</td>";
  echo "<td>".$rows["日時"]."</td>";
  echo "</tr>";
};
echo "</table>";

 ?>
 <a href="index.php">トップへ戻る</a>
</body>
</html>
