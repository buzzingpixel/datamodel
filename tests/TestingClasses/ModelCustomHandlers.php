<?php

namespace TestingClasses;

use BuzzingPixel\DataModel\Model;

/**
 * Class ModelCustomHandlers
 *
 * @property mixed $customDataProp
 */
class ModelCustomHandlers extends Model
{
    const CUSTOM_HANDLERS = array(
        'CustomDataType' => '\CustomHandlers\CustomDataTypeHandler'
    );

    /** @noinspection PhpMissingParentCallCommonInspection */
    /**
     * Define attributes
     *
     * @return array
     */
    public function defineAttributes()
    {
        return array(
            'customDataProp' => 'CustomDataType'
        );
    }
}
