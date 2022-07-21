<?php

namespace Vault\AuthenticationStrategies;

use Vault\ResponseModels\Auth;

/**
 * Class UserPassAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class KubernetesAuthenticationStrategy extends JwtAuthenticationStrategy
{
    protected $methodPathSegment = 'kubernetes';

    public function __construct($role, $tokenPath = '/var/run/secrets/kubernetes.io/serviceaccount/token')
    {
        parent::__construct(file_get_contents($tokenPath), $role);
    }
}
