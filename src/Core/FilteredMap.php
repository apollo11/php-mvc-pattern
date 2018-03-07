<?php
namespace OddsClick\Core;

class FilteredMap
{
    private $map;

    public function __construct(array $baseMap)
    {
        $this->map = $baseMap;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($this->map[$name]);
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function get(string $name)
    {
        return $this->map[$name] ?? null;
    }

    /**
     * @param string $name
     * @return int
     */
    public function getInt(string $name)
    {
        return (int) $this->get($name);
    }

    /**
     * @param string $name
     * @return float
     */
    public function getNumber(string $name)
    {
        return (float) $this->get($name);
    }

    /**
     * @param string $name
     * @param bool $filter
     * @return string
     */
    public function getString(string $name, bool $filter = true)
    {
        $value = (string) $this->get($name);
        return $filter ? addslashes($value): $value;
    }
}