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
?>