<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: Application/json');

    include_once('../../config/db.php');
    include_once('../../model/data.php');

    $db = new db();
    $connect = $db->connect();
    
    $data = new data($connect);

    $data->idMovie = isset($_GET['id']) ? $_GET['id'] : die();

    $data->show();

    $data_item = array(
            'id_data' => $data->idMovie,
            'tenphim' => $data->movieName,
            'tentacgia' => $data->authorName,
            'IMDB' => $data->IMDB,
            'linkphim' => $data->movieLink,
            'mota' => $data->introduce,
            'ngayramat' => $data->date,
            'thoiluong' => $data->time,
            'anhdaidien' =>$data->avatar,
            'anhcreenshot' => $data->screenshot,
            'id_danhmuc' => $data->idCategory
        );
    print_r(json_encode($data_item));
    

?>