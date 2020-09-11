<?php


namespace App1\m;


class StudentManager
{
    protected $database;

    public function __construct()
    {
        $this->database = new DBConnect();
    }

    public function view()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->database->connect()->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item){
            $student = new Student($item['name'],$item['class'],$item['address']);
            $student->setId($item['id']);
            $img = $item['image'] == "uploads/"?"uploads/default.jpg":$item['image'];
            $student->setImage($img);
            array_push($arr,$student);
        }
        return $arr;
    }

    public function add($student)
    {
        $sql = "INSERT INTO `students`( `name`, `class`, `address`, `image`) VALUES (:name,:class,:address,:image)";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(":name",$student->getName());
        $stmt->bindParam(":class",$student->getClass());
        $stmt->bindParam(":address",$student->getAddress());
        $stmt->bindParam(":image",$student->getImage());
        $stmt->execute();
    }

    public function getStudentById($id)
    {
        $sql = "SELECT * FROM `students` WHERE id = :id";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function edit($student)
    {
        $sql = "UPDATE `students` SET `name`=:name,`class`=:class,`address`=:address WHERE id = :id";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(":id",$student->getId());
        $stmt->bindParam(":name",$student->getName());
        $stmt->bindParam(":class",$student->getClass());
        $stmt->bindParam(":address",$student->getAddress());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `students` WHERE id = :id";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }
}