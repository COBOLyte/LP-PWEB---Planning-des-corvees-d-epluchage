<div class="container">
<p>Voici un calendrier annuel des corvées hebdomadaire d'épluchage des patates (rudimentaire et non finalisé !).</p>
<ul>
<li>Les éplucheurs sont répartis sur les 52 semaines de l'année.</li>
<li>Une selection de l'année permet de faire défiler le calendrier.</li>
<li>Les données seront stockées et gérées dans une base de données MongoDB.</li>
<li>Vous devez finaliser vous-même la structure JSON des collections correspondantes.</li>
<li>Les statistiques de l'année (Nb de semaines pour chaque participants, ...) seront calculées par les bonnes requêtes MongoDB (pas en PHP):</li>
<li>L'accès à l'agenda, par un utislisateur, est conditionné par une connexion à son compte.</li>
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
                            $colorCode = "#FFFFFF";
                            
                            foreach ($users as $user) {
                                foreach ($user->agenda as $a) {
                                    if ($a == $date) { $colorCode = $user->colorId; break; }
                                }
                            }
                            ?>
                            
                            <select style="background-color: <?php  echo($colorCode); ?>" name="<?php echo($date); ?>">
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
        <button type="button submit">Valider le planning</button>
    </form>
    
    <h2>Statistiques par ordre croissant</h2>
    <ol>
    <li>Vincent : 5</li>
    <li>Christophe : 6</li>
    <li>David : 7</li>
    <li>Thomas : 10</li>
    </ol>
    </div>
