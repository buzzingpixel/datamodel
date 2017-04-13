<?php

use BuzzingPixel\DataModel\Model;
use BuzzingPixel\DataModel\DataType;

/**
 * Class ModelInstance
 *
 * @property mixed $mixedProp
 * @property string $stringProp
 * @property int $intProp
 * @property int $intPropExtra
 * @property float $floatProp
 */
class ModelInstance extends Model
{
    /** @noinspection PhpMissingParentCallCommonInspection */
    /**
     * Define attributes
     * @return array
     */
    public function defineAttributes()
    {
        return array(
            'mixedProp' => DataType::MIXED,
            'stringProp' => DataType::STRING,
            'intProp' => DataType::INT,
            'intPropExtra' => array(
                'type' => DataType::INT
            ),
            'floatProp' => DataType::FLOAT
        );
    }
}
