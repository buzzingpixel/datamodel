<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace BuzzingPixel\DataModel;

/**
 * Class Model
 */
abstract class Model
{
    /**
     * @return string
     */
    public function returnFoo()
    {
        return 'foo';
    }
}
