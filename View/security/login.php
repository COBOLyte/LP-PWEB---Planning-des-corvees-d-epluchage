<div class="wrapper-50 margin-auto center">
    <h2>Connexion</h2>
    <form class="form" action="index.php?ctrl=security&method=login" method="POST">
        <input type="email" name="email" placeholder="Mail" required/><br>
        <input type="password" name="password" placeholder="Mot de passe" required/><br>
        <div class="text"><?php if (isset($info)) echo($info) ?></div>
        <p><input type="submit" class="submit-btn" value="Connect"></p>
    </form>
    <p></p>
    <div class="create-account">Vous n'avez pas de compte ? <a href='index.php?ctrl=user&method=create'>Créez-en un</a> !</div>
</div>