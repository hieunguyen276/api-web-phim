<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: Application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/data.php');

    $db = new db();
    $connect = $db->connect();
    
    $data = new data($connect);

    $dulieu = json_decode(file_get_contents("php://input"));

    $data->idMovie = $dulieu->idMovie;

    if($data->delete()){
        echo json_encode(array('message','Data Deleted'));
    }else{
        echo json_encode(array('message','Data Not Deleted'));
    }

?>