<?php require_once("./View/header.php") ?>
<section id="main-section">
<?php
if (isset($page)) {
    // Nécessite de ne pas être connecté
    if ($page == "security/login" || $page == "user/createAccount") {
        if (isset($_SESSION["user"])) $page = "home";
    }
    
    // Nécessite d'être connecté
    if ($page == "planning/calendrier") {
        if (!isset($_SESSION["user"])) $page = "unauthorized";
    }
    
    // Nécessite d'être connecté en ADMIN
    if ($page == "user/usersList" || $page == "user/updateUser") {
        if (!isset($_SESSION["user"]) || $_SESSION["user"]->admin != 1) $page = "unauthorized";
    }
    
    require_once("./View/" . $page . ".php");
}
?>
</section>
<?php require_once("./View/footer.php") ?>
