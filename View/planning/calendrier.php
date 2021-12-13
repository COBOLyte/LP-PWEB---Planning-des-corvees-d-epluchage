

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

<h1> Planning des corvées d'épluchage</h1>
    <form method="POST" name="annee"action="index.php?ctrl=planning&method=selectedYear">
    <label>Année :
        <select name="annee">
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>
    </label>
    <button type="submit">Valider</button>
    </form>
   
<form action="#" method="post" name="form1" id="form1">
    <input name="ecriture" type="hidden" value="1">
    <table>
        <tbody>
            <?php foreach($dates as $date) : ?>
                <?php if ($cpt == 0) : ?>
                    <tr>
                <?php endif; ?>
                        <td>
                            <?php echo($date); ?>
                            <select name="<?php echo($date); ?>" class="personne">
                                <option value="personne">personne</option>
                                <option value="vincent">vincent</option>
                                <option value="david">david</option>
                                <option value="thomas">thomas</option>
                                <option value="christophe">christophe</option>
                            </select>
                        </td>
                <?php if (++$cpt == 4) : ?>
                    </tr>
                <?php $cpt = 0; endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
            
<div>
    <div align="center">
    <p>
    <input type="submit" value="Valider le planning">
    </p>
    </div>
    </div>
    </form>
    
    <h2>Statistiques par ordre croissant</h2>
    <ol>
    <li>Vincent : 5</li>
    <li>Christophe : 6</li>
    <li>David : 7</li>
    <li>Thomas : 10</li>
    </ol>
    </div>