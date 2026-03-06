<?php

// Kết nối cơ sở dữ liệu

use LDAP\Result;

function db_connect($database)
{
    global $conn;
    $conn = mysqli_connect(
        $database['hostname'],
        $database['username'],
        $database['password'],
        $database['dataname']
    );
    if (!$conn) echo "Kết nối không thành công";
}

// Hàm lấy mảng dữ liệu
function db_fetch_array($query_string)
{
    global $conn;
    $result = mysqli_query($conn, $query_string);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return $arr;
}

// Hàm lấy 1 dòng dữ liệu
function db_fetch_row($query_string)
{
    global $conn;
    $result = mysqli_query($conn, $query_string);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// Hàm thêm dữ liệu
function db_insert($table, $arr_data)
{
    global $conn;
    $value_feild = "('" . join("','", $arr_data) . "')";
    $arr_data = array_keys($arr_data);
    $column_feild = "(`" . join("`,`", $arr_data) . "`)";
    $sql = "INSERT INTO" . " $table " . "$column_feild" . " VALUES " . "$value_feild";
    mysqli_query($conn, $sql);
}

// Hàm cập nhật dữ liệu
function db_update($table, $arr_data, $where)
{
    global $conn;
    $set_feild = [];
    foreach($arr_data as $key => $value){
        $set_feild[] = "`$key`" . "=" . "'$value'";
    }
    $set_complete = join(",",$set_feild);
    $sql = "UPDATE `$table` SET $set_complete WHERE $where";
    mysqli_query($conn, $sql);
}

// Hàm xóa dữ liệu
function db_delete($table, $where)
{
    global $conn;
    $table = " `$table` ";
    $sql = "DELETE FROM $table WHERE $where";
    mysqli_query($conn, $sql);
}

// Hàm lấy số lượng đòng
function db_num_row($query_string)
{
    global $conn;
    $sql = mysqli_query($conn, $query_string);
    $rows = mysqli_num_rows($sql);
    return $rows;
}

// Hàm đếm số lượng
function db_count($feild,$table,$where){
    global $conn;
    $sql = "SELECT COUNT($feild) as total FROM `$table` WHERE $where";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Show block
function show_block($block_code){
    global $conn;
    $sql = "SELECT `block_content` FROM `tbl_blocks` WHERE `block_code` = '$block_code'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row['block_content'];
}


