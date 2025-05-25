<?php
require_once '../database.php';

class Login {
    public $db;

    public function __construct() {
        session_start();
        $this->db = new Database();
    }
    
    public function check_login() {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "<script>alert('Username atau Password tidak boleh kosong');</script>";
            return false;
        }

        $username = $_POST['username'];
        $pass = $_POST['password'];

        $stmt = $this->db->mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($pass, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $row['level'];
                $stmt->close();

                if ($row['level'] == 0) {
                    echo "<script>window.location.href='../admin_side.php';</script>";
                } else if ($row['level'] == 1) {
                    echo "<script>window.location.href='../user_side.php';</script>";
                }
                exit();  
            } else {
                echo "<script>alert('Username atau Password salah');</script>";
                $stmt->close();
                return false;
            }
        } else {
            echo "<script>alert('Username tidak ditemukan');</script>";
            $stmt->close();
            return false;
        }
    }

}
