<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace BuzzingPixel\DataModel\Service\DataHandler;

/**
 * Class FloatHandler
 */
class FloatHandler
{
    const GET_HANDLER = 'commonHandler';
    const SET_HANDLER = 'commonHandler';

    /**
     * Common method to handle data
     * @param mixed $val
     * @return int
     */
    public function commonHandler($val)
    {
        return (float) $val;
    }
}
