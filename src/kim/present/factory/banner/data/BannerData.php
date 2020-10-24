<?php

/*
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
use pocketmine\nbt\tag\ListTag;

class BannerData implements \JsonSerializable, NbtSerializable, BannerConsts{
    /** @var PatternData[] */
    protected $patterns = [];

    /** @param PatternData[] $patterns */
    public function __construct(array $patterns){
        $this->patterns = $patterns;
    }

    /** @return PatternData[] */
    public function getPatterns() : array{
        return $this->patterns;
    }

    /** @param PatternData[] $patterns */
    public function setPatterns(array $patterns) : void{
        $this->patterns = $patterns;
    }

    public function nbtSerialize(array $colors) : CompoundTag{
        $patterns = [];
        foreach($this->patterns as $pattern){
            $patterns[] = $pattern->nbtSerialize($colors);
        }
        return new CompoundTag("", [new ListTag(self::TAG_PATTERNS, $patterns)]);
    }

    public function jsonSerialize(){
        $patterns = [];
        foreach($this->patterns as $pattern){
            $patterns[] = $pattern->jsonSerialize();
        }
        return $patterns;
    }

    public static function jsonDeserialize($json) : self{
        if(!is_array($json))
            throw new \RuntimeException("Invalid banner patterns data : $json");

        $patterns = [];
        foreach($json as $patternJson){
            $patterns[] = PatternData::jsonDeserialize($patternJson);
        }
        return new self($patterns);
    }
}