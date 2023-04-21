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

namespace kim\present\factory\banner;

interface DefaultPatternIds{
    /** empty banner pattern */
    public const PATTERN_EMPTY = "empty";

    /** number banner patterns */
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
    public const PATTERN_NUM_LIST = [
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

    /** number arrow patterns */
    public const PATTERN_ARROW_L = "arrow_left";
    public const PATTERN_ARROW_R = "arrow_right";
    public const PATTERN_ARROW_U = "arrow_up";
    public const PATTERN_ARROW_D = "arrow_down";
    public const PATTERN_ARROW_LIST = [
        self::PATTERN_ARROW_L,
        self::PATTERN_ARROW_R,
        self::PATTERN_ARROW_U,
        self::PATTERN_ARROW_D
    ];

    /**
     * @internal
     *
     * All default banner pattern data map.
     * Declared for default value registration.
     */
    public const DEFAULTS_DATA_MAP = [
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