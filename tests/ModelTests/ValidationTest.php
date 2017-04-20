<?php

namespace ModelTests;

use BuzzingPixel\DataModel\DataType;
use PHPUnit\Framework\TestCase;
use TestingClasses\ModelInstance;

/**
 * Class ValidationTest
 * @group modelTests
 */
class ValidationTest extends TestCase
{
    /**
     * Test model uuid
     */
    public function testMixed()
    {
        $model = new ModelInstance();

        $model->setDefinedAttributes(array(
            'mixedProp' => array(
                'type' => DataType::MIXED,
                'required' => true
            )
        ), true);

        self::assertFalse($model->validate());
        self::assertTrue($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertArrayHasKey('mixedProp', $model->errors);
        self::assertCount(1, $model->errors['mixedProp']);
        self::assertEquals(
            'This field is required',
            $model->errors['mixedProp'][0]
        );

        $model->mixedProp = '';
        self::assertFalse($model->validate());
        self::assertTrue($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertArrayHasKey('mixedProp', $model->errors);
        self::assertCount(1, $model->errors['mixedProp']);
        self::assertEquals(
            'This field is required',
            $model->errors['mixedProp'][0]
        );

        $model->mixedProp = 'asdf';
        self::assertTrue($model->validate());
        self::assertFalse($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertCount(0, $model->errors);

        $model = new ModelInstance();

        $model->setDefinedAttributes(array(
            'mixedProp' => array(
                'type' => DataType::MIXED
            )
        ), true);

        self::assertTrue($model->validate());
        self::assertFalse($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertCount(0, $model->errors);

        $model->mixedProp = 'asdf';
        self::assertTrue($model->validate());
        self::assertFalse($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertCount(0, $model->errors);
    }

    /**
     * Test array
     */
    public function testArray()
    {
        $model = new ModelInstance();

        $model->setDefinedAttributes(array(
            'mixedProp' => array(
                'type' => DataType::ARR,
                'required' => true
            )
        ), true);

        self::assertFalse($model->validate());
        self::assertTrue($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertArrayHasKey('mixedProp', $model->errors);
        self::assertCount(1, $model->errors['mixedProp']);
        self::assertEquals(
            'This field is required',
            $model->errors['mixedProp'][0]
        );

        $model->mixedProp = '1';
        self::assertTrue($model->validate());
        self::assertFalse($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertCount(0, $model->errors);

        $model = new ModelInstance();

        $model->setDefinedAttributes(array(
            'mixedProp' => array(
                'type' => DataType::ARR
            )
        ), true);

        self::assertTrue($model->validate());
        self::assertFalse($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertCount(0, $model->errors);

        $model->mixedProp = '1';
        self::assertTrue($model->validate());
        self::assertFalse($model->hasErrors);
        self::assertInternalType('array', $model->errors);
        self::assertCount(0, $model->errors);
    }
}
