<?php

namespace Kata;

class Traveller
{
    /** @var PathProvider */
    private $pathProvider;

    public function __construct(PathProvider $pathProvider)
    {
        $this->pathProvider = $pathProvider;
    }

    public function travel(array $input) : array
    {
        $m = count($input[0]);
        $n = count($input);

        $result = [];
        foreach ($this->pathProvider->getPath($m, $n) as $position) {
            $result[] = $input[$position[1]][$position[0]];
        }

        return $result;
    }
}




/**
 *
 */