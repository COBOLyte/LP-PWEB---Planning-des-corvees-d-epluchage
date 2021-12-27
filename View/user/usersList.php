<style>    
    <?php foreach ($users as $user) : ?>
        .<?php echo($user->firstName); ?> { background-color: <?php echo($user->colorId); ?>; }
    <?php endforeach; ?>
</style>

<div>
    <h2 class="center">Liste des utilisateurs</h2>
    <table class="center">
        <tr>
            <th>ID</th>
            <th>MAIL</th>
            <th>PRÉNOM</th>
            <th>NOM</th>
            <th>ADRESSE</th>
            <th>CODE POSTAL</th>
            <th>VILLE</th>
            <th>PAYS</th>
            <th>CODE COULEUR</th>
            <th>ADMIN</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo($user->_id) ?></td>
            <td><?php echo($user->email) ?></td>
            <td><?php echo($user->firstName) ?></td>
            <td><?php echo($user->lastName) ?></td>
            <td><?php echo($user->address) ?></td>
            <td><?php echo($user->postalCode) ?></td>
            <td><?php echo($user->city) ?></td>
            <td><?php echo($user->country) ?></td>
            <td class="<?php echo($user->firstName); ?> color-td-text"><?php echo($user->colorId) ?></td>
            <td><?php 
            if ($user->admin == 1) echo("Oui");
            else echo ("Non");
            ?></td>
            <td><a href="./index.php?ctrl=user&method=update&id=<?php echo($user->_id); ?>" title="Modifier"><i class="fas fa-edit"></i></a></td>
            <td><a href="./index.php?ctrl=user&method=delete&_id=<?php echo($user->_id); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" title="Supprimer"><i class="fas fa-minus"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
