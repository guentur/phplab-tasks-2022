<?php

namespace basics\Mappers;

use basics\Mappers\Skeleton\AbstractMapper;

class MinuteQuarterMapper extends AbstractMapper
{
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
}