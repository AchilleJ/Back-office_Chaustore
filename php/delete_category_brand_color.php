<?php require_once('connectDB.php'); ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../style/style.css">
  </head>
  <body>
    <?php
      $choix = $_POST["choix"];
      $choix = strtolower($choix)  // mettre en minuscule, car le nom de la table est en minuscule
    ?>
    <h1>Delete <?php echo $choix ?></h1>
    <h2 class="h2_product">Select a <?php echo $choix ?> you want to delete:</h2> 
    <?php 
        if (isset($_POST["$choix"]) && (isset($_POST["confirmation"]) && ($_POST["confirmation"]) == "yes")) {
            $name = $_POST["$choix"];
            $del_stock="DELETE
                        from stock
                        where stock.product_id
                        in (select product.id from product where product.{$choix}_id in (select id from $choix where name = '$name'))";

            $del_product="DELETE
                          from product
                          where product.{$choix}_id
                          in (select id from $choix where name = '$name')";

            $del_color="DELETE
                        from $choix
                        where name = '$name'";

            mysqli_query($conn,$del_stock) or die ("<p>1<p>" .mysqli_error($conn));
            mysqli_query($conn,$del_product) or die ("<p>2<p>" .mysqli_error($conn));
            mysqli_query($conn,$del_color) or die ( "<p>3<p>" .mysqli_error($conn));
            ?><p class="correct">Successful deletion</p><?php
        }
        if (isset($_POST["$choix"]) && !isset($_POST["confirmation"])) {
          ?><p class="error">Error, you must check "yes"</p><?php
        }
        ?>

        <div class="select">
          <select name="<?php echo $choix ?>" form="delete_category_brand_color">
            <?php
              $sql = "SELECT name from $choix";
                  $req = mysqli_query($conn,$sql); 
                  while($row = mysqli_fetch_array($req)){   
                    echo '<option value="'.$row[0].'">'.$row[0].'</option>';     
                  }
                  mysqli_free_result ($req); 
              ?>
          </select>
        </div>

        <form method="post" action="" id="delete_category_brand_color">
          <div>
            <label>Are you sure ?</label>
            <input type="checkbox" name="confirmation" value="yes"> Yes </input>
          </div>

          <input type="submit" name="ok" value="Delete">

          <input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST -->
        </form>
        <a href="../index.php">Retour</a>
      </body>
    </html>