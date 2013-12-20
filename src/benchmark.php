<?php

/*
 * This file is part of felpado.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace felpado;

use felpado as f;

function benchmark() {
    $testTime = function ($function) {
        $start = microtime(true);
        $function();
        $time = microtime(true) - $start;

        return $time;
    };

    $testCompare = function($functions) use ($testTime) {
        $times = f\map($testTime, $functions);
        $faster = min($times);

        $percentage = function ($time) use ($faster) {
            return ['time' => $time, 'percentage' => $time / $faster];
        };
        $print = function ($time, $name) {
            return sprintf("%20s: %10f | %10f\n", $name, $time['time'], $time['percentage']);
        };

        f\map(f\compose('printf', $print), f\map($percentage, $times));
        echo "\n";
    };

    f\each($testCompare, benchmark_compares());
}

function benchmark_compares() {
    $number = 100;
    $array = range(1, $number);

    return [
        'map' => [
            'array_map' => function () use ($array) {
                array_map(function () {}, $array);
            },
            'f/map' => function () use ($array) {
                f\map(function () {}, $array);
            },
        ],
        'reduce' => [
            'array_reduce' => function () use ($array) {
                array_reduce($array, function ($a, $b) { return $a + $b; });
            },
            'f/reduce' => function () use ($array) {
                f\reduce(function ($a, $b) { return $a + $b; }, $array);
            },
        ],
        'filter' => [
            'array_filter' => function () use ($array) {
                array_filter($array, function ($v) { return $v % 2; });
            },
            'f/filter' => function () use ($array) {
                f\filter(function ($v) { return $v % 2; }, $array);
            },
        ],
        'rename_keys' => [
            'raw' => function () use ($array) {
                $result = array();
                foreach ($array as $key => $v) {
                    $result['a'.$key] = $v;
                }
            },
            'f\rename_keys' => function () use ($array) {
                f\rename_keys($array, f\map(function ($k) { return 'a'.$k; }, $array));
            },
        ]
    ];
}
