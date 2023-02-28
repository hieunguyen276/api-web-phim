<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: Application/json');

    include_once('../../config/db.php');
    include_once('../../model/data.php');

    $db = new db();
    $connect = $db->connect();

    $data = new data($connect);
    $read2 = $data->read2();

    $num2 = $read2->rowCount();
    if($num2>0){
        $data_array = [];
        $data_array['popular'] = [];

        while($row2 = $read2->fetch(PDO::FETCH_ASSOC)){
            extract($row2);

            $data_item = array(
                'idMovie' => $idMovie,
                'movieName' => $movieName,
                'authorName' => $authorName,
                'IMDB' => $IMDB,
                'movieLink' => $movieLink,
                'introduce' => $introduce,
                'date' => $date,
                'time' => $time,
                'avatar' =>$avatar,
                'screenshot' => $screenshot,
                'idCategory' => $idCategory
            );
            array_push($data_array['popular'],$data_item);
        }
        echo json_encode($data_array);
    }
?>