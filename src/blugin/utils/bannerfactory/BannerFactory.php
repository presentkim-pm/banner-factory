<?php

/*
 *
 *  ____  _             _         _____
 * | __ )| |_   _  __ _(_)_ __   |_   _|__  __ _ _ __ ___
 * |  _ \| | | | |/ _` | | '_ \    | |/ _ \/ _` | '_ ` _ \
 * | |_) | | |_| | (_| | | | | |   | |  __/ (_| | | | | | |
 * |____/|_|\__,_|\__, |_|_| |_|   |_|\___|\__,_|_| |_| |_|
 *                |___/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the MIT License.
 *
 * @author  Blugin team
 * @link    https://github.com/Blugin
 * @license https://www.gnu.org/licenses/mit MIT License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 */

declare(strict_types=1);

namespace blugin\utils\bannerfactory;

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\nbt\JsonNbtParser;

class BannerFactory{
    public const LEVEL_BASE = 0;
    public const LEVEL_PRIMARY = 1;
    public const LEVEL_SECOND = 2;

    public const COLOR_BLACK = 0;
    public const COLOR_RED = 1;
    public const COLOR_GREEN = 2;
    public const COLOR_BROWN = 3;
    public const COLOR_BLUE = 4;
    public const COLOR_PURPLE = 5;
    public const COLOR_CYAN = 6;
    public const COLOR_LIGHT_GRAY = 7;
    public const COLOR_GRAY = 8;
    public const COLOR_PINK = 9;
    public const COLOR_LIME = 10;
    public const COLOR_YELLOW = 11;
    public const COLOR_LIGHT_BLUE = 12;
    public const COLOR_MAGENTA = 13;
    public const COLOR_ORANGE = 14;
    public const COLOR_WHITE = 15;

    /** @var string[][] pattern name => pattern data */
    protected static $patterns = null;

    /** @var Item[] hash => cached item */
    protected static $cache = [];

    /**
     * @param string $patternName
     * @param int[]  $colors color level => color number
     *
     * @return Item
     *
     * @throws \Exception
     */
    public static function make(string $patternName, array $colors) : Item{
        self::registerDefaults();

        if(!isset($colors[self::LEVEL_BASE]) || !isset($colors[self::LEVEL_PRIMARY]))
            throw new \InvalidArgumentException("colors paramter must includes COLOR_BASE and COLOR_PRIMARY");

        if(($patternDatas = self::getPattern($patternName)) === null)
            throw new \InvalidArgumentException("$patternName is invalid pattern name");

        if(isset(self::$cache[$hash = $patternName . ":" . implode(":", $colors)]))
            return clone self::$cache[$hash];

        $patterns = [];
        foreach($patternDatas as $patternData){
            if(!preg_match("/([a-z]*)([0-9]*)/", $patternData, $matches))
                throw new \RuntimeException("Invalid pattern data : $patternData");

            [, $pattern, $colorLevel] = $matches;
            $patterns[] = sprintf("{Pattern:%s,Color:%s}", $pattern, $colors[(int) $colorLevel] ?? $colors[self::LEVEL_PRIMARY]);
        }
        $item = ItemFactory::get(ItemIds::BANNER, $colors[self::LEVEL_BASE]);
        $item->setNamedTag(JsonNbtParser::parseJson(sprintf("{Patterns:[%s]}", implode(",", $patterns))));
        return self::$cache[$hash] = $item;
    }

    /** @param string[] $patternData */
    public static function registerPattern(string $patternName, array $patternData) : void{
        self::registerDefaults();
        self::$patterns[$patternName] = $patternData;
    }

    /** @return string[]|null */
    public static function getPattern(string $patternName) : ?array{
        self::registerDefaults();
        return self::$patterns[$patternName] ?? null;
    }

    public static function registerDefaults() : void{
        if(self::$patterns !== null)
            return;

        self::$patterns = [
        ];
    }
}