<?php 
require_once('BDD/connexion_bdd.php');

$sold_Max_Semaine=300;
$span1 = $sold_Max_Semaine/5;
$span2 = $span1*2; 
$span3 = $span1*3;
$span4 = $span1*4;
$span5 = $sold_Max_Semaine;


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
            <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
        </div>
        <div class="bar ">
            <div class="title">Mardi</div>
            <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
        </div>
        <div class="bar ">
            <div class="title">Mercredi</div>
            <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
        </div>
        <div class="bar ">
            <div class="title">Jeudi</div>
            <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
        </div>
        <div class="bar">
            <div class="title">Vendredi</div>
            <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
        </div>
        <div class="bar ">
            <div class="title">Samedi</div>
            <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
        </div>
        <div class="bar">
            <div class="title">Dimanche</div>
            <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
        </div>
    </div>
');
?>