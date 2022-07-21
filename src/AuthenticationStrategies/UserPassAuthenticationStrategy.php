<?php

namespace Vault\AuthenticationStrategies;

/**
 * Class UserPassAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class UserPassAuthenticationStrategy extends AbstractUsernamePasswordAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $methodPathSegment = 'userpass';
}
