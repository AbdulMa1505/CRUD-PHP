<?php
session_start();
require 'dbcon.php';
if(isset($_POST['delete'])){
    $user_id=mysqli_real_escape_string($conn,$_POST['delete']);
    $query ="DELETE  FROM entry WHERE id ='$user_id' ";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message']="RECORD DELETED SUCCESSFULLY";
        header('Location:index.php');
        exit(0);
    }
    else{
        $_SESSION['message'] ="error occurred unable to delete ";
        header('Location:index.php');
        exit(0);
    }
}

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $query="INSERT INTO entry (name,email,phone) VALUES ('$name','$email','$phone')";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message'] ="Student created successfully";
        header('Location:create.php');
        exit(0);

    }
    else{
        $_SESSION['message'] ="error occurred unable to create ";
        header('Location:create.php');
        exit(0);
    }
}
if(isset($_POST['update'])){
    $user_id=mysqli_real_escape_string($conn,$_POST['id']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $query="UPDATE entry SET name='$name',email='$email',phone='$phone' WHERE id='$user_id'";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message'] ="Student updated successfully";
        header('Location:index.php');
        exit(0);

    }
    else{
        $_SESSION['message'] ="error occurred unable to update info ";
        header('Location:index.php');
        exit(0);
    }
}
?>