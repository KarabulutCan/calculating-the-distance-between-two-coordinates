<h2 style="text-align: center;">  CALCULATING THE DISTANCE OF THE DISTANCE BETWEEN TWO COORDINATES
</h2>

<?php

function uzaklikHesapla($x1, $y1, $x2, $y2){
  $theta = $y1-$y2;
  $uzaklik = (sin(deg2rad($x1))) * sin(deg2rad($x2)) + (cos(deg2rad($x1)) * cos(deg2rad($x2))
  * cos(deg2rad($theta)));
  $uzaklik= acos($uzaklik);
  $uzaklik= rad2deg($uzaklik);

  $sonuc['mil'] = $uzaklik* 60 * 1.1515;
  $sonuc['kilometre'] = $sonuc['mil']*1.60;
  $sonuc['metre'] = $sonuc['kilometre']*1000;
  return $sonuc;

}
echo '<pre>';
echo '<h4 style="color: red;">Calculated by entering a manual value.</h4>';
var_dump(uzaklikHesapla(39,32,40.12,32.71));

?>

<?php
echo '<h4 style="color: red;"> The value "distance" was taken from the URL with JSON.
</h4>';

    $baglanti = 'http://router.project-osrm.org/route/v1/driving/32.000040,39.000050;40.120000,32.710000?overview=false';
    $icerik = file_get_contents($baglanti);
    $geridonus = json_decode($icerik);
    print_r($geridonus->waypoints[0]->location);
    print_r($geridonus->waypoints[1]->location);
    echo '<p><b>Mesafe :</p></b>';
    print(($geridonus->routes[0]->distance)/1000);

?>
