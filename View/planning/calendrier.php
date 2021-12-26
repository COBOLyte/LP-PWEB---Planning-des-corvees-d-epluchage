<style>
    .personne { background-color: #FFFFFF; }

    <?php foreach ($users as $user) : ?>
        .<?php echo($user->firstName); ?> { background-color: <?php echo($user->colorId); ?>; }
    <?php endforeach; ?>
</style>

<ul>
    <li>Les statistiques de l'année (Nb de semaines pour chaque participants, ...) seront calculées par les bonnes requêtes MongoDB (pas en PHP):</li>
</ul>

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
    <h2 class="stats">Statistiques par ordre croissant</h2>
    <ol>
    <?php //for ($i=0; $i < count($ArraySorted) ; $i++):?>
        <?php //foreach ($ArraySorted[$i] as $key => $value):?>
            <?php //echo("<li>".$key ." : ". $value."</li>");?>
        <?php // endforeach ?>
    <?php //endfor ?>
    </ol>
    