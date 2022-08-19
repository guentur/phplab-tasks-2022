<?php

namespace basics\Mappers;

use InvalidArgumentException;
use basics\Mappers\Skeleton\MapperInterface;

class MinuteQuarterMapper implements MapperInterface
{
    /**
     * @var array
     */
    private array $map = [];

    public function __construct()
    {
        $this->createMap($this->getDefaultMap());
    }

    /**
     * @param $pointKey
     * @param $mapPoint
     * @return void
     */
    public function addMapPoint($pointKey, $mapPoint): void
    {
        if (array_key_exists($pointKey, $this->map)) {
            throw new InvalidArgumentException('In order to change a map in mapper use the function `updateMapPoint(int $pointKey, string $mapPoint): void`');
        }
        $this->map[$pointKey] = $mapPoint;
    }

    /**
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }

    /**
     * @param int $pointKey
     * @param string $mapPoint
     * @return void
     */
    public function updateMapPoint(int $pointKey, string $mapPoint): void
    {
        if (!array_key_exists($pointKey, $this->map)) {
            throw new InvalidArgumentException('In order to create a new map in mapper use the function `addMapPoint(int $pointKey, string $mapPoint): void`');
        }
        $this->map[$pointKey] = $mapPoint;
    }

    /**
     * @param $pointKey
     * @return void
     */
    public function removeMapPoint($pointKey): void
    {
        if (!array_key_exists($pointKey, $this->map)) {
            throw new InvalidArgumentException('Passed key is not found');
        }
        unset($this->map[$pointKey]);
    }

    /**
     * @param $pointKey
     * @return string
     */
    public function getPointByKey($pointKey): string
    {
        if (!array_key_exists($pointKey, $this->map)) {
            throw new InvalidArgumentException('Passed key is not found');
        }
        return $this->map[$pointKey];
    }

    /**
     * @return string[]
     */
    public function getDefaultMap(): array
    {
        // @todo create configuration for mappers like di.xml in Magento. It will help to remove `private function createMap()`
        return [
            0 => 'first',
            1 => 'first',
            2 => 'second',
            3 => 'second',
            4 => 'third',
            5 => 'third',
            6 => 'fourth'
        ];
    }

    /**
     * @param $map
     * @return void
     */
    private function createMap($map)
    {
        foreach ($map as $pointKey => $mapPoint) {
            $this->addMapPoint($pointKey, $mapPoint);
        }
    }
}