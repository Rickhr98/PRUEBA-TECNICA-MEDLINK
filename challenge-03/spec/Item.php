<?php

class Item {
    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "name: {$this->name}, sell_in: {$this->sell_in}, quality: {$this->quality}";
    }
}