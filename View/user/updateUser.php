<div class="wrapper-50 margin-auto center">
    <h2>Modifier un utilisateur</h2>
    <form class="form" action="index.php?ctrl=user&method=update&id=<?php echo($user->_id) ?>" method="POST">
        <input type="email" name="email" placeholder="Mail" value="<?php echo($user->email) ?>" required/><br>
        <input type="password" name="password" placeholder="Mot de passe" value=""/><br>
        <input type="text" name="firstName" placeholder="Prénom" value="<?php echo($user->firstName) ?>" required/><br>
        <input type="text" name="lastName" placeholder="Nom" value="<?php echo($user->lastName) ?>"/><br>
        <input type="text" name="address" placeholder="Adresse" value="<?php echo($user->address) ?>"/><br>
        <input type="text" name="postalCode" placeholder="Code postal" value="<?php echo($user->postalCode) ?>"/><br>
        <input type="text" name="city" placeholder="Ville" value="<?php echo($user->country) ?>"/><br>
        <input type="text" name="country" placeholder="Pays" value="<?php echo($user->city) ?>"/><br>
        <input type="text" name="colorId" value="<?php echo($user->colorId) ?>" required/><br>
        <label>Admin ?
            <input type="radio" id="admin0"
            name="admin" value="0" <?php if ($user->admin == 0) : ?> checked <?php endif; ?>>
            <label for="no">Non</label>

            <input type="radio" id="admin1"
            name="admin" value="1" <?php if ($user->admin == 1) : ?> checked <?php endif; ?>>
            <label for="yes">Oui</label>
        </label>
        <div class="text"><?php if (isset($error)) echo($error) ?></div>
        <p><input type="submit" class="submit-btn" value="Mettre à jour"></p>
    </form>
    <span></span>
</div>
