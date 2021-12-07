<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style id="stndz-style"></style>
<?php
  $months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
  $years = ["2018","2019","2020","2021"];
  foreach ($years as $year) {
    foreach($months as $month){
      echo strtotime(`first day of ${month} ${year}`);
    }
  }
?>

<style type="text/css">
.vincent {
	background-color: #FF9900;
}
.david {
	background-color: #00CCFF;
}
.thomas {
	background-color: #00FF33;
}
.christophe {
	background-color: #FFFF00;
}
.PERSONNE{
	background-color: #FF0000;
}
.personne{
	background-color: #FF0000;
}
.container {
	width:950px;
	margin: 0 auto;
}
.annee {
	text-align:center;
}
</style>
<title>Planning Corvée Patates</title>

<body>
<div class="container">
  <p>Voici un calendrier annuel des corvées hebdomadaire d'épluchage des patates (rudimentaire et non finalisé !). </p>
  <ul>
    <li>Les éplucheurs sont répartis sur les 52 semaines de l'année. </li>
    <li>Une selection de l'année permet de faire défiler le calendrier.</li>
    <li>Les données seront stockées et gérées dans une base de données MongoDB. </li>
    <li>Vous devez finaliser vous-même la structure JSON des collections correspondantes.</li>
    <li>Les statistiques de l'année (Nb de semaines pour chaque participants, ...) seront calculées par les bonnes requêtes MongoDB (pas en PHP):</li>
    <li>L'accès à l'agenda, par un utislisateur, est conditionné par une connexion à son compte.</li>
  </ul>
  <h1> Planning des corvées d'épluchage</h1>
<p class="annee"><label>Année : <select name="annee">
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
</select></label>
</p>
<form action="http://lp-projet-web.ovh/mongoDB/miniprojets/demo_planning.php#" method="post" name="form1" id="form1">
	<input name="ecriture" type="hidden" value="1">
<table border="1" align="center"><tbody><tr><td>03/01/2021<select name="1" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>10/01/2021<select name="2" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>17/01/2021<select name="3" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>24/01/2021<select name="4" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>31/01/2021<select name="5" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>07/02/2021<select name="6" class="christophe">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe" selected="">christophe</option>
</select>
</td><td>14/02/2021<select name="7" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>21/02/2021<select name="8" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>28/02/2021<select name="9" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>07/03/2021<select name="10" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>14/03/2021<select name="11" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>21/03/2021<select name="12" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>28/03/2021<select name="13" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>04/04/2021<select name="14" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>11/04/2021<select name="15" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>18/04/2021<select name="16" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>25/04/2021<select name="17" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>02/05/2021<select name="18" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>09/05/2021<select name="19" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>16/05/2021<select name="20" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>23/05/2021<select name="21" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>30/05/2021<select name="22" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>06/06/2021<select name="23" class="christophe">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe" selected="">christophe</option>
</select>
</td><td>13/06/2021<select name="24" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>20/06/2021<select name="25" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>27/06/2021<select name="26" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>04/07/2021<select name="27" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>11/07/2021<select name="28" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>18/07/2021<select name="29" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>25/07/2021<select name="30" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>01/08/2021<select name="31" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>08/08/2021<select name="32" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>15/08/2021<select name="33" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>22/08/2021<select name="34" class="christophe">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe" selected="">christophe</option>
</select>
</td><td>29/08/2021<select name="35" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>05/09/2021<select name="36" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>12/09/2021<select name="37" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>19/09/2021<select name="38" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>26/09/2021<select name="39" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>03/10/2021<select name="40" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>10/10/2021<select name="41" class="christophe">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe" selected="">christophe</option>
</select>
</td><td>17/10/2021<select name="42" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>24/10/2021<select name="43" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>31/10/2021<select name="44" class="david">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david" selected="">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>07/11/2021<select name="45" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>14/11/2021<select name="46" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>21/11/2021<select name="47" class="vincent">
<option value="personne">personne</option>
<option value="vincent" selected="">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>28/11/2021<select name="48" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr><tr><td>05/12/2021<select name="49" class="christophe">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe" selected="">christophe</option>
</select>
</td><td>12/12/2021<select name="50" class="personne">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe">christophe</option>
</select>
</td><td>19/12/2021<select name="51" class="christophe">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas">thomas</option>
<option value="christophe" selected="">christophe</option>
</select>
</td><td>26/12/2021<select name="52" class="thomas">
<option value="personne">personne</option>
<option value="vincent">vincent</option>
<option value="david">david</option>
<option value="thomas" selected="">thomas</option>
<option value="christophe">christophe</option>
</select>
</td></tr></tbody></table><div>
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
<p>&nbsp;</p>
</div>


</body></html>