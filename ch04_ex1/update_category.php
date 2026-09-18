<?php 
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$category_name = filter_input(INPUT_POST, 'category_name');

if($category_id ==null || $category_id == false){
    $error_message = "Invalid category ID.";
    include('error.php');
} else {
    require_once('database.php');

    $query = "UPDATE categories
              SET categoryName = :category_name
              WHERE categoryID = :category_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();

    include("category_list.php");
}

?>