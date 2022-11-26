<?php
$start = microtime(true);
$result = "N";
$x = $_POST['x'];
$y = $_POST['y'];
$r = $_POST['r'];

$finish = microtime(true);
$time = number_format($finish-$start,6) * 1000;

echo date('H:i:s'),$r,$result,$x,$y,$time;
