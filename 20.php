<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <title>20元封顶商品大全</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="keywords" content="20元封顶,内部优惠券,白菜价,折扣,优惠"/>
    <meta name="description" content="想找优惠券找不到？来这里吧！本站为大家挖掘天猫淘宝优质商品的内部优惠券，一分钱也要帮您省下来。"/>
    <link href="http://fontiz.com/" rel="canonical"/>
    <link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/ico" href="img/favicon.ico"/>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?a27dae7c51c538f8305b03f88c53c98a";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
  </head>

  <body>
    <?php
    include 'hamaaralt/nav1.php';
    ?>

    <div class="container">
      <div class="row">
      	<div class="col-sm-9  main">
          <?php
          include 'hamaaralt/nav2.php'; 
          ?> 

          <?php
            include 'pagination/indexedlinks.php';
            include 'pagination/printlink.php';

            include 'hamaaralt/conn.php';

            $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 1;
            if (! $offset) { $offset = 1; }
            $per_page = 8;
            $total = $db->query('SELECT COUNT(*) FROM twenty')->fetchColumn(0);

            $limitedSQL = 'SELECT * FROM twenty ORDER BY id DESC ' .
              "LIMIT $per_page OFFSET " . ($offset-1);
            $lastRowNumber = $offset - 1;

            foreach ($db->query($limitedSQL) as $row) {
            $lastRowNumber++;
            echo '<div class="post-item row">';
              echo '<div class="col-sm-3 item-img">';
                  echo '<img class="img-responsive" src="'.$row['img'].'" alt="'.$row['title'].'">';
              echo '</div>';
              echo '<div class="col-sm-6 item-body">';
              	  echo '<h4>'.$row['title'].'</h4>';
              	  echo '<p>'.$row['cont'].'</p>';
              echo '</div>';
              echo '<div class="col-sm-3 item-buy">';
                  echo '<div class="row">';
                      echo '<div class="price col-xs-6 col-md-12">';
                          echo '<span class="price-icon"><i class="fa fa-jpy" aria-hidden="true"></i></span>';
                          echo '<span class="price-num">'.$row['price'].'</span>';
                      echo '</div>';
                      echo '<div class="buy col-xs-6 col-md-12">';
                          echo '<a href="'.$row['link'].'" class="btn btn-danger btn-lg role="button" target="_blank">领券</a>';
                      echo '</div>';
                  echo '</div>';
              echo '</div>';
            echo '</div>';}
            echo '<div class="pgn row">';
            indexed_links($total,$offset,$per_page);
            print "<br/>";
            // print "(Displaying $offset - $lastRowNumber of $total)";   
            echo '</div>';  
          ?>
        </div>

        
      	<?php
        include 'hamaaralt/zahiin.php';
        ?>
      </div>
    </div>
    <?php
    include 'hamaaralt/footer.php';
    ?>
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </body>
</html>
