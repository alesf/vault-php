<?php

namespace Vault\AuthenticationStrategies;

/**
 * Class RadiusAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class RadiusAuthenticationStrategy extends AbstractUsernamePasswordAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $methodPathSegment = 'radius';
}
