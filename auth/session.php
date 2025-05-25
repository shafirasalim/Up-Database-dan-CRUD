<?php
require_once __DIR__ . '/../database.php';

class Session
{
    public $db;
    public $login_user;

    public function __construct()
    {
        session_start();
        $this->db = new Database();
    }

    public function check_session()
    {
        if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
            header("Location: index.php");
            exit;
        }

        $email = $this->db->mysqli->real_escape_string($_SESSION['email']);
        $ses_sql = "SELECT * FROM users WHERE email='$email'";
        $query = $this->db->mysqli->query($ses_sql);

        if ($query->num_rows == 1) {
            $row = $query->fetch_assoc();
            $this->login_user = $row['email'];
        } else {
            header("Location: index.php");
            exit;
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
}
