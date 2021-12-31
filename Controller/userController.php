<?php
class UserController {
    private $userManager;
    
    public function __construct($db) {
        require_once("./Model/user/userManager.php");
        $this->userManager = new UserManager($db);
        $this->db = $db;
    }
    
    public function create() {
        if (
            isset($_POST["email"]) &&
            isset($_POST["password"]) &&
            isset($_POST["firstName"]) &&
            isset($_POST["lastName"]) &&
            isset($_POST["address"]) &&
            isset($_POST["postalCode"]) &&
            isset($_POST["city"]) &&
            isset($_POST["country"])
            ) {

                $alreadyExist = $this->userManager->findByEmail($_POST["email"]);
                if (!$alreadyExist) {
                    $newUser = new User(
                        $_POST["email"],
                        $_POST["password"],
                        $_POST["firstName"],
                        $_POST["lastName"],
                        $_POST["address"],
                        $_POST["postalCode"],
                        $_POST["city"],
                        $_POST["country"],
                        '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6)
                    );
                    $this->userManager->create($newUser);
                    $_SESSION["user"] = $this->userManager->findByEmail($_POST["email"]);
                    $page = "home";
                } else {
                    $error = 'ERREUR: Le mail "'.$_POST['email'].'" est déjà pris par un autre utilisateur.';
                    $page = "user/createAccount";
                }
            } else {
                $page = "user/createAccount";
            }
            
            if ($page == "home") header("Location: ./");
            else require_once("./View/main.php");
        }

        public function usersList() {
            $users = $this->userManager->findAll();
            $page = "user/usersList";
            require_once("./View/main.php");
        }

        public function update() {
            if (isset($_POST["email"]) && isset($_POST["admin"]) && isset($_POST["colorId"])) {

                $alreadyExist = $this->userManager->findByEmail($_POST["email"]);
                if ($alreadyExist->_id == $_GET["id"]) {
                    $user = new User(
                        $_POST["email"],
                        $_POST["password"],
                        $_POST["firstName"],
                        $_POST["lastName"],
                        $_POST["address"],
                        $_POST["postalCode"],
                        $_POST["city"],
                        $_POST["country"],
                        $_POST["colorId"]
                    );
                    $this->userManager->update($_GET["id"], $user, $_POST["admin"]);
                    if ($_POST["password"] != "") $this->userManager->changePassword($_GET["id"], $_POST["password"]);

                    if ($_GET["id"] == $_SESSION["user"]->_id) $_SESSION["user"] = $this->userManager->findByEmail($_POST["email"]);

                    header("Location: ./index.php?ctrl=user&method=usersList");
                } else {
                    $error = 'ERREUR: Le mail "'.$_POST['email'].'" est déjà pris par un autre utilisateur.';

                    $user = $this->userManager->findOne($_GET["id"]);
                    $page = "user/updateUser";
                }
            } else {
                $user = $this->userManager->findOne($_GET["id"]);
                $page = "user/updateUser";
            }

            if (isset($page) && $page == "user/updateUser") require_once("./View/main.php");
        }

        public function delete() {
            $this->userManager->delete($_GET["_id"]);
            header("Location: ./index.php?ctrl=user&method=usersList");
        }
    }
?>
