<?php

namespace Factory\DayThree;

use Entity\DayThree\Item;

class ItemFactory {
    public function create(string $type): ?Item
    {
        // only type from "a" to "z"  and "A" to "Z" are allowed
        if (!preg_match('/^[a-zA-Z]+$/', $type)) {
            return null;
        }

        // 'a' to 'z' is 1 to 26, 'A' to 'Z' is 27 to 52
        $priority = ord($type);

        if ($priority > 96) {
            $priority -= 96;
        } else {
            $priority -= 38;
        }

        return new Item($type, $priority);
    }
}
