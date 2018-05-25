<?php

namespace spec\Kata;

use Kata\PathProvider;
use Kata\Traveller;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TravellerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new PathProvider());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Traveller::class);
    }

    function it_can_travel_a_two_by_two_matrix()
    {
        $input = [
            [1, 2],
            [3, 4]
        ];
        $this->travel($input)->shouldBe([1, 2, 3, 4]);
    }

    function it_can_travel_a_three_by_three_matrix()
    {
        $input = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];
        $this->travel($input)->shouldBe([1, 2, 4, 7, 5, 3, 6, 8, 9]);
    }

    function it_can_travel_a_three_by_two_matrix()
    {
        $input = [
            [1, 2, 3],
            [4, 5, 6]
        ];
        $this->travel($input)->shouldBe([1, 2, 4, 5, 3, 6]);
    }
}
