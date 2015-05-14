<?php

namespace spec\RafalNav\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RafalNavCuboidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RafalNav\Tools\RafalNavCuboid');
    }
}
