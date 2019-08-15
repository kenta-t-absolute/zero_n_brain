<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ゼロ秒思考</title>
  <style type="text/css">
  .title{
    font-size:20px;
    color:red;
  }

  .main_title{
    font-size:30px;
  }

  .textarea{
    font-size: 20px;
  }
  </style>
  </title>

<!-- タイマースクリプト -->
<script type="text/javascript">
myCnt = 0;
myTim = 0;

function myGo(){
  mySelect = document.myForm.myMenu.selectedIndex;
  myCnt = eval ( document.myForm.myMenu.options[mySelect].value );
  myTim = setInterval ( "myTimer()", 1000 );
}

function myTimer(){
  myCnt = myCnt - 1;
  document.getElementById( "countdown" ).innerHTML = "あと " + myCnt + " 秒";
  if ( myCnt == 0 ){
    clearInterval( myTim );
    alert( "終了" );
  }
}
</script>
<!-- タイマースクリプト ここまで -->
</head>
<body>
  <h1 class="title">ゼロ秒思考〜思考整理のトレーニング〜</h1>

<?php
session_start();
//check.phpからリダイレクトして返ってきたお題
$return_odai =$_SESSION["odai"];
$check_odai =$_SESSION["check_odai"];
$_SESSION["check_odai2"] = $check_odai;
$_SESSION["return_odai2"] = $return_odai;

$category =array(
  "芸能",
  "政治",
  "スポーツ"
);

$count =count($category);
 ?>

<form action="check.php?action=odai" method="post">
<select name="odai">
<?php
for($i =0; $i<$count; $i++){
  echo "<option>",$category[$i],"</option>";
};
 ?>
</select>
<input type="submit" value="決定">
</form>
<a class="order">
  以下のお題に従って5分間、<a class="main_title">ひたすら思いつくままに </a>論じなさい。
</a>
<br>
<a class="main_title">お題：</a>
<!-- check.phpからリダイレクトして返ってきたお題を表示 -->
<?php if($_GET["action"]=="kettei") :?>
<a class="main_title">
<?php echo "【",$check_odai,"】",$return_odai; ?>
<?php endif; ?>
</a>
<br>

<form name="myForm">
<!-- <div align="center"> -->
<select name="myMenu">
<option value="180">時間を選んでください </option>
<option value="300">５分 </option>
<option value="180">３分 </option>
<option value="60">１分 </option>
</select> <input type="button" value="GO!" onclick="myGo()"><BR><BR>
<SPAN ID="countdown">時間を選んで GO!</SPAN><BR><BR>
<!-- </div> -->
</form>

<form action="check.php?action=check" method="post">
<textarea class="textarea" name="textarea" cols="100" rows="15" style="overflow:auto"></textarea>
<br>
<input type="submit" value="送信">
</form>

<a href="list.php">過去ログ</a>
</body>
</html>
