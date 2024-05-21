<?php
   require_once 'functions.php';

   session_start();

   require_once 'above_nav_content.php';

  if(isset($_GET['cat'])){
    $clickedCatalogue = $_GET['cat'];

    $_SESSION['browsed_catalogue'] = $clickedCatalogue;

    echo <<<_END
    <section class='container'>
        <div class="section-header">
            <h3 class="cat-heading">$clickedCatalogue</h3>
        </div>
        <div class='clearfix'>
    _END;

    $catalogueTable = $clickedCatalogue;

    function individualQuery($catalogueTable){
      $query = "SELECT i.prod_id, p.prod_img, p.prod_name, p.price
                FROM product p
                JOIN $catalogueTable i ON p.prod_id = i.prod_id;";
      return $query;
    }
    
    $query = individualQuery($catalogueTable);
    $result = queryMysql($query);

    while ($row = $result->fetch())
    {
      $cat_prod_id = $row['prod_id'];
      $cat_prod_img = $row['prod_img'];
      $cat_prod_name = $row['prod_name'];
      $cat_price = $row['price'];
      echo <<<_END
      <a href="projectProductPHPForm.php?prod_id=$cat_prod_id">
        <div class='card'>
            <img src="Images/img/$cat_prod_img" alt="" class="thumbnail">
            <p class="prod-name card-detail"><strong>$cat_prod_name</strong></p>
            <p class="price card-detail"><strong>R$cat_price</strong></p>
        </div>
      </a>
      _END;
    }
  
    echo <<<_END
    </div>
    </section>

    <footer>
        <div class='end'>
            
        </div>
    </footer>
    </body>
    </html>
    _END;
  }

?>


  