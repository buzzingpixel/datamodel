<?php

use PHPUnit\Framework\TestCase;

/**
 * Class ModelUuidTest
 */
class ModelUuidTest extends TestCase
{
    /**
     * Test model uuid
     */
    public function testUuid()
    {
        $model = new ModelInstance();
        $model2 = new ModelInstance();

        self::assertNotEmpty($model->getUuid());
        self::assertNotEmpty($model->uuid);
        self::assertNotEmpty($model2->getUuid());
        self::assertNotEmpty($model2->uuid);

        self::assertEquals($model->getUuid(), $model->getUuid());
        self::assertEquals($model->getUuid(), $model->uuid);
        self::assertEquals($model2->getUuid(), $model2->getUuid());
        self::assertEquals($model2->getUuid(), $model2->uuid);

        self::assertNotEquals($model->getUuid(), $model2->getUuid());
    }
}
