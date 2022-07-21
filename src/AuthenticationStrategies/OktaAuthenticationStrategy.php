<?php

namespace Vault\AuthenticationStrategies;

/**
 * Class OktaAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class OktaAuthenticationStrategy extends AbstractUsernamePasswordAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $methodPathSegment = 'okta';
}
