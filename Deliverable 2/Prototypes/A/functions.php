<?php
  $host = 'localhost';
  $data = 'bride_and_joy';
  $user = 'admin';
  $pass = 'AdminP@ss123';
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
  $opts = 
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];

  try
  {
    $pdo = new PDO($attr, $user, $pass, $opts);
  }
  catch(\PDOException $e)
  {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

  function queryMysql($query)
  {
    global $pdo;
    return $pdo->query($query);
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != '' || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2392000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $pdo;
    $var = strip_tags($var);
    $var = htmlentities($var);

    if (get_magic_quotes_gpc())
      $var = stripslashes($var);
    $result = $pdo-> quote($var);
    return str_replace("'", "", $result);
  }

  function latestPrimaryKey(){
    global $pdo;
    return $pdo->lastInsertId();
  }

  function trimString($string, $maxLength)
  {
    if (strlen($string) > $maxLength)
    {
      $string = substr($string, 0, $maxLength) . "...";
    }
    return $string;
    
  }

  function maskCard($card)
  {
    $card_no_array = str_split($card);
    for ($i = 0; $i < 12; $i++)
    {
      $card_no_array[$i] = '*';
    }
    $masked_card_no = implode('', $card_no_array);
    return $masked_card_no;
  }

  function add_stakeholder($pdo, $em, $cn)
  {
    $stmt = $pdo->prepare('INSERT INTO stakeholders(email, contact_number) VALUES(?,?)');

    $stmt->bindParam(1, $em, PDO::PARAM_STR, 128);
    $stmt->bindParam(2, $cn, PDO::PARAM_STR, 10);

    $stmt->execute([$em, $cn]);
  }

  function add_order($pdo, $wb, $od, $ci, $ot, $st)
  {
    $stmt = $pdo->prepare('INSERT INTO order_(waybill, order_desc, customer_id, order_total, status) VALUES(?,?,?,?,?)');

    $stmt->bindParam(1, $wb, PDO::PARAM_INT);
    $stmt->bindParam(2, $od, PDO::PARAM_STR, 255);
    $stmt->bindParam(3, $ci, PDO::PARAM_INT);
    $stmt->bindParam(4, $ot, PDO::PARAM_STR);
    $stmt->bindParam(4, $st, PDO::PARAM_STR, 66);

    $stmt->execute([$wb, $od, $ci, $ot, $st]);
  }

  function add_workitem($pdo, $dt, $cr)
  {
    $stmt = $pdo->prepare('INSERT INTO workitem(date, courier_id) VALUES(?,?)');

    $stmt->bindParam(1, $dt, PDO::PARAM_STR);
    $stmt->bindParam(2, $cr, PDO::PARAM_INT);

    $stmt->execute([$dt, $cr]);
  }

  function add_address($pdo, $ad)
  {
    $stmt = $pdo->prepare('INSERT INTO stakeholders(address) 
                          VALUES(?)');

    $stmt->bindParam(2, $ad, PDO::PARAM_STR, 255);

    $stmt->execute([$ad]);
  }

  function update_order_status($pdo, $st, $od)
  {
    $stmt = $pdo->prepare('UPDATE order_ SET status = ? WHERE order_id = ?');

    $stmt->bindParam(1, $st, PDO::PARAM_STR, 60);
    $stmt->bindParam(2, $od, PDO::PARAM_INT);

    $stmt->execute([$st, $od]);
  }

  function update_name($pdo, $nm, $cd)
  {
    $stmt = $pdo->prepare('UPDATE customer SET name = ? WHERE customer_id = ?');

    $stmt->bindParam(1, $nm, PDO::PARAM_STR, 68);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$nm, $cd]);
  }

  function update_surname($pdo, $sn, $cd)
  {
    $stmt = $pdo->prepare('UPDATE customer SET surname = ? WHERE customer_id = ?');

    $stmt->bindParam(1, $sn, PDO::PARAM_STR, 68);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$sn, $cd]);
  }

  function update_contact($pdo, $cn, $cd)
  {
    $stmt = $pdo->prepare('UPDATE stakeholders s
                          JOIN customer c ON s.stakeholder_id = c.stakeholder_id
                          SET s.contact_number = ? 
                          WHERE c.customer_id = ?');

    $stmt->bindParam(1, $cn, PDO::PARAM_STR, 10);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$cn, $cd]);
  }

  function update_email($pdo, $em, $cd)
  {
    $stmt = $pdo->prepare('UPDATE stakeholders s
                          JOIN customer c ON s.stakeholder_id = c.stakeholder_id
                          SET s.email = ? 
                          WHERE c.customer_id = ?');

    $stmt->bindParam(1, $em, PDO::PARAM_STR, 128);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$em, $cd]);
  }

  function update_card($pdo, $ca, $cd)
  {
    $stmt = $pdo->prepare('UPDATE customer SET card_no = ? WHERE customer_id = ?');

    $stmt->bindParam(1, $ca, PDO::PARAM_STR, 68);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$ca, $cd]);
  }

  function update_exp($pdo, $ex, $cd)
  {
    $stmt = $pdo->prepare('UPDATE customer SET exp_date = ? WHERE customer_id = ?');

    $stmt->bindParam(1, $ex, PDO::PARAM_INT);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$ex, $cd]);
  }

  function update_address($pdo, $ad, $cd)
  {
    $stmt = $pdo->prepare('UPDATE stakeholders s
                          JOIN customer c ON s.stakeholder_id = c.stakeholder_id
                          SET s.address = ? 
                          WHERE c.customer_id = ?');

    $stmt->bindParam(1, $ad, PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$ad, $cd]);
  }

  function update_password($pdo, $pw, $cd)
  {
    $stmt = $pdo->prepare('UPDATE customer SET password = ? WHERE customer_id = ?');

    $stmt->bindParam(1, $pw, PDO::PARAM_STR, 255);
    $stmt->bindParam(2, $cd, PDO::PARAM_INT);

    $stmt->execute([$pw, $cd]);
  }

  function add_customer($pdo, $st, $nm, $sn, $pw)
  {
    $stmt = $pdo->prepare('INSERT INTO customer(stakeholder_id, name, surname, password) VALUES(?,?,?,?)');

    $stmt->bindParam(1, $st, PDO::PARAM_STR, 10);
    $stmt->bindParam(2, $nm, PDO::PARAM_STR, 68);
    $stmt->bindParam(3, $sn, PDO::PARAM_STR, 68);
    $stmt->bindParam(4, $pw, PDO::PARAM_STR, 255);

    $stmt->execute([$st, $nm, $sn, $pw]);
  }

  function add_collection($pdo, $cus, $prodid)
  {
    $stmt = $pdo->prepare('INSERT INTO collection(customer_id, prod_id) 
                          VALUES(?,?)');

    $stmt->bindParam(1, $cus, PDO::PARAM_INT);
    $stmt->bindParam(2, $prodid, PDO::PARAM_INT);

    $stmt->execute([$cus, $prodid]);
  }

  function add_cart($pdo, $collid, $stockid)
  {
    $stmt = $pdo->prepare('INSERT INTO cart(coll_id, stock_id) 
                          VALUES(?,?)');

    $stmt->bindParam(1, $collid, PDO::PARAM_INT);
    $stmt->bindParam(2, $stockid, PDO::PARAM_INT);

    $stmt->execute([$collid, $stockid]);
  }

  function add_wishlist($pdo, $collid)
  {
    $stmt = $pdo->prepare('INSERT INTO wishlist(coll_id) 
                          VALUES(?)');

    $stmt->bindParam(1, $collid, PDO::PARAM_INT);

    $stmt->execute([$collid]);
  }

  function loggout(){
    session_start();
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }

?>

  