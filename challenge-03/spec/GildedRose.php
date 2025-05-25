<?php

require_once "Item.php";

class GildedRose {
    private $items;

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Aged Brie':
                    $this->updateAgedBrie($item);
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->updateBackstagePass($item);
                    break;

                case 'Sulfuras, Hand of Ragnaros':
                    // Legendary - do nothing
                    break;

                default:
                    if (strpos($item->name, 'Conjured') !== false) {
                        $this->updateConjured($item);
                    } else {
                        $this->updateNormalItem($item);
                    }
                    break;
            }
        }
    }

    private function updateNormalItem($item) {
        $this->decreaseQuality($item);
        $item->sell_in--;

        if ($item->sell_in < 0) {
            $this->decreaseQuality($item);
        }
    }

    private function updateConjured($item) {
        $this->decreaseQuality($item, 2);
        $item->sell_in--;

        if ($item->sell_in < 0) {
            $this->decreaseQuality($item, 2);
        }
    }

    private function updateAgedBrie($item) {
        $this->increaseQuality($item);
        $item->sell_in--;

        if ($item->sell_in < 0) {
            $this->increaseQuality($item);
        }
    }

    private function updateBackstagePass($item) {
        if ($item->sell_in > 10) {
            $this->increaseQuality($item);
        } elseif ($item->sell_in > 5) {
            $this->increaseQuality($item, 2);
        } elseif ($item->sell_in > 0) {
            $this->increaseQuality($item, 3);
        } else {
            $item->quality = 0;
        }

        $item->sell_in--;
    }

    private function decreaseQuality($item, $amount = 1) {
        $item->quality = max(0, $item->quality - $amount);
    }

    private function increaseQuality($item, $amount = 1) {
        $item->quality = min(50, $item->quality + $amount);
    }
}
