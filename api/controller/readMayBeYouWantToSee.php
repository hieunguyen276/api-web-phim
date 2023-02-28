<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: Application/json');

    include_once('../../config/db.php');
    include_once('../../model/data.php');

    $db = new db();
    $connect = $db->connect();

    $data = new data($connect);
    $read3 = $data->read3();

    $num3 = $read3->rowCount();
    if($num3>0){
        $data_array = [];
        $data_array['maybeyouwanttosee'] = [];

        while($row3 = $read3->fetch(PDO::FETCH_ASSOC)){
            extract($row3);

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
            array_push($data_array['maybeyouwanttosee'],$data_item);
        }
        echo json_encode($data_array);
    }
?>