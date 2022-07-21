<?php

namespace Vault\AuthenticationStrategies;

use Vault\ResponseModels\Auth;

/**
 * Class UserPassAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class JwtAuthenticationStrategy extends AbstractPathAuthenticationStrategy
{
    /**
     * @var string
     */
    private $jwt;

    /**
     * @var string
     */
    private $role;

    protected $methodPathSegment = 'jwt';

    public function __construct($jwt, $role)
    {
        $this->jwt = $jwt;
        $this->role = $role;
        parent::__construct();
    }


    public function authenticate(): Auth
    {
        $response = $this->client->write(
            '/auth/' . $this->methodPathSegment . '/login',
            [
                'role' => $this->role,
                'jwt' => $this->jwt,
            ]
        );

        return $response->getAuth();
    }
}
