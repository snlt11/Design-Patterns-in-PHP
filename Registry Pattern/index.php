<?php

require("helper.php");

class Registry
{
    private static array $data = [];

    public static function getData($key)
    {
        return self::$data[$key] ?? null;
    }

    /**
     * @throws Exception
     */
    public static function setData(string $key, $value): void
    {
        if (array_key_exists($key, self::$data)) {
            throw new Exception('Key already exists in registry');
        } else {
            self::$data[$key] = $value;
        }
    }

    /**
     * @throws Exception
     */
    public static function removeData(string $key): void
    {
        if (array_key_exists($key, self::$data)) {
            unset(self::$data[$key]);
        } else {
            throw new Exception('Key does not exist in registry');
        }
    }
}

$helper = new Helper();

// Example usage
Registry::setData('name', 'John Doe');
Registry::setData('age', 30);
Registry::setData('helper', $helper);
echo '<br>';
echo Registry::getData('name');
echo '<br>';
echo Registry::getData('age');
echo '<br>';
echo Registry::getData('helper')->toDoSomething('test');

