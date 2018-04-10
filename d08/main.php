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
Map::$verbose = TRUE;
include_once "Objects.class.php";
include_once "Fleet.class.php";
Fleet::$verbose = TRUE;

print(Starship::doc());
$shipfacto = new ShipFactory();
$weaponfacto = new WeaponFactory();

$weaponfacto->absorb_pattern(new Lance_navale());
$weapon = array ($weaponfacto->create('Lance_navale'), $weaponfacto->create('Lance_navale'));
$shipfacto->absorb_pattern(new Cuirasse_imperial($weapon));
$shipfacto->absorb_pattern(new Objects());

$cuirasse1 = $shipfacto->create('Cuirasse_imperial');
$cuirasse2 = $shipfacto->create('Cuirasse_imperial');
$fleet1 = new Fleet("Imperial_fleet");
$fleet1->add_ship($cuirasse1);
$fleet1->add_ship($cuirasse2);

$meteor1 = $shipfacto->create('Objects');

$cuirasse1->setCenter_position(10, 10);
$meteor1->setCenter_position(20, 23);
$map = new Map(30, 30);
$map->add_object($cuirasse1, 2);
$map->add_object($meteor1, 3);
print( $map . PHP_EOL);

$map->move_obj($cuirasse1, $map, ['x' => 10, 'y' => 16]);
print( $map . PHP_EOL);

?>
