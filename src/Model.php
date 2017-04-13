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
    /** @var string $handlerNamespace */
    private $handlerNamespace = '\BuzzingPixel\DataModel\Service\DataHandler\\';

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
        $this->setDefinedAttributes($this->defineAttributes());

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
     * Set defined attributes
     * @param array $attributes
     * @param bool $clearPreviousAttributes
     * @return self
     */
    public function setDefinedAttributes(
        $attributes = array(),
        $clearPreviousAttributes = true
    ) {
        // Check if we should clear out any previously defined attributes
        if ($clearPreviousAttributes) {
            $this->definedAttributes = array();
        }

        // Iterate through attributes and set as defined
        foreach ($attributes as $name => $def) {
            // If the def type is a string, make it an array of type
            if (gettype($def) === 'string') {
                $def = array(
                    'type' => $def
                );
            }

            // If type is not defined, the attribute is not valid
            if (gettype($def) !== 'array' || ! isset($def['type'])) {
                continue;
            }

            // Set the defined attribute
            $this->definedAttributes[$name] = $def;
        }

        // Return instance
        return $this;
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

            // Return instance
            return $this;
        }

        // Get this property type
        $type = $this->definedAttributes[$name]['type'];
        $typeHandlerClass = ucfirst($type) . 'Handler';

        // Set custom handler class name
        $customHandlerClass = "{$this->handlerNamespace}{$typeHandlerClass}";

        // Check for custom handler class
        if (class_exists($customHandlerClass)) {
            // Create instance of handler class
            $handler = new $customHandlerClass;

            // Run specified method
            $val = $handler->{$handler::SET_HANDLER}($val);
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
            // Check if the attribute is defined for this model
            if (! isset($this->definedAttributes[$name])) {
                continue;
            }

            // Set the property
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

        // Check if property has been set
        if (! isset($this->attributes[$name])) {
            return null;
        }

        // Set a val variable
        $val = $this->attributes[$name];

        // Get this property type
        $type = $this->definedAttributes[$name]['type'];
        $typeHandlerClass = ucfirst($type) . 'Handler';

        // Set custom handler class name
        $customHandlerClass = "{$this->handlerNamespace}{$typeHandlerClass}";

        // Check for custom handler class
        if (class_exists($customHandlerClass)) {
            // Create instance of handler class
            $handler = new $customHandlerClass;

            // Run specified method
            $val = $handler->{$handler::GET_HANDLER}($val);
        }

        // Return the property if it exists otherwise return null
        return $val;
    }
}
