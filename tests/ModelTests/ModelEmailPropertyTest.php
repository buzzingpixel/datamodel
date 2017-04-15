<?php

namespace ModelTests;

use PHPUnit\Framework\TestCase;
use TestingClasses\ModelInstance;

/**
 * Class ModelEmailPropertyTest
 */
class ModelEmailPropertyTest extends TestCase
{
    /**
     * Test email model property type
     */
    public function testProperty()
    {
        $model = new ModelInstance();

        self::assertNull($model->emailProp);

        $model->emailProp = 'asdf';
        self::assertNull($model->emailProp);

        $model->emailProp = 'asdf@asdf';
        self::assertNull($model->emailProp);

        $model->emailProp = 'asdf@asdf.com';
        self::assertEquals('asdf@asdf.com', $model->emailProp);
    }
}