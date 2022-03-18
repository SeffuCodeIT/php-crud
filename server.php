<?php
session_start();


//initialize variables
    $name = "";
    $address = "";
    $id = 0;
    $edit_state = false;


//connect to db 
$db = mysqli_connect('localhost', 'root', 'seffu', 'crud');


//if saved button is clicked
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "INSERT INTO info (name, address) VALUES ('$name', '$address')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Successfully Added";
    header('location: index.php?');// redirect to homepage

}

//retrieve information

$results = mysqli_query($db, "SELECT * From info ");

//if update button is clicked
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id = $_POST['id'];
    mysqli_query($db, "UPDATE info SET name ='$name', address ='$address' WHERE id =$id");


    $_SESSION['msg'] = "Successfully Edited";
    header('location: index.php?');// redirect to homepage

}

//delete records
if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysqli_query($db, "DELETE  FROM info WHERE id=$id");
    $_SESSION['msg'] = "Successfully Deleted";
    header('location: index.php?');// redirect to homepage

}

?>