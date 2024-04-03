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
 * @author       PresentKim (debe3721@gmail.com)
 * @link         https://github.com/PresentKim
 * @license      https://opensource.org/licenses/MIT MIT License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 *
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace kim\present\factory\banner\data;

use pocketmine\block\utils\DyeColor;
use pocketmine\data\bedrock\DyeColorIdMap;

class BannerColorSet{

    /** @param DyeColor[] $colors */
    public array $colors;

    public function __construct(DyeColor $baseColor, DyeColor ...$extraColors){
        $this->colors = [$baseColor, ...$extraColors];
    }

    /** @internal Banner color set hash for caching banners */
    public function hash() : string{
        $dyeIdMap = DyeColorIdMap::getInstance();
        return implode("", array_map(
                static fn(DyeColor $color) => $dyeIdMap->toId($color),
                $this->colors)
        );
    }

    public static function fromHash(string $hash) : self{
        $dyeIdMap = DyeColorIdMap::getInstance();
        return new self(...array_map(
            static fn(string $id) => $dyeIdMap->fromId((int) $id) ?? DyeColor::WHITE(),
            str_split($hash)
        ));
    }
}
