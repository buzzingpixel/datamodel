<?php

use PHPUnit\Framework\TestCase;

/**
 * Class ModelFloatPropertyTest
 */
class ModelFloatPropertyTest extends TestCase
{
    /**
     * Test string model property type
     */
    public function testProperty()
    {
        $model = new ModelInstance();

        self::assertNull($model->floatProp);
        self::assertNull($model->getProperty('floatProp'));

        $model->floatProp = 1;
        self::assertInternalType('float', $model->floatProp);
        self::assertEquals(1, $model->floatProp);
        self::assertInternalType('float', $model->getProperty('floatProp'));
        self::assertEquals(1, $model->getProperty('floatProp'));

        $model->floatProp = 1.2;
        self::assertInternalType('float', $model->floatProp);
        self::assertEquals(1.2, $model->floatProp);
        self::assertInternalType('float', $model->getProperty('floatProp'));
        self::assertEquals(1.2, $model->getProperty('floatProp'));

        $model->floatProp = 'asdf';
        self::assertInternalType('float', $model->floatProp);
        self::assertEquals(0, $model->floatProp);
        self::assertInternalType('float', $model->getProperty('floatProp'));
        self::assertEquals(0, $model->getProperty('floatProp'));
    }
}
