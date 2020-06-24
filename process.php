<?php

session_start();
require_once "db_connect.php";
$update = false;
$edit_id = $edit_name = $edit_address = $edit_phone = '';
// show info
$result = $conn_sql->query("select * from users") or die($conn_sql->error);

// save info
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    //insert data
    $conn_sql->query("insert into users (name, address, phone) values('$name', '$address', '$phone')") or die($conn_sql->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");
}

// delete info
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // delete data
    $conn_sql->query("delete from users where id=$id") or die($conn_sql->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}

// get edit info
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // select for edit data
    $editData = $conn_sql->query("select * from users where id=$id") or die($conn_sql->error);

    if (count($editData) == 1) {
        $edit_data = $editData->fetch_assoc();
        $update = true;
        $edit_id = $edit_data['id'];
        $edit_name = $edit_data['name'];
        $edit_address = $edit_data['address'];
        $edit_phone = $edit_data['phone'];
    }
}

// update info
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $date = date("Y-m-d h:m:i");    
    // update data
    $editData = $conn_sql->query("update users set name='$name', address='$address', phone='$phone', updated_at='$date' where id=$id") or die($conn_sql->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");
}
