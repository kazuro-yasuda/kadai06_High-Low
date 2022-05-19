<?php

$number = mt_rand(1, 9);
$result = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $choice = '';
  if(isset($_POST['choice']) === true){ //変数がセットされているかを調べる。null以外。
    $choice = $_POST['choice'];
  }

  $previous = '';
  if(isset($_POST['previous']) === true){
    $previous = $_POST['previous'];
  }

  if($previous < $number){
    $answer = 'High';
  } else if ( $previous > $number ){
    $answer = 'Low';
  } else {
    $answer = 'Draw';
  }

  if($answer === 'Draw'){
    $result = 'Draw';
  } else if ($answer === $choice){
    $result = 'Win!';
  } else {
    $result = 'Lose...';
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>High&Lowゲーム</title>
</head>
<body>
  <h1>High&Lowゲーム</h1>
  <?php if($_SERVER['REQUEST_METHOD'] === 'POST'){ ?>
    <p>対象の数値: <?php echo $previous; ?></p>
    <p>選択: <?php echo $choice; ?></p>
    <p>出た数字: <?php echo  $number; ?></p>
    <p>判定: <?php echo $answer; ?></p>
    <br>
    <p>今回の勝負は<?php echo $result; ?></p>
    <br>
    <p><a href="High&Low.php">次の勝負へ</a></p>
  <?php } else { ?>



    <p>現在の数値: <?php echo $number; ?></p>

    <!-- method="post"でフォームを作成 -->
    <form method="post">
      <div>
        <label>High: <input type="radio" name="choice" value="High" required></label> 
        <label>Low: <input type="radio" name="choice" value="Low" required></label>
      </div>
      <br>
      <!-- 現在の数値を送信 -->
      <input type="hidden" name="previous" value="<?php echo $number; ?>">
      <input type="submit" value="いざ！勝負！！">
    </form>
  <?php } ?>
</body>
</html>
