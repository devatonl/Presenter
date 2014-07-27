<?php namespace spec\Devato\Presenter;

use Devato\Presenter\Presenter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Mockery;

class PresentableTraitSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Devato\Presenter\Foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('spec\Devato\Presenter\Foo');
    }

    function it_returns_a_valid_presenter()
    {
        Mockery::mock('FooPresenter');

        $this->present()->shouldBeAnInstanceOf('FooPresenter');
    }

    function it_squawks_up_if_invalid_presenter_is_provided()
    {
        $this->presenter = 'UnknownPresenter';

        $this->shouldThrow('Devato\Presenter\Exceptions\PresenterException')->duringPresent();
    }

    function it_caches_the_presenter_for_future_use()
    {
        Mockery::mock('FooPresenter');

        $firstInstance  = $this->present();
        $secondInstance = $this->present();

        $firstInstance->shouldBe($secondInstance);
    }
}

/**
 * Required class to test the PresentableTrait
 */
class Foo
{
    use \Devato\Presenter\PresentableTrait;

    public $presenter = 'FooPresenter';
}