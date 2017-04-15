<?php

use PHPUnit\Framework\TestCase;

use BuzzingPixel\DataModel\ModelCollection;

/**
 * Class ModelCollectionIteratorTest
 */
class ModelCollectionIteratorTest extends TestCase
{
    /**
     * Test iterator
     */
    public function testIterator()
    {
        $items = array(
            new ModelInstance(),
            new ModelInstance()
        );

        $collection = new ModelCollection($items);

        $array = array();

        foreach ($collection as $model) {
            $array[] = $model->uuid;
        }

        self::assertCount(2, $array);

        self::assertNotEquals($array[0], $array[1]);
    }
}
