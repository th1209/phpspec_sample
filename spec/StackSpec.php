<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StackSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Stack');
    }

    function it_return_true_when_stack_is_empty()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    function it_return_false_when_stack_is_not_empty()
    {
        $this->push(1);
        $this->isEmpty()->shouldReturn(false);
    }

    function its_size_is_0_when_stack_contain_no_item()
    {
        $this->size()->shouldReturn(0);
    }

    function its_size_is_2_when_stack_contain_two_items()
    {
        $this->push(1);
        $this->push(1);
        $this->size()->shouldReturn(2);
    }

    function it_is_empty_when_all_items_was_popped()
    {
        $this->push(1);
        $this->push(1);
        $this->pop();
        $this->pop();
        $this->isEmpty()->shouldReturn(true);
    }

    function it_return_last_pushed_item_when_pop_called()
    {
        $this->push(1);
        $this->pop()->shouldReturn(1);
    }

    function it_return_last_pushed_item_and_stack_size_does_not_change_when_top_called()
    {
        $this->push(1);
        $this->push(1);
        $this->top()->shouldReturn(1);
        $this->size()->shouldReturn(2);
    }

    function it_throw_exception_when_try_to_pop_item_from_empty_stack()
    {
        $this->shouldThrow('\LogicException')->during('pop');
    }

    function it_throw_exception_when_try_to_top_item_from_empty_stack()
    {
        $this->shouldThrow('\LogicException')->duringTop();
    }
}

