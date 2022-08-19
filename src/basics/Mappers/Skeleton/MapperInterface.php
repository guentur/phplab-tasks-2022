<?php

namespace basics\Mappers\Skeleton;

interface MapperInterface
{
    /**
     * @param $pointKey
     * @param $mapPoint
     * @return void
     */
    public function addMapPoint($pointKey, $mapPoint): void;

    /**
     * @return array
     */
    public function getMap(): array;

    /**
     * @param int $pointKey
     * @param string $mapPoint
     * @return void
     */
    public function updateMapPoint(int $pointKey, string $mapPoint): void;

    /**
     * @param $pointKey
     * @return void
     */
    public function removeMapPoint($pointKey): void;

    /**
     * @param $pointKey
     * @return string
     */
    public function getPointByKey($pointKey): string;

    /**
     * @return array
     */
    public function getDefaultMap(): array;
}