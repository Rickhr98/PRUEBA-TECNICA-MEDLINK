<?php

require_once "spec/Item.php";
require_once "spec/GildedRose.php";

$items = [
    new Item("Aged Brie", 2, 0),
    new Item("Elixir of the Mongoose", 5, 7),
    new Item("Sulfuras, Hand of Ragnaros", 0, 80),
    new Item("Backstage passes to a TAFKAL80ETC concert", 15, 20),
    new Item("Conjured Mana Cake", 3, 6)
];

$gildedRose = new GildedRose($items);

echo "---- Day 0 ----\n";
foreach ($items as $item) {
    echo $item . "\n";
}

$days = 5;

for ($i = 1; $i <= $days; $i++) {
    echo "---- Day $i ----\n";
    $gildedRose->updateQuality();
    foreach ($items as $item) {
        echo $item . "\n";
    }
}
