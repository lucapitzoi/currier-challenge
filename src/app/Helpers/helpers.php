<?php

/**
 * Copyright Sindria Inc.
 *
 * helpers.php
 *
 */


/**
 * Global date format
 *
 * @param $field
 * @return false|string
 */
function format_date($field) {
    return date_format(date_create($field),"d/m/Y");
}



/**
 * Generate a unique code
 *
 * @param $limit
 * @return bool|string
 */
function unique_code($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}


/**
 * Get current app version
 *
 * @return mixed
 */
function app_version() {
    return env('APP_VERSION');
}
