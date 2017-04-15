<?php

use PHPUnit\Framework\TestCase;

/**
 * Class ModelCustomGetterTest
 */
class ModelCustomGetterTest extends TestCase
{
    /**
     * Test model custom getters
     */
    public function testCustomGetter()
    {
        $model = new ModelInstance();

        self::assertEquals('customGetterTestVal', $model->customGetterTest);

        self::assertEmpty($model->customGetPropTest);

        $model->customGetPropTest = 'test';
        self::assertEquals('customGetPropTestVal', $model->customGetPropTest);

        $model->customGetPropTest = 'testing';
        self::assertEquals('testing', $model->customGetPropTest);
    }
}
