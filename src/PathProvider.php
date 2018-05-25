<?php

namespace Kata;

class PathProvider
{
    public function getPath(int $m, int $n) : array
    {
        $product = $m * $n;
        if ($product < 1) return [];

        $velocity = [1, -1];
        $position = [0, 0];

        $indexes = [];

        $updateVelocityAndPosition = function(array $velocity, array $position, $m, $n) {
            $top = $position[1] < 0;
            $bottom = $position[1] >= $n;
            $left = $position[0] < 0;
            $right = $position[0] >= $m;

            $valid = ! ($top || $bottom || $left || $right);

            if ($valid) {
                return [$velocity, $position];
            }

            //adjust velocity
            if ($top || $right) {
                $velocity = [-1, 1];
            } else {
                $velocity = [1, -1];
            }

            //adjust position
            if ($right) {
                $position = [$position[0] - 1, $position[1] + 2];
            } elseif ($top) {
                $position = [$position[0], $position[1] + 1];
            }


            if ($bottom) {
                $position = [$position[0] + 2, $position[1] - 1];
            } elseif ($left) {
                $position = [$position[0] + 1, $position[1]];
            }

            return [$velocity, $position];
        };

        while(true) {
            $indexes[] = $position;

            if (count($indexes) == $product) return $indexes;

            $position = [$position[0] + $velocity[0], $position[1] + $velocity[1]];

            list($velocity, $position) = $updateVelocityAndPosition($velocity, $position, $m, $n);
        }

        return $indexes;
    }
}
