<?php namespace Devato\Presenter\Interfaces;

/**
 * Interface PresentableInterface
 * @package Devato\Presenter\Interfaces
 */
interface PresentableInterface
{
    /**
     * Prepare a new or cached presenter instance
     * @return mixed
     */
    public function present();
} 