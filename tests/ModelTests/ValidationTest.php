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

        $model->validate();

        self::assertTrue($model->hasErrors);

        self::assertInternalType('array', $model->errors);

        self::assertArrayHasKey('mixedProp', $model->errors);

        self::assertCount(1, $model->errors['mixedProp']);

        self::assertEquals(
            'This field is required',
            $model->errors['mixedProp'][0]
        );
    }
}
