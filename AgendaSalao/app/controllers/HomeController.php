<?php
class HomeController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=login&action=index');
            exit();
        }
        include 'app/views/home.php';
    }
}
?>