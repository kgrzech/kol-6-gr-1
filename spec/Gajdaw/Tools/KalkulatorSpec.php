<?php

namespace spec\Gajdaw\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KalkulatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gajdaw\Tools\Kalkulator');
    }
}
