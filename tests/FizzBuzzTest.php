<?php
/**
 * PHP Fizz Buzz Question Library Test
 *
 * PHP version 5.3
 *
 * @category  Test
 * @package   Library
 * @author    Y.Nishimura <nishimuray@gmail.com>
 * @copyright 2012 - Office L
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @link      http://github.com/officel/php-fizz-buzz.git
 */
require_once('FizzBuzz.php');
/**
 * PHP Fizz Buzz Question Library Test
 *
 * maybe I want test case create object( new Hoge() ).
 * so not use function setUp()
 *
 * @category  Test
 * @package   Library
 * @author    Y.Nishimura <nishimuray@gmail.com>
 * @copyright 2012 - Office L
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @link      http://github.com/officel/php-fizz-buzz.git
 */
class FizzBuzzTest extends PHPUnit_Framework_TestCase
{


    /**
     * test init
     *
     * @return void
     */
    public function testInit() {
        $game = new FizzBuzz();
        // Yes! I make it.
        $this->assertNotEmpty($game);
    }

    /**
     * test play
     *
     * @return void
     */
    public function testPlay() {
        // Let's Play the game.
        $game  = new FizzBuzz();
        // how to play
        $rules = array(
            'echo' => false,  // not echo, return string
        );
        // set rules
        $game->setting($rules);
        // Play now.
        $result = $game->play();

        $this->assertNotEmpty($result);
    }


    // TODO make test other rules.
    // TODO for example, min-max 10-50
    // TODO for example, vertical
    // TODO To check whether the output results are correct

    /**
     * auto recover settings
     *
     * @return void
     */
    public function testAutoRecover()
    {
        // Let's Play the game.
        $game  = new FizzBuzz();
        // how to play
        $rules = array(
            'echo' => false,  // not echo, return string
            'min'  => 'A',    // 
        );
        // set rules
        $game->setting($rules);
    }
}


