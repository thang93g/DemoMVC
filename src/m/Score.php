<?php


namespace App1\m;


class Score
{
    protected $student_id;
    protected $van;
    protected $toan;
    protected $anh;

    public function __construct($student_id, $van, $toan, $anh)
    {
        $this->student_id = $student_id;
        $this->van = $van;
        $this->toan = $toan;
        $this->anh = $anh;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id): void
    {
        $this->student_id = $student_id;
    }

    /**
     * @return mixed
     */
    public function getVan()
    {
        return $this->van;
    }

    /**
     * @param mixed $van
     */
    public function setVan($van): void
    {
        $this->van = $van;
    }

    /**
     * @return mixed
     */
    public function getToan()
    {
        return $this->toan;
    }

    /**
     * @param mixed $toan
     */
    public function setToan($toan): void
    {
        $this->toan = $toan;
    }

    /**
     * @return mixed
     */
    public function getAnh()
    {
        return $this->anh;
    }

    /**
     * @param mixed $anh
     */
    public function setAnh($anh): void
    {
        $this->anh = $anh;
    }


}