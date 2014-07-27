<?php namespace Devato\Presenter;

use Devato\Presenter\Exceptions\PresenterException;

/**
 * Class PresentableTrait
 * @package Devato\Presenter
 */
trait PresentableTrait
{
    /**
     * Instance of the view presenter
     * @var mixed
     */
    protected $presenterInstance;

    /**
     * Returns a new or cached presenter instance
     * @return mixed
     * @throws PresenterException
     */
    public function present()
    {
        if (! $this->presenter or ! class_exists($this->presenter))
        {
            throw new PresenterException('Please set the protected $presenter property to your presenter path.');
        }

        if (! isset($this->presenterInstance))
        {
            $this->presenterInstance = new $this->presenter($this);
        }


        return $this->presenterInstance;
    }
} 