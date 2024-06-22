<?php

  require_once 'src/functions.php';
  require_once 'src/login.php';
  require_once 'src/header.php';
  $catItemCount = 0;

  if(isset($_GET['cat']))
  {
    $clickedCatalogue = $_GET['cat'];
  }

  if(isset($_SESSION['catelog_count']))
  {
    $catelog_count = $_SESSION['catelog_count'];
  }

  echo <<<_END
    <main>
    
    <section class="section-catelogue">

      <div class="catelog-utility-box">

        <p class="catelog-counter">$catelog_count items found</p>
        
        <form method="post" action="catalog.php?cat=$clickedCatalogue" id="form-cat-order">
          <select name="sort" id="sort-options" onchange="document.getElementById('form-cat-order').submit()">
            <option value="prod_name ASC">A - Z</option>
            <option value="prod_name DESC">Z - A</option>
            <option value="price ASC">Price Low to High</option>
            <option value="price DESC">Price High to Low</option>
          </select>
        </form>
      </div>
      
      <div class="catelog-list">
  _END;

  if(isset($_GET['cat']))
  {
    $clickedCatalogue = $_GET['cat'];
    
    if(isset($_POST['sort']))
    {
      $orderOption = $_POST['sort'];
      $catalogQuery = "SELECT i.prod_id, p.prod_img, p.prod_name, p.price
                      FROM product p
                      JOIN $clickedCatalogue i 
                      ON p.prod_id = i.prod_id
                      ORDER BY $orderOption;";
    }
    else
    {
      $catalogQuery = "SELECT i.prod_id, p.prod_img, p.prod_name, p.price
                      FROM product p
                      JOIN $clickedCatalogue i 
                      ON p.prod_id = i.prod_id;";
    }
  

    $catalogResult = queryMysql($catalogQuery);

    while($row = $catalogResult -> fetch()) 
    {
      $catItemCount++;
      $cat_prod_id = $row['prod_id'];
      $cat_prod_img = $row['prod_img'];
      $cat_prod_name = $row['prod_name'];
      $cat_price = $row['price'];

      echo "<a href=\"product.php?prod_id=$cat_prod_id\">";

      $queryOnSale = "SELECT prod_id 
                      FROM sales 
                      WHERE prod_id = $cat_prod_id;";

      $saleResult = queryMysql($queryOnSale);

      if($saleResult->rowCount())
      {
        echo"<div class='shopping-card on-sale'>";
      }
      else
      {
        echo"<div class='shopping-card'>";
      }

      $cardProdName = trimString($cat_prod_name, 20);
      echo <<<_END
        <div class="shopping-card-photoframe">
            <img src="images/$cat_prod_img" alt="">
            </div>
            <div class="shopping-card-details">
              <label>$cardProdName</label> 
            </div>
            <div class="shopping-card-price">
              <label for="">R$cat_price</label>
              <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>

              </button>
            </div>
          </div>          
        </a>
      _END;
    }
  }



  echo <<<_END
  </div>
  </main>
  _END;

  require_once 'src/footer.php';

?>