<?php
// lấy tên
$name=filter_input(INPUT_POST,'name');

if($name == null){
   $error_message = " tên không hợp lệ ";
    include('error.php');   
} else {
    $query = "INSERT INTO categories (categoryName) VALUES (:name)";
    $statement = $db->prepare($query); // chuẩn bị câu lệnh
    $statement->bindValue(':name',$name);// gán giá trị 
    $statement->execute();// thực hiện câu lệnh
    $statement->closeCursor();  // đóng kết nối

    include ("category_list.php");
}