<?php

namespace ModelTests;

use PHPUnit\Framework\TestCase;
use TestingClasses\ModelInstance;

/**
 * Class AsArrayTest
 * @group modelTests
 */
class AsArrayTest extends TestCase
{
    /**
     * Test array model property type
     */
    public function test()
    {
        $model = new ModelInstance(array(
            'mixedProp' => 'test',
            'stringProp' => 'test2',
            'intProp' => '123',
            // 'intPropExtra' => '',
            'floatProp' => 123.4,
            'boolProp' => 'y',
            // 'instanceProp' => '',
            'enumProp' => 'someVal',
            'emailProp' => 'info@buzzingpixel.com',
            'stringArrayPropTest' => 'test1|test123'
        ));

        $asArray = $model->asArray();

        self::assertInternalType('array', $asArray);

        self::assertEquals($model->uuid, $asArray['uuid']);

        self::assertEquals('test', $asArray['mixedProp']);

        self::assertEquals('test2', $asArray['stringProp']);

        self::assertInternalType('integer', $asArray['intProp']);
        self::assertEquals(123, $asArray['intProp']);

        self::assertNull($asArray['intPropExtra']);

        self::assertInternalType('float', $asArray['floatProp']);
        self::assertEquals(123.4, $asArray['floatProp']);

        self::assertInternalType('boolean', $asArray['boolProp']);
        self::assertTrue($asArray['boolProp']);

        self::assertEquals('someVal', $asArray['enumProp']);

        self::assertEquals('info@buzzingpixel.com', $asArray['emailProp']);

        self::assertInternalType('array', $asArray['stringArrayPropTest']);
        self::assertEquals('test1', $asArray['stringArrayPropTest'][0]);
        self::assertEquals('test123', $asArray['stringArrayPropTest'][1]);
    }
}
