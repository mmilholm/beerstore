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

function getProdInfo()
{

    global $dbc;

    $query = 'SELECT * from tblProducts ORDER BY cat_id';
    $statement = $dbc->prepare($query);
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


?>
