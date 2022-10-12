<?php

namespace szana8\PayEEE\Managers\Contracts;

interface Factory
{
    /**
     * Get an OAuth provider implementation.
     *
     */
    public function driver($driver = null);
}
