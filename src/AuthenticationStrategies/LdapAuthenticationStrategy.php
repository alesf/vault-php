<?php

namespace Vault\AuthenticationStrategies;

/**
 * Class LdapAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class LdapAuthenticationStrategy extends AbstractUsernamePasswordAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $methodPathSegment = 'ldap';
}
