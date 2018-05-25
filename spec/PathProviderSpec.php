<?php

namespace spec\Kata;

use Kata\PathProvider;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PathProvider::class);
    }

    function it_can_provide_indexes_for_a_two_by_two_matrix()
    {
        $this->getPath(2, 2)->shouldBe([
            [0, 0],
            [1, 0],
            [0, 1],
            [1, 1]
        ]);
    }

    function it_can_provide_indexes_for_a_three_by_three_matrix()
    {
        $this->getPath(3, 3)->shouldBe([
            [0, 0],
            [1, 0],
            [0, 1],
            [0, 2],
            [1, 1],
            [2, 0],
            [2, 1],
            [1, 2],
            [2, 2]
        ]);
    }

    function it_can_provide_indexes_for_a_one_by_two_matrix()
    {
        $this->getPath(1, 2)->shouldBe([
            [0, 0],
            [0, 1]
        ]);
    }

    function it_can_provide_indexes_for_a_three_by_one_matrix()
    {
        $this->getPath(3, 1)->shouldBe([
            [0, 0],
            [1, 0],
            [2, 0]
        ]);
    }
}
