<?php

namespace basics\Mappers;

use \InvalidArgumentException;

class MinuteQuarterMapper
{
    private array $map = [];

    public function __construct()
    {
        $this->createMap($this->getDefaultMap());
    }

    public function addMapPoint($mapKey, $mapPoint): void
    {
        if (array_key_exists($mapKey, $this->map)) {
            throw new InvalidArgumentException('In order to change a map in mapper use the function `updateMapPoint(int $mapKey, string $mapPoint): void`');
        }
        $this->map[$mapKey] = $mapPoint;
    }

    public function getMap(): array
    {
        return $this->map;
    }

    public function updateMapPoint(int $mapKey, string $mapPoint): void
    {
        if (!array_key_exists($mapKey, $this->map)) {
            throw new InvalidArgumentException('In order to create a new map in mapper use the function `addMapPoint(int $mapKey, string $mapPoint): void`');
        }
        $this->map[$mapKey] = $mapPoint;
    }

    public function removeMapPoint($mapKey): void
    {
        if (!array_key_exists($mapKey, $this->map)) {
            throw new InvalidArgumentException('Passed key is not found');
        }
        unset($this->map[$mapKey]);
    }

    public function getMapByKey($mapKey): string
    {
        if (!array_key_exists($mapKey, $this->map)) {
            throw new InvalidArgumentException('Passed key is not found');
        }
        return $this->map[$mapKey];
    }

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

    private function createMap($map)
    {
        foreach ($map as $mapKey => $mapPoint) {
            $this->addMapPoint($mapKey, $mapPoint);
        }
    }
}