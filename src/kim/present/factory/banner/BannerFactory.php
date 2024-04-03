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

namespace kim\present\factory\banner;

use kim\present\factory\banner\data\BannerColorSet;
use kim\present\factory\banner\data\BannerPattern;
use pocketmine\item\Banner;
use pocketmine\item\VanillaItems;
use pocketmine\utils\SingletonTrait;

final class BannerFactory{
    use SingletonTrait;

    /** @var BannerPattern[][] banner name => banner patterns */
    private array $bannerPatterns = [];

    /** @var Banner[] hash => cached banner item */
    private array $cache = [];

    private function __construct(){
        foreach(DefaultPatternIds::DEFAULTS_DATA_MAP as $name => $patterns){
            $this->registerBanner($name, array_map(fn(string $hash) => BannerPattern::fromHash($hash), $patterns));
        }
    }

    /**
     * Make banner item with banner name and banner color set
     *   if the banner name is already registered in the banner factory.
     *   Otherwise, returns null.
     */
    public function getBannerItem(string $bannerName, BannerColorSet $colorSet) : ?Banner{
        $hash = $bannerName . ":" . $colorSet->hash();

        $bannerData = $this->getBanner($bannerName);
        if($bannerData === null){
            return null;
        }

        $bannerItem = VanillaItems::BANNER()->setColor($colorSet->colors[0]);
        $bannerItem->setPatterns(array_map(fn(BannerPattern $pattern) => $pattern->toBannerPatternLayer($colorSet),
            $bannerData));

        $this->cache[$hash] = $bannerItem;
        return clone $this->cache[$hash];
    }

    /**
     * @param string          $bannerName
     * @param BannerPattern[] $patterns
     */
    public function registerBanner(string $bannerName, array $patterns) : void{
        if(isset($this->bannerPatterns[$bannerName])){
            foreach(array_keys($this->cache) as $hash){
                if(str_starts_with($hash, "$bannerName:")){
                    unset($this->cache[$hash]);
                }
            }
        }
        $this->bannerPatterns[$bannerName] = $patterns;
    }

    /**
     * @param string $bannerName
     *
     * @return BannerPattern[]|null
     */
    public function getBanner(string $bannerName) : ?array{
        return $this->bannerPatterns[$bannerName] ?? null;
    }
}
