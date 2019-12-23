<?php
include_once "DBConnect.php";
include_once "Stories.php";


class Library_of_story
{
    protected $connect;
    
    public function __construct()
    {
        $data = new DBConnect("mysql:host=127.0.0.1;dbname=Library", "root", "1037212a");
        $this->connect = $data->connect();
    }
    
    public function getConnect()
    {
        return $this->connect;
    }
    
    public function getAll()
    {
        $sql = "SELECT * FROM library";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $library = [];
        foreach ($result as $value) {
            $librarys = new Stories($value['name'], $value['author'], $value['category'], $value['image']);
            $librarys->setId($value['id']);
            array_push($library, $librarys);
        }
        return $library;
    }
    
    public function addLibrary($story)
    {
        $stmt = $this->connect->prepare("INSERT INTO library(name,author,category,image) VALUES(:name ,:author,:category,:image)");
        $stmt->bindParam(":name", $story->getName());
        $stmt->bindParam(":author", $story->getAuthor());
        $stmt->bindParam(":category", $story->getCategory());
        $stmt->bindParam(":image", $story->getImage());
        $stmt->execute();
    }
    
    public function deleteLibrary($id)
    {
        $stmt = $this->connect->prepare("DELETE FROM library WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    
    public function editLibrary($id)
    {
        $stmt = $this->connect->prepare("SELECT name,author,category,image FROM library WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function updateLibrary($id, $Story)
    {
        $stmt = $this->connect->prepare("UPDATE library SET name=:name,author=:author,category=:category,image=:image WHERE id=:id");
        $stmt->bindParam(":name", $Story->getName());
        $stmt->bindParam(":author", $Story->getAuthor());
        $stmt->bindParam(":category", $Story->getCategory());
        $stmt->bindParam(":image", $Story->getImage());
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
