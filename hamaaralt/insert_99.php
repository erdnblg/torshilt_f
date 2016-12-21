<?php

  $pdo = new PDO('mysql:host=127.2.171.2;port=3306;dbname=php', 'admin5Qa3JH8', 'u2ZUngAU5_HP');
  $st = $pdo->prepare("INSERT INTO nine VALUES(?,?,?,?,?,?)");
  $st->execute(array($_POST['id'],$_POST['img'], $_POST['title'],$_POST['cont'],$_POST['price'],$_POST['link']));
?>
レコードを追加しました。