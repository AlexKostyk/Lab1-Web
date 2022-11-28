<?php
$x = $_GET['x'];
$y = $_GET['y'];
$r = $_GET['r'];
$result = onHit($x, $y, $r);
echo $result;

function onHit($x, $y, $r){
    if ($x > 0 && $y > 0 && ($x + 2 * $y) <= $r){
        return true;
    } else if ($x < 0 && $y > 0 && ($x*$x + $y*$y) <= $r ){
        return true;
    } else if ($x < 0 && $y < 0 && $x >= -$r && $y >= -$r){
        return true;
    } else if ($x <= $r && $x >= $r && $y == 0){
        return true;
    } else if ($y <= $r && $y >= $r && $x == 0){
        return true;
    }
    return false;
}