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

$map = new Map(30, 30);
$meteor1->setCenter_position(9, 9);
$map->add_object($meteor1, 3);

$cuirasse2->setCenter_position(21, 8);
$cuirasse2->setDirection(0, -1);
$map->add_object($cuirasse2, 2);
echo "direction ->";
print_r($cuirasse2->getDirection());
sleep(1);
print( $map . PHP_EOL);
$map->move_obj($cuirasse2, $map, ['x' => 21, 'y' => 15]);
print( $map . PHP_EOL);

$cuirasse1->setCenter_position(4, 4);
$map->add_object($cuirasse1, 2);
print( $map . PHP_EOL);

echo "center ->";
print_r($cuirasse1->getCenter_position());
echo "direction ->";
print_r($cuirasse1->getDirection());
$map->move_obj($cuirasse1, $map, ['x' => 20, 'y' => 22]);
print( $map . PHP_EOL);
echo "center ->";
print_r($cuirasse1->getCenter_position());
echo "direction ->";
print_r($cuirasse1->getDirection());

$map->move_obj($cuirasse1, $map, ['x' => 20, 'y' => 9]);
print( $map . PHP_EOL);
echo "center ->";
print_r($cuirasse1->getCenter_position());
echo "direction ->";
print_r($cuirasse1->getDirection());
 
?>
