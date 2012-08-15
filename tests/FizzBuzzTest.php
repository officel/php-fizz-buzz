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
        );

        // set rules
        $game->setting($rules);
        $current_rules = $game->showSetting();

        $this->assertNotEmpty($current_rules);

        // Play now.
        $result = $game->play();

        $this->assertNotEmpty($result);
    }


    // TODO make test other rules.
    // TODO for example, min-max 10-50
    // TODO for example, vertical
    // TODO To check whether the output results are correct

    /**
     * play game normal
     *
     * @return void
     */
    public function testPlayGameNormal()
    {
        // Let's Play the game.
        $game  = new FizzBuzz();

        // how to play
        $rules = array(
            'min'  => '1',     // 
            'max'  => '20',    // 
            'type' => 'array', // return array plz. coz assertion.
        );

        // set rules
        $game->setting($rules);

        // Let's Play
        $result = $game->play();

        $this->assertEquals($result[0]  ,1);
        $this->assertEquals($result[1]  ,2);
        $this->assertEquals($result[2]  ,'Fizz');
        $this->assertEquals($result[3]  ,4);
        $this->assertEquals($result[4]  ,'Buzz');
        $this->assertEquals($result[5]  ,'Fizz');
        $this->assertEquals($result[6]  ,7);
        $this->assertEquals($result[7]  ,8);
        $this->assertEquals($result[8]  ,'Fizz');
        $this->assertEquals($result[9]  ,'Buzz');
        $this->assertEquals($result[10] ,11);
        $this->assertEquals($result[11] ,'Fizz');
        $this->assertEquals($result[12] ,13);
        $this->assertEquals($result[13] ,14);
        $this->assertEquals($result[14] ,'FizzBuzz');
        $this->assertEquals($result[15] ,16);
        $this->assertEquals($result[16] ,17);
        $this->assertEquals($result[17] ,'Fizz');
        $this->assertEquals($result[18] ,19);
        $this->assertEquals($result[19] ,'Buzz');
        // Yes,Success!
    }


    /**
     * auto recover settings
     *
     * This library has powerful recovery system.
     *
     * @return void
     */
    public function testAutoRecover()
    {
        // Let's Play the game.
        $game  = new FizzBuzz();
        // how to play
        $rules = array(
            'min'  => '1',    // 
            'max'  => '20',    // 
            'type' => 'array', // 
        );
        // set rules
        $game->setting($rules);
        $game->showSetting();
        $result = $game->play();

        // var_dump($result);
        // echo $result[0];

    }
}


