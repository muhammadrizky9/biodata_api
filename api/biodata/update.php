<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/connection.php";

$data = json_decode(file_get_contents("php://input"));
$nama = $data->nama;
$id = $data->id;
$kelas = $data->kelas;

$hasil["success"] = false;
$hasil["data"] = array();

$update_sql = "UPDATE biodata SET nama='$nama', kelas='$kelas' where id=$id";
$result = mysqli_query($connection,$update_sql);
if($result){
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);

?>