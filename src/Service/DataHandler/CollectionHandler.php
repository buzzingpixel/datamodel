<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace BuzzingPixel\DataModel\Service\DataHandler;

use BuzzingPixel\DataModel\ModelCollection;

/**
 * Class InstanceHandler
 */
class CollectionHandler
{
    const GET_HANDLER = 'commonHandler';
    const SET_HANDLER = 'commonHandler';

    /**
     * Common method to handle data
     * @param mixed $val
     * @return mixed
     */
    public function commonHandler($val)
    {
        // Make sure our instance def exists and the val is an instance of it
        if (! $val instanceof ModelCollection) {
            return null;
        }

        // Since the value is an instance of expected, return it
        return $val;
    }
}
