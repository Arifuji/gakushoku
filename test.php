<html>
<head><title>PHP TEST</title></head>
<body>

<?php
$conn = "host=localhost dbname=team2db user=team2 password=1qazxsw2 port=5432";
$link = pg_connect($conn);
if (!$link) {
  die('接続失敗です。'.pg_last_error());
}

$date = htmlspecialchars($_GET['date']);
  echo "{$date}";

if(isset($_POST['bt1'])){
  /*
  $result = pg_query('SELECT name, price, carolie FROM products');
  if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
  }
  for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
    $rows = pg_fetch_array($result, NULL, PGSQL_ASSOC);
    print('商品名='.$rows['name']);
    print('価格='.$rows['price']);
    print('カロリー='.$rows['carolie'].'<br>');
  }
  */


  $result2 = pg_query("SELECT * FROM day_pro LEFT JOIN products on day_pro.product_no = products.product_no where day_pro.day = '{$date}'");
  if(!$result2){
    die('クエリーが失敗しました'.pg_last_error());
  }
  for($i = 0; $i < pg_num_rows($result2); $i++){
    $rows2 = pg_fetch_array($result2, NULL, PGSQL_ASSOC);

      print('日付='.$rows2['day']);
      print('商品＝'. $rows2['name']);
      print('値段='. $rows2['price']);
      print('カロリー='. $rows2['carolie'].'<br>');
  }
}

?>

<form action="ranking.php">
<input type="submit" value="次画面へ遷移">
</form>

<form method="post">
<button type="submit" name="bt1" value="2017-06-21">21日のメニュー</button>
</form>

<form method="get">
  <select name="date" size="1">
  <option value = "2017-06-01 00:00:00">1</option>
  <option value = "2017-06-02 00:00:00">2</option>
  <option value = "2017-06-03 00:00:00">3</option>
  <option value = "2017-06-04 00:00:00">4</option>
  <option value = "2017-06-05 00:00:00">5</option>
  <option value = "2017-06-06 00:00:00">6</option>
  <option value = "2017-06-07 00:00:00">7</option>
  <option value = "2017-06-08 00:00:00">8</option>
  <option value = "2017-06-09 00:00:00">9</option>
  <option value = "2017-06-10 00:00:00">10</option>
  <option value = "2017-06-11 00:00:00">11</option>
  <option value = "2017-06-12 00:00:00">12</option>
  <option value = "2017-06-13 00:00:00">13</option>
  <option value = "2017-06-14 00:00:00">14</option>
  <option value = "2017-06-15 00:00:00">15</option>
  <option value = "2017-06-16 00:00:00">16</option>
  <option value = "2017-06-17 00:00:00">17</option>
  <option value = "2017-06-18 00:00:00">18</option>
  <option value = "2017-06-19 00:00:00">19</option>
  <option value = "2017-06-20 00:00:00">20</option>
  <option value = "2017-06-21 00:00:00">21</option>
  <option value = "2017-06-22 00:00:00">22</option>
  <option value = "2017-06-23 00:00:00">23</option>
  <option value = "2017-06-24 00:00:00">24</option>
  <option value = "2017-06-25 00:00:00">25</option>
  <option value = "2017-06-26 00:00:00">26</option>
  <option value = "2017-06-27 00:00:00">27</option>
  <option value = "2017-06-28 00:00:00">28</option>
  <option value = "2017-06-29 00:00:00">29</option>
  <option value = "2017-06-30 00:00:00">30</option>

  </select>
  <input type="submit" value="送信">
</form>

</body>
</html>
