<?php

use BuzzingPixel\DataModel\Model;

/**
 * Class TestModel
 *
 * @property string $testProp
 */
class TestModel extends Model
{
    /** @noinspection PhpMissingParentCallCommonInspection */
    /**
     * Define attributes
     * @return array
     */
    public function defineAttributes()
    {
        return array(
            'testProp' => 'string'
        );
    }
}
