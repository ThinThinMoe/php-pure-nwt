<?php

require_once "db_connect.php";
$update = false;
$edit_name = $edit_address = $edit_phone = '';
session_start();
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

// edit info
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // select for edit data
    $editData = $conn_sql->query("select * from users where id=$id") or die($conn_sql->error);

    if (count($editData->fetch_array()) == 1) {
        $edit_data = $editData->fetch_array();
        $update = true;
        $edit_name = $edit_data['name'];
        $edit_address = $edit_data['address'];
        $edit_phone = $edit_data['phone'];
    }

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");
}