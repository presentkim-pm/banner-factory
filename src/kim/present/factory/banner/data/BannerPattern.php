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

use pocketmine\block\utils\BannerPatternLayer;
use pocketmine\block\utils\BannerPatternType;
use pocketmine\data\bedrock\BannerPatternTypeIdMap;
use RuntimeException;

class BannerPattern{
    public function __construct(public BannerPatternType $type, public int $layer){ }

    public function toBannerPatternLayer(BannerColorSet $colorSet) : BannerPatternLayer{
        return new BannerPatternLayer($this->type, $colorSet->colors[$this->layer] ?? $colorSet->colors[0]);
    }

    public function toHash() : string{
        return BannerPatternTypeIdMap::getInstance()->toId($this->type) . $this->layer;
    }

    public static function fromHash($json) : self{
        if(!is_string($json) || !preg_match("/([a-z]*)([0-9]*)/", $json, $matches))
            throw new RuntimeException("Invalid banner pattern data : $json");

        [, $patternId, $colorLayer] = $matches;
        return new self(BannerPatternTypeIdMap::getInstance()->fromId($patternId), (int) $colorLayer);
    }
}