<style>
    .personne { background-color: #FFFFFF; }

    <?php foreach ($users as $user) : ?>
        .<?php echo($user->firstName); ?> { background-color: <?php echo($user->colorId); ?>; }
    <?php endforeach; ?>
</style>

<h2 class="center">Liste des utilisateurs</h2>
    <form action="./index.php?ctrl=planning&method=index" method="POST">
        <label>Année :
            <select name="annee" id="annee">
                <?php foreach($anneesOptions as $anneeOpt) : ?>
                    <option <?php if ($anneeOpt == $annee) : ?> selected <?php endif; ?> value="<?php echo($anneeOpt) ?>"><?php echo($anneeOpt) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="button submit">Changer</button>
    </form>
   
<form action="index.php?ctrl=planning&method=updatePlanning" method="POST">
    <table>
        <input type="hidden" name="currentYear" value="<?php echo($annee); ?>">
        <tbody>
            <?php foreach ($dates as $date) : ?>
                <?php if ($column == 0) : ?>
                    <tr>
                <?php endif; ?>
                        <td>
                            <?php echo($date); ?>
                            
                            <?php
                            $selectClass = "personne";
                            foreach ($users as $user) {
                                foreach ($user->agenda as $a) {
                                    if ($a == $date) { $selectClass = $user->firstName; break; }
                                }
                            }
                            ?>
                            
                            <select
                                class="<?php echo($selectClass); ?>"
                                name="<?php echo($date); ?>"
                                <?php if ($_SESSION['user']->admin != 1) : ?> disabled="disabled" <?php endif; ?>
                            >
                                <option value="-">-</option>

                                <?php foreach ($users as $user) : ?>
                                    <option
                                    value="<?php echo($user->email); ?>"
                                    <?php foreach ($user->agenda as $a) : ?>
                                        <?php if ($a == $date) : ?>
                                            selected
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    >
                                    <?php echo($user->email); ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </td>
                <?php if (++$column == 4) : ?>
                    </tr>
                <?php $column = 0; endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
        <?php if ($_SESSION['user']->admin == 1) : ?>
            <button type="button submit">Valider le planning</button>
        <?php endif; ?>
    </form>

    <h2 class="center">Statistiques</h2>
    <h2 class="stats">Nombre de jours total occupés par l'utilisateur et par ordre croissant :</h2>
    <ol>
        <?php foreach ($agendasInAscOrder as $entry) : ?>
        <li><?php echo($entry->email . " : " . $entry->datesNb . " jour(s)"); ?></li>
        <?php endforeach; ?>
    </ol>
    <h2 class="stats">Nombre de jours occupés dans l'année <?php echo($annee); ?> : <span class="stats-normal"><?php echo($cptAnnee); ?> jour(s)</span></h2>
