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

    <h3 class="stats">Nombre de semaines occupés par les utilisateurs en <?php echo($annee); ?>, par ordre croissant :</h2>
    <ul>
        <?php foreach ($agendasOfYearInAscOrderKeys as $email) : ?>
        <li><?php echo($email . " : " . $agendasOfYearInAscOrder[$email] . " semaine(s)"); ?></li>
        <?php endforeach; ?>
    </ul>
    
    <h3 class="stats">Nombre de semaines occupés en <?php echo($annee); ?> : <span class="stats-normal"><?php echo($cptAnnee); ?> semaine(s)</span></h3>

    <h3 class="stats">Nombre de semaines total occupés par les utilisateurs, par ordre décroissant :</h2>
    <ul>
        <?php foreach ($agendasInDescOrder as $entry) : ?>
        <li><?php echo($entry->email . " : " . $entry->datesNb . " semaine(s)"); ?></li>
        <?php endforeach; ?>
    </ul>
