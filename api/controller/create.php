<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: Application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/data.php');

    $db = new db();
    $connect = $db->connect();
    
    $data = new data($connect);

    $dulieu = json_decode(file_get_contents("php://input"));
    $data->movieName = $dulieu->movieName;
    $data->authorName = $dulieu->authorName;
    $data->IMDB = $dulieu->IMDB;
    $data->movieLink = $dulieu->movieLink;
    $data->introduce = $dulieu->introduce;
    $data->date = $dulieu->date;
    $data->time = $dulieu->time;
    $data->avatar = $dulieu->avatar;
    $data->screenshoot = $dulieu->screenshoot;
    $data->idCategory = $dulieu->idCategory;

    if($data->create()){
        echo json_encode(array('message','Data Created'));
    }else{
        echo json_encode(array('message','Data Not Created'));
    }

?>