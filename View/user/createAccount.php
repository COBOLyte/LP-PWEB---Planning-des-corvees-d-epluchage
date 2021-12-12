<div class="wrapper-50 margin-auto center">
    <h2>Créer un compte</h2>
    <form class="form" action="index.php?ctrl=user&method=create" method="POST">
        <input type="email" name="email" placeholder="Mail" required/><br>
        <input type="password" name="password" placeholder="Mot de passe" required/><br>
        <input type="text" name="firstName" placeholder="Prénom" required/><br>
        <input type="text" name="lastName" placeholder="Nom"/><br>
        <input type="text" name="address" placeholder="Adresse"/><br>
        <input type="text" name="postalCode" placeholder="Code postal"/><br>
        <input type="text" name="city" placeholder="Ville"/><br>
        <input type="text" name="country" placeholder="Pays"/><br>
        <div class="text"><?php if (isset($error)) echo($error) ?></div>
        <p><input type="submit" class="submit-btn" value="Créer"></p>
    </form>
    <span></span>
</div>
