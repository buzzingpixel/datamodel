<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace BuzzingPixel\DataModel;

/**
 * Class Model
 */
abstract class Model
{
    /** @var bool $suppressWarnings */
    private $suppressWarnings = false;

    /** @var array $attributes */
    private $attributes = array();

    /** @var array $definedAttributes */
    private $definedAttributes = array();

    /**
     * Constructor
     * @param array $properties
     * @param bool $suppressWarnings
     */
    public function __construct(
        $properties = array(),
        $suppressWarnings = false
    ) {
        // Set defined attributes
        $this->definedAttributes = $this->defineAttributes();

        // Set properties
        $this->setProperties($properties);

        // Set suppress warnings
        $this->suppressWarnings = $suppressWarnings;
    }

    /**
     * Define attributes
     * @return array
     */
    protected function defineAttributes()
    {
        return array();
    }

    /**
     * Magic setter
     * @param $name
     * @param $val
     */
    public function __set($name, $val)
    {
        // Send to the setter
        $this->setProperty($name, $val);
    }

    /**
     * Setter
     * @param $name
     * @param $val
     * @return self
     */
    public function setProperty($name, $val)
    {
        // Make sure this is a property we can set
        if (! isset($this->definedAttributes[$name])) {
            if (! $this->suppressWarnings) {
                trigger_error("Model property {$name} is not defined");
            }

            return $this;
        }

        // Set property
        $this->attributes[$name] = $val;

        // Return instance
        return $this;
    }

    /**
     * Set attributes
     * @param array $properties
     * @return self
     */
    public function setProperties($properties = array())
    {
        // Make sure incoming properties var is iterable
        if (! gettype($properties) === 'array') {
            return $this;
        }

        // Go through each property, and if it is a defined attribute, set it
        foreach ($properties as $name => $val) {
            if (! isset($this->definedAttributes[$name])) {
                continue;
            }

            $this->setProperty($name, $val);
        }

        // Return instance
        return $this;
    }

    /**
     * Magic getter
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        // Use the getter
        return $this->getProperty($name);
    }

    /**
     * Get property
     * @param $name
     * @return mixed
     */
    public function getProperty($name)
    {
        // Make sure this is a property we can get
        if (! isset($this->definedAttributes[$name])) {
            if (! $this->suppressWarnings) {
                trigger_error("Model property {$name} is not defined");
            }
            return null;
        }

        return isset($this->attributes[$name]) ?
            $this->attributes[$name] :
            null;
    }
}
