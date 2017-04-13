<?php

use PHPUnit\Framework\TestCase;

/**
 * Class ModelTest
 */
class ModelTest extends TestCase
{
    /**
     * Test model
     */
    public function testProperty()
    {
        $model = new TestModel();

        self::assertEmpty($model->testProp);

        $model->testProp = 'testVal';

        self::assertEquals('testVal', $model->testProp);

        $model->setProperty('testProp', 'newTestVal');

        self::assertEquals('newTestVal', $model->testProp);

        $model->setProperty('testProp', 'newTestVal2');

        self::assertEquals('newTestVal2', $model->getProperty('testProp'));
    }
}
