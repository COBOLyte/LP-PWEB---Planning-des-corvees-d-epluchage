<?php
class SecurityController {
    private $userManager;

    public function __construct($db) {
        require_once("./Model/user/UserManager.php");
        $this->userManager = new UserManager($db);
        $this->db = $db;
    }

    public function login() {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $result = $this->userManager->login($_POST["email"], $_POST["password"]);
            if ($result) {
                $_SESSION["user"] = $result;
                $page = "home";
            } else {
                $info = "Identifiants incorrects.";
                $page = "security/login";
            }
        } else {
            $page = "security/login";
        }
        
        if ($page == "home") header("Location: ./");
        else require("./View/main.php");
    }
    
    public function logout() {
        unset($_SESSION["user"]);
        header("Location: ./");
    }
}
?>
