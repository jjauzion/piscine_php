#!/usr/bin/php
<?PHP

include_once "Cuirasse_imperial.class.php";
include_once "Factory.class.php";
include_once "Lance_navale.class.php";
include_once "ShipFactory.class.php";
include_once "Starship.class.php";
include_once "TLibft.class.php";
include_once "Weapon.class.php";
include_once "WeaponFactory.class.php";
include_once "Map.class.php";

print(Starship::doc());
$shipfacto = new ShipFactory();
$weaponfacto = new WeaponFactory();

$weaponfacto->absorb_pattern(new Lance_navale());
$weapon = array ($weaponfacto->create('Lance_navale'), $weaponfacto->create('Lance_navale'));
$shipfacto->absorb_pattern(new Cuirasse_imperial($weapon));

$cuirasse1 = $shipfacto->create('Cuirasse_imperial');
$cuirasse2 = $shipfacto->create('Cuirasse_imperial');

$map = new Map();
$map->init_map(30, 30);
$map->add_object($cuirasse1->getBox(), array('x' => 10, 'y' => 10), 2);
print( $map . PHP_EOL);

?>
