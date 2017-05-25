<?php

require_once 'db_connect.php';

/**
 * This function takes in a first and last name
 * and stores it in the database
 *
 * @param string $firstName - the firstName the user entered in the form.
 * @param string $lastName - the lastName the user enterd in the form.
 *
 * @return void
 */
function storeName($firstName, $lastName)
{
    global $dbc;

    $query = 'INSERT INTO tblNames (first_name, last_name)
        VALUES (:firstName, :lastName)';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();
}

/**
 * This function generates the result set of
 * the tblNames table.
 *
 * @return array $names - an assoc. array which contains all the names stored in the DB.
 */
function getAllNames()
{
    global $dbc;

    $query = 'SELECT * from tblNames ORDER BY last_name';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $names = $statement->fetchAll();
    $statement->closeCursor();
    return $names;

}

//Used in index3.php checkout page
function getAllProducts()
{
    global $dbc;
    $query = 'SELECT * from tblProducts';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}


//Used in shopping_cart.php checkout page
function getProduct($prod_id)
{
    global $dbc;

    $query = 'SELECT * from tblProducts WHERE prod_id = :product';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':product', $prod_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;

}


function getProdInfo($category)
{
    $category = (int) $category;
    global $dbc;

    $query = 'SELECT * from tblProducts WHERE cat_id = :category ORDER BY cat_id';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':category', $category);
    $statement->execute();
    $names = $statement->fetchAll();
    $statement->closeCursor();
    return $names;

}


function idSearch($prodID)
{
    $prodID = (int) $prodID;

    global $dbc;

    $query = 'SELECT * from tblProducts WHERE prod_id = :prodID';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':prodID', $prodID);
    $statement->execute();
    $names = $statement->fetchAll();
    $statement->closeCursor();
    return $names;

}
//Creating an order in the db
function createOrder($userID){
  $userID = (int) $userID;
  global $dbc;

  $query = 'INSERT INTO tblorders(user_id, order_date) VALUES(:userID, CURRENT_DATE)';
  $statement = $dbc->prepare($query);
  $statement->bindValue(':userID', $userID);
  $statement->execute();
  $statement->closeCursor();
}

function getOrderID($userID){
  $userID = (int) $userID;
  global $dbc;

  $query = 'SELECT order_id from tblorders WHERE user_id = :userID AND payed = 0';
  $statement = $dbc->prepare($query);
  $statement->bindValue(':userID', $userID);
  $statement->execute();
  $orderNum = $statement->fetch();
  $statement->closeCursor();
  return $orderNum;
}

function getUser($username, $password)
{
    global $dbc;

    $query = 'SELECT  * from tblUsers WHERE email = :username  AND password = :password';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}

function cartSync()
{
  global $dbc;
  $query = '';

    if(isset($_SESSION['user']) && isset($_SESSION['user']['user_id']))
    {
        if(isset($_SESSION['cart']))
        {
            reNewUnpayedOrder($_SESSION['user']['user_id']);


              $query = 'INSERT INTO tblOrders( user_id, order_date, payed, order_total)
                                      Values(:user_id,NOW() - INTERVAL 1 DAY, 0, );' ;
              $statement = $dbc->prepare($query);
              $statement->bindValue(':user_id', $userID);   
              $statement->execute();    
              $statement->closeCursor();

            foreach($_SESSION['cart'] as $key => $value)
            {
                  $query = 'INSERT INTO tblOrders_Products FROM tblOrders_Products 
                    JOIN tblOrders ON  tblOrders.order_id = tblOrders_Products.order_id 
                    WHERE tblOrders.user_id = :user_id and tblOrders.payed = 0' ;

            }

        }

    }
}


function getCartTotal()
{
  $total = 0;
  if(isset($_SESSION['cart'])
  {
      foreach ($_SESSION['cart'] as $key1 => $productOrder) 
      {      
        total += $productOrder['price'] * $productOrder['quantity'] 
      }  
  }
}

function reNewUnpayedOrder($userID)
{
    global $dbc;
    $query = 'DELETE tblOrders_Products FROM tblOrders
              JOIN tblOrders_Products ON tblOrders.order_id = tblOrders_Products.order_id
              where tblOrders.user_id = :user_id and tblOrders.payed = 0' ;
    $statement = $dbc->prepare($query);
    $statement->bindValue(':user_id', $userID);   
    $statement->execute();    
    $statement->closeCursor();

    $query = 'DELETE tblOrders FROM tblOrders              
              where user_id = :user_id and payed = 0' ;
    $statement = $dbc->prepare($query);
    $statement->bindValue(':user_id', $userID);   
    $statement->execute();    
    $statement->closeCursor();
}

?>
