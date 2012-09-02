<?php
/**
 * Fizz Buzz Library
 *
 * This is Fizz Buzz Question Library. yes, It's a bit jest :)
 *
 * Which is also a practice,
 * PHP(Oh...), OOP, PHPCS, PEAR Coding Standard, PHPMD, PHPCPD, PHPUnit and
 * Jenkins w/z php-template so It's CI
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
/**
 * Fizz Buzz Library
 *
 * @category  Library
 * @package   Library
 * @author    Y.Nishimura <nishimuray@gmail.com>
 * @copyright 2012 - Office L
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @link      http://github.com/officel/php-fizz-buzz.git
 */
class FizzBuzz
{

    /** start no */
    private $_min   = 1;

    /** end no */
    private $_max   = 100;

    /** count. if true(set no) use */
    private $_count = false;

    /** say FIZZ no */
    private $_three = 3;

    /** say BUZZ no */
    private $_five  = 5;

    /** what's say? default Fizz */
    private $_fizz  = 'Fizz';

    /** what's say? default Buzz */
    private $_buzz  = 'Buzz';

    /** separator */
    private $_sep   = ',';

    /** output type ex:string,array */
    private $_type  = 'string';

    /** debug mode */
    private $_debug = false;

    /**
     * Constructor
     *
     * @param array $params setting parameters
     *
     * @return void
     */
    public function __construct($params = array())
    {
        $this->setting($params);
        $this->_logDebug(__CLASS__ . '::' . __FUNCTION__);
    }


    /**
     * rule setting
     *
     * set up conf.
     *
     * @param array $params Setting data array.key name unnecessary '_'
     *
     * @return void
     */
    public function setting($params = array())
    {
        if ( ! ( is_array($params) && count($params) ) ) {
            // maybe no data
            return;
        }

        // TODO: more more clean...and check values. :P
        foreach ($params as $key => $val) {
            $_key = '_' . $key;
            if (isset($this->$_key)) {
                $this->$_key = $val;
            }
        }

        $this->_checkSetting();

        $this->_logDebug(__CLASS__ . '::' . __FUNCTION__);
    }


    /**
     * play the game.
     *
     * @return void
     */
    public function play()
    {
        $this->_logDebug(__CLASS__ . '::' . __FUNCTION__);
        $ret   = array();  // answer

        $min   = $this->_min;   // start no
        $max   = $this->_max;   // end no
        $three = $this->_three;
        $five  = $this->_five;
        $fizz  = $this->_fizz;
        $buzz  = $this->_buzz;
        for ($i = $min; $i <= $max; $i++) {
            if (($i % $three === 0) && ($i % $five === 0)) {
                // TODO use lcm...
                $ret[] = $fizz . $buzz;
            } else if ($i % $three === 0) {
                $ret[] = $fizz;
            } else if ($i % $five  === 0) {
                $ret[] = $buzz;
            } else {
                $ret[] = $i;
            }
        }
        if ($this->_type === 'string') {
            return implode($this->_sep, $ret);
        } else if ($this->_type === 'array') {
            return $ret;
        } else {
            // ...maybe.
            return $ret;
        }

    }


    /**
     * show current setting
     *
     * output current setting in var_dump().
     * for debugging.
     *
     * @return current settings array.
     */
    public function showSetting()
    {
        $this->_logDebug(__CLASS__ . '::' . __FUNCTION__);
        $_data = array(
            'min'   => $this->_min   ,
            'max'   => $this->_max   ,
            'count' => $this->_count ,
            'three' => $this->_three ,
            'five'  => $this->_five  ,
            'fizz'  => $this->_fizz  ,
            'buzz'  => $this->_buzz  ,
            'sep'   => $this->_sep   ,
            'type'  => $this->_type  ,
            'debug' => $this->_debug ,
        );
        // if you like this?
        // $this->_logDebug(serialize($_data));
        // var_dump($_data);
        return $_data;
    }


    /**
     * check setting
     *
     * @return void
     */
    private function _checkSetting()
    {
 
        $this->_checkSettingMin();
        $this->_checkSettingMax();
        $this->_checkSettingCount();
        $this->_checkSetting35();
        $this->_checkSettingType();

        // TODO check more... fizz,buzz,sep,echo,debug
    }



    /**
     * check setting Min
     *
     * @return void
     */
    private function _checkSettingMin()
    {
        $this->_min += 0;
        if ($this->_min >= 1) {
            // start to gt 1
        } else {
            $this->_min = 1;
        }
    }


    /**
     * check setting Max
     *
     * @return void
     */
    private function _checkSettingMax()
    {
        $this->_max += 0;
        if ($this->_max > $this->_min) {
            // end to gt min
        } else {
            $this->_max = $this->_min + 10;
        }
    }


    /**
     * check setting Count
     *
     * @return void
     */
    private function _checkSettingCount()
    {
        if ($this->_count === false) {
        } else {
            $this->_count += 0;
            if ($this->_count > 1) {
                // OK, play count is this;
                $this->_max = $this->_min + $this->_count;
            } else {
                $this->_count = false;
            }
        }
    }


    /**
     * check setting three & five
     *
     * @return void
     */
    private function _checkSetting35()
    {
        $this->_three += 0;
        if ($this->_three > 1) {
            // gt 2
        } else {
            $this->_three = 3;
        }

        $this->_five += 0;
        if ($this->_five > 1) {
            // gt three
        } else {
            $this->_five = 5;
        }

        if ($this->_three < $this->_five) {
            // OK
        } else if ($this->_three > $this->_five) {
            $temp = $this->_three;
            $this->_three = $this->_five;
            $this->_five  = $temp;
        } else {
            // maybe _three == _five .... init!!
            $this->_three = 3;
            $this->_five  = 5;
        }
    }


    /**
     * check setting type
     *
     * @return void
     */
    private function _checkSettingType()
    {
        if ($this->_type !== 'array') {
            $this->_type = 'string';
        }
    }

    /**
     * debug mode
     *
     * @param string $message print strings
     *
     * @return void
     */
    private function _logDebug($message)
    {
        if ($this->_debug) {
            echo $message , PHP_EOL;
        }
    }

}
