<?php

namespace Vault\AuthenticationStrategies;

use Psr\Http\Client\ClientExceptionInterface;
use Vault\Exceptions\AuthenticationException;
use Vault\ResponseModels\Auth;

/**
 * Class AbstractUserPassAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategies
 */
abstract class AbstractUsernamePasswordAuthenticationStrategy extends AbstractPathAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * AbstractUserPassAuthenticationStrategy constructor.
     *
     * @param string $username The Username used to authenticate to Vault
     * @param string $password The Password used to authenticate to Vault
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        parent::__construct();
    }

    /**
     * Returns auth for further interactions with Vault.
     *
     * @return Auth
     * @throws AuthenticationException
     * @throws ClientExceptionInterface
     */
    public function authenticate(): Auth
    {
        if (!$this->methodPathSegment) {
            throw new AuthenticationException('methodPathSegment must be set before usage');
        }

        $response = $this->client->write(
            sprintf('/auth/%s/login/%s', $this->methodPathSegment, $this->username),
            ['password' => $this->password]
        );

        return $response->getAuth();
    }
}
