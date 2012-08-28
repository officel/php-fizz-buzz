<?php
/**
 * Fizz Buzz Library Runner
 *
 * PHP version 5.3
 *
 * @category  Library
 * @package   Library
 * @author    Y.Nishimura <nishimuray@gmail.com>
 * @copyright 2012 - Office L
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @link      http://github.com/officel/php-fizz-buzz.git
 */
error_reporting(E_NOTICE|E_STRICT);

require 'FizzBuzz.php';

$game = new FizzBuzz();
var_dump($game->showSetting());
var_dump($game->play());

echo PHP_EOL , "-----" , PHP_EOL;

$params = array();
$params['min']    = 10;
$params['max']    = 30;
$params['sep']    = PHP_EOL; // vertical output
$params['debug']  = true;

$game->setting($params);
var_dump($game->showSetting());
var_dump($game->play());

echo PHP_EOL , "-----" , PHP_EOL;

