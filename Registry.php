<?php

/**
 * @author Samrat Khan
 * @author Zorj
 * Oct 24, 2013 - 1:25:27 PM
 */
/** Directory Separator * */
if (!defined('DS')) {
    define('DS', '/');
}
/** Absolute path to the foo_ directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', $_SERVER['DOCUMENT_ROOT']);
}

/** Absolute Application directory Defining */
if (!defined('GOVERNOR')) {
    define('GOVERNOR', 'governor');
}

if (!defined('SCENE')) {
    define('SCENE', 'scene');
}

if (!defined('THEME')) {
    define('THEME', 'theme');
}

if (!defined('DRAWER')) {
    define('DRAWER', 'drawer');
}

if (!defined('SKETCH')) {
    define('SKETCH', 'sketch');
}
