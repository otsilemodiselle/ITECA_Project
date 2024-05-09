<?php
      require_once 'functions.php';

      session_start();

      if (!empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])) {
        $inputEmail = sanitizeString($_POST['inputEmail']);
        $inputPassword = sanitizeString($_POST['inputPassword']);
    
        
        $query = "SELECT stakeholder_id FROM stakeholders WHERE email='$inputEmail'";
        $result = queryMysql($query);
        
        if (!$result->rowCount()) 
            {die ("Incorrect login details");}
    
        $row = $result->fetch();
        $retrieved_st_id = $row['stakeholder_id'];
    
        $query = "SELECT * FROM customer WHERE stakeholder_id='$retrieved_st_id'";
        $result = queryMysql($query);
    
        $row = $result->fetch();
        $retrieved_customer_id =$row['customer_id'];
        $retrieved_name = $row['name'];
        $retrieved_surname = $row['surname'];
        $retrieved_pw = $row['password'];
    
        if (password_verify(str_replace("'", "", $inputPassword), $retrieved_pw))
        {
          session_start();
    
          $_SESSION['customer_id'] = $retrieved_customer_id;
          $_SESSION['forename'] = $retrieved_name;
          $_SESSION['surname'] = $retrieved_surname;
    
          header("Location: projectIndexPHPForm.php");
          exit;
        }
        else {window.alert("Incorrect login details");}
      }
  
     require_once 'above_nav_content.php';

  echo <<<_END
    
            <section class='clearfix container'>
                <div class="section-header">
                    <h3 class="cat-heading">login</h3>
                </div>
                <div class='login-container clearfix'>
                    <div class="login-window">
                        <div class="login-elements clearfix">
                            <div class="login-captions-div">
                                <h3 class="login-email">Email:</h3><br>
                                <h3 class="login-password">Password:</h3>
                            </div>
                          <form method="post" action="projectLoginPHPForm.php">
                            <div class="login-inputs-div">
                                <input type="text" name="inputEmail"><br>
                                <input type="text" name="inputPassword">
                            </div>
                            <input type="submit" value="Login" class="login-button">
                          </form>
                        </div>
                    </div>
                    
                </div>
            </section>
    
            <footer>
                <div class='end'>
                    
                </div>
            </footer>
        </body>
    </html>
  _END;

    
?>
