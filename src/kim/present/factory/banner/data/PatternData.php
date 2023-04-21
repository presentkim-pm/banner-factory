<?php

/**
 *
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the MIT License. see <https://opensource.org/licenses/MIT>.
 *
 * @author  PresentKim (debe3721@gmail.com)
 * @link    https://github.com/PresentKim
 * @license https://opensource.org/licenses/MIT MIT License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 */

declare(strict_types=1);

namespace kim\present\factory\banner\data;

use kim\present\factory\banner\BannerConsts;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;

class PatternData implements \JsonSerializable, NbtSerializable, BannerConsts{
    /** @var string */
    protected $name;

    /** @var int */
    protected $colorLevel;

    public function __construct(string $name, int $color){
        $this->setName($name);
        $this->setColorLevel($color);
    }

    public function getName() : string{
        return $this->name;
    }

    public function setName(string $name) : void{
        $this->name = $name;
    }

    public function getColorLevel() : int{
        return $this->colorLevel;
    }

    public function setColorLevel(int $color) : void{
        $this->colorLevel = $color;
    }

    public function nbtSerialize(array $colors) : CompoundTag{
        return new CompoundTag("", [
            new StringTag(self::TAG_PATTERN_NAME, $this->getName()),
            new IntTag(self::TAG_PATTERN_COLOR, $colors[$this->getColorLevel()] ?? self::COLOR_BLACK),
        ]);
    }

    public function jsonSerialize(){
        return $this->getName() . $this->getColorLevel();
    }

    public static function jsonDeserialize($json) : self{
        if(!is_string($json) || !preg_match("/([a-z]*)([0-9]*)/", $json, $matches))
            throw new \RuntimeException("Invalid banner pattern data : $json");

        [, $name, $colorLevel] = $matches;
        return new self($name, (int) $colorLevel);
    }
}