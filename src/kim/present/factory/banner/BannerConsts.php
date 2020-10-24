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

namespace kim\present\factory\banner;

interface BannerConsts{
    /** banner patterns */
    public const PATTERN_BRICKS = "bri";
    public const PATTERN_BORDER = "bo";
    public const PATTERN_CIRCLE = "mc";
    public const PATTERN_CREEPER = "cre";
    public const PATTERN_CROSS = "cr";
    public const PATTERN_CURLY_BORDER = "cbo";
    public const PATTERN_DIAGONAL_LEFT = "ld";
    public const PATTERN_DIAGONAL_RIGHT = "rd";
    public const PATTERN_DIAGONAL_UP_LEFT = "lud";
    public const PATTERN_DIAGONAL_UP_RIGHT = "rud";
    public const PATTERN_FLOWER = "flo";
    public const PATTERN_GRADIENT = "gra";
    public const PATTERN_GRADIENT_UP = "gru";
    public const PATTERN_HALF_HORIZONTAL = "hh";
    public const PATTERN_HALF_HORIZONTAL_BOTTOM = "hhb";
    public const PATTERN_HALF_VERTICAL = "vh";
    public const PATTERN_HALF_VERTICAL_RIGHT = "vhr";
    public const PATTERN_MOJANG = "moj";
    public const PATTERN_PIGLIN = "pgl"; //TODO: 확인해보기
    public const PATTERN_MIDDLE_RHOMBUS = "mr";
    public const PATTERN_SKULL = "sku";
    public const PATTERN_SMALL_STRIPES = "ss";
    public const PATTERN_SQUARE_BOTTOM_LEFT = "bl";
    public const PATTERN_SQUARE_BOTTOM_RIGHT = "br";
    public const PATTERN_SQUARE_TOP_LEFT = "tl";
    public const PATTERN_SQUARE_TOP_RIGHT = "tr";
    public const PATTERN_STRAIGHT_CROSS = "sc";
    public const PATTERN_STRIPE_BOTTOM_ = "bs";
    public const PATTERN_STRIPE_CENTER = "cs";
    public const PATTERN_STRIPE_DOWNLEFT = "dls";
    public const PATTERN_STRIPE_DOWNRIGHT = "drs";
    public const PATTERN_STRIPE_LEFT = "ls";
    public const PATTERN_STRIPE_MIDDLE = "ms";
    public const PATTERN_STRIPE_RIGHT = "rs";
    public const PATTERN_STRIPE_TOP = "ts";
    public const PATTERN_TRIANGLE_BOTTOM = "bt";
    public const PATTERN_TRIANGLE_TOP = "tt";
    public const PATTERN_TRIANGLES_BOTTOM_TRIANGLE = "bts";
    public const PATTERN_TRIANGLES_TOP_TRIANGLE = "tts";
    public const PATTERN_LIST = [
        self::PATTERN_BRICKS,
        self::PATTERN_BORDER,
        self::PATTERN_CIRCLE,
        self::PATTERN_CREEPER,
        self::PATTERN_CROSS,
        self::PATTERN_CURLY_BORDER,
        self::PATTERN_DIAGONAL_LEFT,
        self::PATTERN_DIAGONAL_RIGHT,
        self::PATTERN_DIAGONAL_UP_LEFT,
        self::PATTERN_DIAGONAL_UP_RIGHT,
        self::PATTERN_FLOWER,
        self::PATTERN_GRADIENT,
        self::PATTERN_GRADIENT_UP,
        self::PATTERN_HALF_HORIZONTAL,
        self::PATTERN_HALF_HORIZONTAL_BOTTOM,
        self::PATTERN_HALF_VERTICAL,
        self::PATTERN_HALF_VERTICAL_RIGHT,
        self::PATTERN_MOJANG,
        self::PATTERN_PIGLIN,
        self::PATTERN_MIDDLE_RHOMBUS,
        self::PATTERN_SKULL,
        self::PATTERN_SMALL_STRIPES,
        self::PATTERN_SQUARE_BOTTOM_LEFT,
        self::PATTERN_SQUARE_BOTTOM_RIGHT,
        self::PATTERN_SQUARE_TOP_LEFT,
        self::PATTERN_SQUARE_TOP_RIGHT,
        self::PATTERN_STRAIGHT_CROSS,
        self::PATTERN_STRIPE_BOTTOM_,
        self::PATTERN_STRIPE_CENTER,
        self::PATTERN_STRIPE_DOWNLEFT,
        self::PATTERN_STRIPE_DOWNRIGHT,
        self::PATTERN_STRIPE_LEFT,
        self::PATTERN_STRIPE_MIDDLE,
        self::PATTERN_STRIPE_RIGHT,
        self::PATTERN_STRIPE_TOP,
        self::PATTERN_TRIANGLE_BOTTOM,
        self::PATTERN_TRIANGLE_TOP,
        self::PATTERN_TRIANGLES_BOTTOM_TRIANGLE,
        self::PATTERN_TRIANGLES_TOP_TRIANGLE
    ];

    /** banner colors */
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
    public const COLOR_LIST = [
        self::COLOR_BLACK,
        self::COLOR_RED,
        self::COLOR_GREEN,
        self::COLOR_BROWN,
        self::COLOR_BLUE,
        self::COLOR_PURPLE,
        self::COLOR_CYAN,
        self::COLOR_LIGHT_GRAY,
        self::COLOR_GRAY,
        self::COLOR_PINK,
        self::COLOR_LIME,
        self::COLOR_YELLOW,
        self::COLOR_LIGHT_BLUE,
        self::COLOR_MAGENTA,
        self::COLOR_ORANGE,
        self::COLOR_WHITE
    ];

    /** NBT tag names */
    public const TAG_PATTERNS = "Patterns";
    public const TAG_PATTERN_COLOR = "Color";
    public const TAG_PATTERN_NAME = "Pattern";

    /** default color levels  */
    public const LEVEL_BASE = 0;
    public const LEVEL_PRIMARY = 1;
    public const LEVEL_SECOND = 2;
}