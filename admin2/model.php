<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "lms_db";
    private $conn;

    public function __construct()
    {
        
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        
    }

    // Fetch Standard

    public function fetch_std()
    {
        $data = [];

        $query = "SELECT * FROM `course` ORDER BY `course_name`";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Fetch Result

    public function fetch_res()
    {
        $data = [];

        $query = "SELECT DISTINCT `stu_email` FROM `courseorder`";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Fetch Records

    public function fetch()
    {
        $data = [];

        $query = "SELECT * FROM courseorder";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Filter Standard and Result

    public function fetch_filter($std, $res)
    {
        $data = [];

        $query = "SELECT * FROM courseorder WHERE course_id = '$std' AND stu_email = '$res' ";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Filter Standard

    public function fetch_std_filter($std)
    {
        $data = [];

        $query = "SELECT * FROM courseorder WHERE course_id = '$std'";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Filter Result

    public function fetch_res_filter($res)
    {
        $data = [];

        $query = "SELECT * FROM courseorder WHERE stu_email = '$res'";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }
}