<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'basicTarif.php';
include 'hoursTarif.php';
include 'dailyTarif.php';
include 'studentTarif.php';

$tarif = new basicTarif();
echo "Тариф Базовый. Рассчитать 5 км, 1 час, 20 лет, без доп. услуг<br>Итоговая цена: ";
echo $tarif->calc(5, 1, 50);

$tarif = new hoursTarif();
echo "<br/><br/>Тариф Часовой. Рассчитать 50 км, 120 минут, 20 лет, доп. водитель.<br>Итоговая цена: ";
echo $tarif->calc(20, 120, 40, 'add');

$tarif = new dailyTarif();
echo "<br/><br/>Тариф Суточный. Рассчитать 180 км, 48 часов, 20 лет, доп.водитель.<br>Итоговая цена: ";
echo $tarif->calc(180, 48, 20, 'add');

$tarif = new studentTarif();
echo "<br/><br/>Тариф Студенческий. Рассчитать 30 км, 50 минут, 20 лет, gps.<br>Итоговая цена: ";
echo $tarif->calc(30, 50, 20, 'gps');
