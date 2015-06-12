<?php

namespace spec\kgrzech\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('kgrzech\Tools\Cuboid');
    }
}