<?php

namespace App;

function getMaxMin($input)
{
    // arsort sorts associative array by values (descending)
    arsort($input);

    $min = min($input);
    $max = max($input);

    $max_arr = array();
    $min_arr = array();

    // Add any array element that matches $min
    foreach ($input as $key => $value) {
        if ($value == $min) {
            $min_arr += [$key => $value];
        }
    }

    // Add any array element that matches $max
    foreach ($input as $key => $value) {
        if ($value == $max) {
            $max_arr += [$key => $value];
        }
    }

    // Stringify and add title to arrays, then join together
    $max_arr = http_build_query($max_arr);
    $max_arr = "MAX MODULE/S: " . $max_arr;

    $min_arr = http_build_query($min_arr);
    $min_arr = "MIN MODULE/S: " . $min_arr;

    //Remove + symbol and replace with space, e.g. Web+Development
    $max_arr = str_replace('+', ' ', $max_arr);
    $min_arr = str_replace('+', ' ', $min_arr);

    //Add space either side of = sign
    $max_arr = str_replace('=', ' = ', $max_arr);
    $min_arr = str_replace('=', ' = ', $min_arr);

    //Add comma separation after each module + mark (if present)
    $max_arr = str_replace('&', ', ', $max_arr);
    $min_arr = str_replace('&', ', ', $min_arr);

    //Add new lines to end of max modules
    $max_arr = $max_arr . "\r\n";

    $minmax = $max_arr . $min_arr;

    return $minmax;
}
