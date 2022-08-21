<?php

namespace basics\Model;

use basics\Mappers\Skeleton\MapperInterface;

class GetArrayPart
{
    public function execute(int $search, array $pattern, MapperInterface $mapper): string
    {
        $ratherPatternKey = $this->reduce($search, $pattern);
        try {
            $result = $mapper->getPointByKey($ratherPatternKey);
        } catch (\InvalidArgumentException $exception) {
            die($exception->getMessage() . "\n" . $exception->getTraceAsString());
        }
        return $result;
    }

    public function reduce(int $search, array $pattern): int
    {
        $cnt = count($pattern);
        for ($i = 0; $i < $cnt; $i++) {
            if (!isset($pattern[$i + 1]) || $search >= $pattern[$i] && $search < $pattern[$i + 1] ) {
                return $i;
            }
        }
    }
}