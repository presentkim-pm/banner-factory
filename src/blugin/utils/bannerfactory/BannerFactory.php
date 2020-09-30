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

use pocketmine\item\Banner;
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

    public const PATTERN_EMPTY = "empty";

    public const PATTERN_NUM_0 = "num0";
    public const PATTERN_NUM_1 = "num1";
    public const PATTERN_NUM_2 = "num2";
    public const PATTERN_NUM_3 = "num3";
    public const PATTERN_NUM_4 = "num4";
    public const PATTERN_NUM_5 = "num5";
    public const PATTERN_NUM_6 = "num6";
    public const PATTERN_NUM_7 = "num7";
    public const PATTERN_NUM_8 = "num8";
    public const PATTERN_NUM_9 = "num9";

    public const PATTERN_ARROW_L = "arrow_left";
    public const PATTERN_ARROW_R = "arrow_right";
    public const PATTERN_ARROW_U = "arrow_up";
    public const PATTERN_ARROW_D = "arrow_down";

    public const PATTERN_MAP_NUM = [
        self::PATTERN_NUM_0,
        self::PATTERN_NUM_1,
        self::PATTERN_NUM_2,
        self::PATTERN_NUM_3,
        self::PATTERN_NUM_4,
        self::PATTERN_NUM_5,
        self::PATTERN_NUM_6,
        self::PATTERN_NUM_7,
        self::PATTERN_NUM_8,
        self::PATTERN_NUM_9
    ];

    /** @var string[][] pattern name => pattern data */
    protected static $patterns = null;

    /** @var Banner[] hash => cached banner item */
    protected static $cache = [];

    /**
     * @param string $patternName
     * @param int[]  $colors color level => color number
     *
     * @return Banner
     *
     * @throws \Exception
     */
    public static function make(string $patternName, array $colors) : Banner{
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
        self::$cache[$hash] = new Banner($colors[self::LEVEL_BASE]);
        self::$cache[$hash]->setNamedTag(JsonNbtParser::parseJson(sprintf("{Patterns:[%s]}", implode(",", $patterns))));
        return clone self::$cache[$hash];
    }

    /** @param string[] $patternData */
    public static function registerPattern(string $patternName, array $patternData) : void{
        self::registerDefaults();

        //Remove caches when overwrite pattern
        if(isset(self::$patterns[$patternName])){
            foreach(array_keys(self::$cache) as $hash){
                if(strpos($hash, "$patternName:") === 0){
                    unset(self::$cache[$hash]);
                }
            }
        }
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
            self::PATTERN_EMPTY => [],
            self::PATTERN_NUM_0 => ["ls1", "rs1", "ts1", "bs1", "bo0"],
            self::PATTERN_NUM_1 => ["cs1", "tl1", "cbo0", "bs1", "bo0"],
            self::PATTERN_NUM_2 => ["ts1", "mr0", "bs1", "dls1", "bo0"],
            self::PATTERN_NUM_3 => ["bs1", "ms1", "ts1", "cbo0", "rs1", "bo0"],
            self::PATTERN_NUM_4 => ["ls1", "hhb1", "bs0", "rs1", "bo0"],
            self::PATTERN_NUM_5 => ["bs1", "mr0", "ts1", "drs1", "bo0"],
            self::PATTERN_NUM_6 => ["bs1", "rs1", "hh0", "ms1", "ls1", "bo0"],
            self::PATTERN_NUM_7 => ["dls1", "ts1", "bo0"],
            self::PATTERN_NUM_8 => ["ts1", "ls1", "ms1", "bs1", "rs1", "bo0"],
            self::PATTERN_NUM_9 => ["ls1", "hhb0", "ms1", "ts1", "rs1", "bo0"],

            self::PATTERN_ARROW_R => ["cr1", "ms1", "cbo0", "vhr0", "mc1"],
            self::PATTERN_ARROW_L => ["cr1", "ms1", "cbo0", "vh0", "mc1"],

            self::PATTERN_ARROW_U => ["ts1", "cs1", "cbo0"],
            self::PATTERN_ARROW_D => ["bs1", "cs1", "cbo0"]
        ];
    }
}