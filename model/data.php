<?php
class data{
    private $conn;

    //data 
    public $idMovie;
    public $movieName;
    public $authorName;
    public $IMDB;
    public $movieLink;
    public $introduce;
    public $date;
    public $time;
    public $avatar;
    public $screenshot;
    public $idCategory;

    //connect_db
    public function __construct($db){
        $this->conn = $db;
    }

    //read data 1
    public function read(){
        $query = "SELECT * FROM movie ORDER BY idMovie ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    //read data 2
    public function read2(){
        $query = "SELECT * FROM popular ORDER BY idMovie ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
      //read data 3
      public function read3(){
        $query = "SELECT * FROM maybeyouwanttosee ORDER BY idMovie ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
      //read data 4
      public function read4(){
        $query = "SELECT * FROM slider ORDER BY idMovie ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
      //read data 5
      public function read5(){
        $query = "SELECT * FROM trending ORDER BY idMovie ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    

    //show data
    public function show(){
        $query = "SELECT * FROM movie WHERE idMovie=? limit 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idMovie);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->movieName = $row['movieName'];
        $this->authorName = $row['authorName'];
        $this->IMDB = $row['IMDB'];
        $this->movieLink = $row['movieLink'];
        $this->introduce = $row['introduce'];
        $this->date = $row['date'];
        $this->time = $row['time'];
        $this->avatar = $row['avatar'];
        $this->screenshot = $row['screenshot'];
        $this->idCategory = $row['idCategory'];
    }

    //create data
    public function create(){
        $query = "INSERT INTO movie SET movieName=:movieName, authorName=:authorName, IMDB=:IMDB, movieLink=:movieLink, introduce=:introduce, date=:date, time=:time, avatar=:avatar, screenshot=:screenshot,idCategory=:idCategory";
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->movieName = htmlspecialchars(strip_tags($this->movieName));
        $this->authorName = htmlspecialchars(strip_tags($this->authorName));
        $this->IMDB = htmlspecialchars(strip_tags($this->IMDB));
        $this->movieLink = htmlspecialchars(strip_tags($this->movieLink));
        $this->introduce = htmlspecialchars(strip_tags($this->introduce));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->time = htmlspecialchars(strip_tags($this->time));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->screenshot = htmlspecialchars(strip_tags($this->screenshot));
        $this->idCategory = htmlspecialchars(strip_tags($this->idCategory));

        $stmt->bindParam(':movieName',$this->movieName);
        $stmt->bindParam(':authorName',$this->authorName);
        $stmt->bindParam(':IMDB',$this->IMDB);
        $stmt->bindParam(':movieLink',$this->movieLink);
        $stmt->bindParam(':introduce',$this->introduce);
        $stmt->bindParam(':date',$this->date);
        $stmt->bindParam(':time',$this->time);
        $stmt->bindParam(':avatar',$this->avatar);
        $stmt->bindParam(':screenshot',$this->screenshot);
        $stmt->bindParam(':idCategory',$this->idCategory);

        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
            return false;
    }


    //update data
    public function update(){
        $query = "UPDATE movie SET movieName=:movieName, authorName=:authorName, IMDB=:IMDB, movieLink=:movieLink, introduce=:introduce, date=:date, time=:time, avatar=:avatar, screenshot=:screenshot, idCategory=:idCategory WHERE idMovie=:idMovie ";
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->movieName = htmlspecialchars(strip_tags($this->movieName));
        $this->authorName = htmlspecialchars(strip_tags($this->authorName));
        $this->IMDB = htmlspecialchars(strip_tags($this->IMDB));
        $this->movieLink = htmlspecialchars(strip_tags($this->movieLink));
        $this->introduce = htmlspecialchars(strip_tags($this->introduce));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->time = htmlspecialchars(strip_tags($this->time));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->screenshot = htmlspecialchars(strip_tags($this->screenshot));
        $this->idCategory = htmlspecialchars(strip_tags($this->idCategory));
        $this->idMovie = htmlspecialchars(strip_tags($this->idMovie));

        //bind data
        $stmt->bindParam(':movieName',$this->movieName);
        $stmt->bindParam(':authorName',$this->authorName);
        $stmt->bindParam(':IMDB',$this->IMDB);
        $stmt->bindParam(':movieLink',$this->movieLink);
        $stmt->bindParam(':introduce',$this->introduce);
        $stmt->bindParam(':date',$this->date);
        $stmt->bindParam(':time',$this->time);
        $stmt->bindParam(':avatar',$this->avatar);
        $stmt->bindParam(':screenshot',$this->screenshot);
        $stmt->bindParam(':idCategory',$this->idCategory);
        $stmt->bindParam(':idMovie',$this->idMovie);
        
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
            return false;
    }


    //delete data
    public function delete(){
        $query = "DELETE FROM movie WHERE idMovie=:idMovie ";
        $stmt = $this->conn->prepare($query);
        //clean data

        $this->idMovie = htmlspecialchars(strip_tags($this->idMovie));

        //bind data

        $stmt->bindParam(':idMovie',$this->idMovie);
        
        if($stmt->execute()){
            return true;
        }
        printf("Error %s.\n" ,$stmt->error);
            return false;
    }


}
?>