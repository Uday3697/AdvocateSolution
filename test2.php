<?php
$ts=time();
echo '<br/>';
echo date('H:i:s',$ts) ;
$ts=$ts+300;
echo '<br/>';
echo date('H:i:s',$ts) ;
echo '</br>';
echo $ts;

?>