<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace BuzzingPixel\DataModel\Service\DataHandler;

/**
 * Class BoolHandler
 */
class BoolHandler
{
    const GET_HANDLER = 'commonHandler';
    const SET_HANDLER = 'commonHandler';

    /**
     * Common method to handle data
     * @param mixed $val
     * @return bool
     */
    public function commonHandler($val)
    {
        return $val === '1' ||
            $val === 1 ||
            $val === 'true' ||
            $val === true ||
            $val === 'y' ||
            $val === 'yes';
    }
}
