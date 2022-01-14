<?php 
require_once('BDD/connexion_bdd.php');

//recupere en bdd la sold max de la semaine

//Sold max de la semaine
$sold_Max_Semaine=555;

//moyenne des solde de la semaine
$span1 = $sold_Max_Semaine/5;
$span2 = $span1*2; 
$span3 = $span1*3;
$span4 = $span1*4;
$span5 = $sold_Max_Semaine;

//Tableau des solds pour chaque jour de la semaine
$tableau_sold_semaine = array();
$tableau_sold_semaine['sold_Lundi'] = 500;
$tableau_sold_semaine['sold_Mardi'] = 466;
$tableau_sold_semaine['sold_Mercredi'] = 350;
$tableau_sold_semaine['sold_Jeudi'] = 244;
$tableau_sold_semaine['sold_Vendredi'] = 200;
$tableau_sold_semaine['sold_Samedi'] = 155;
$tableau_sold_semaine['sold_Dimanche'] = 120;


//Calcule les porcentage d'affichage
foreach ($tableau_sold_semaine as $cle => $valeur) 
{
   $slp = ($valeur/=$sold_Max_Semaine)*100;
   $slpa = round($slp, 2);
   $result[]=$slpa;
}
 
echo('

    <div class="custom-bar-chart">
        <ul class="y-axis">
            <li><span>'.$span5.'</span></li>
            <li><span>'.$span4.'</span></li>
            <li><span>'.$span3.'</span></li>
            <li><span>'.$span2.'</span></li>
            <li><span>'.$span1.'</span></li>
            <li><span>0</span></li>
        </ul>
        <div class="bar">
            <div class="title">Lundi</div>
            <div class="value tooltips" data-original-title="Solde de Lundi" data-toggle="tooltip" data-placement="top">'.$result[0].'%</div>
        </div>
        <div class="bar ">
            <div class="title">Mardi</div>
            <div class="value tooltips" data-original-title="Solde de Mardi" data-toggle="tooltip" data-placement="top">'.$result[1].'%</div>
        </div>
        <div class="bar ">
            <div class="title">Mercredi</div>
            <div class="value tooltips" data-original-title="Solde de Mercredi" data-toggle="tooltip" data-placement="top">'.$result[2].'%</div>
        </div>
        <div class="bar ">
            <div class="title">Jeudi</div>
            <div class="value tooltips" data-original-title="Solde de Jeudi" data-toggle="tooltip" data-placement="top">'.$result[3].'%</div>
        </div>
        <div class="bar">
            <div class="title">Vendredi</div>
            <div class="value tooltips" data-original-title="Solde de Vendredi" data-toggle="tooltip" data-placement="top">'.$result[4].'%</div>
        </div>
        <div class="bar ">
            <div class="title">Samedi</div>
            <div class="value tooltips" data-original-title="Solde de Samedi" data-toggle="tooltip" data-placement="top">'.$result[5].'%</div>
        </div>
        <div class="bar">
            <div class="title">Dimanche</div>
            <div class="value tooltips" data-original-title="Solde de Dimanche" data-toggle="tooltip" data-placement="top">'.$result[6].'%</div>
        </div>
    </div>
');
?>