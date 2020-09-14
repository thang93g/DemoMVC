<?php
namespace App1\c;
use App1\m\StudentManager;
use App1\m\Student;

class StudentController
{
    protected $sm;

    public function __construct()
    {
        $this->sm = new StudentManager();
    }

    public function view()
    {
        $students = $this->sm->view();
        include_once "src/v/list.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            include_once "src/v/add.php";
        } else {
            $file = $_FILES['image']['tmp_name'];
            $path = "uploads/".$_FILES['image']['name'];
            if (move_uploaded_file($file,$path)){
                echo "success";
            } else {
                echo "fail";
            }
            $name = $_REQUEST['name'];
            $class = $_REQUEST['class'];
            $address = $_REQUEST['address'];
            $student = new Student($name,$class,$address);
            $student->setImage($path);
            $this->sm->add($student);
            header("location:index.php");
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            $id = $_REQUEST['id'];
            $student = $this->sm->getStudentById($id);
            include_once "src/v/edit.php";
        } else {
            $id = $_REQUEST['id'];
            $student = $this->sm->getStudentById($id);
            $image = $student['image'];
            $name = $_REQUEST['name'];
            $class = $_REQUEST['class'];
            $address = $_REQUEST['address'];
            $file = $_FILES['image']['tmp_name'];
            $path = "uploads/".$_FILES['image']['name'];
            if (move_uploaded_file($file,$path)){
                echo "success";
            } else {
                echo "fail";
            }
            $img = $path == "uploads/"?$image:$path;
            $std = new Student($name,$class,$address);
            $std->setId($id);
            $std->setImage($img);
            $this->sm->edit($std);
            header("location:index.php");
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->sm->delete($id);
        header("location:index.php");
    }
}