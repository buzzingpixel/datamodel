<?php

use PHPUnit\Framework\TestCase;

/**
 * Class ModelCustomSetterTest
 */
class ModelCustomSetterTest extends TestCase
{
    /**
     * Test boolean model property type
     */
    public function testCustomSetter()
    {
        $model = new ModelInstance();

        self::assertEmpty($model->testCustomSetterProperty);

        $model->customSetterProperty = 'asdf';
        self::assertEquals('asdf', $model->testCustomSetterProperty);

        $model->customSetTest = 'asdf';
        self::assertInternalType('integer', $model->customSetTest);
        self::assertEquals(0, $model->customSetTest);

        $model->customSetTest = '3';
        self::assertInternalType('integer', $model->customSetTest);
        self::assertEquals(3, $model->customSetTest);
    }
}
