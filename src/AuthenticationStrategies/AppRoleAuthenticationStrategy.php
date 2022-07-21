<?php

namespace Vault\AuthenticationStrategies;

use Psr\Http\Client\ClientExceptionInterface;
use Vault\ResponseModels\Auth;

/**
 * Class AppRoleAuthenticationStrategy
 *
 * @package Vault\AuthenticationStrategy
 */
class AppRoleAuthenticationStrategy extends AbstractPathAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $roleId;

    /**
     * @var string
     */
    protected $secretId;

    /**
     * AppRoleAuthenticationStrategy constructor.
     *
     * @param string $roleId
     * @param string $secretId
     * @param string $methodPathSegment
     */
    public function __construct($roleId, $secretId, $methodPathSegment = 'approle')
    {
        $this->roleId = $roleId;
        $this->secretId = $secretId;
        $this->methodPathSegment = $methodPathSegment;
        parent::__construct();
    }

    /**
     * Returns auth for further interactions with Vault.
     *
     * @return Auth
     * @throws ClientExceptionInterface
     */
    public function authenticate(): ?Auth
    {
        $response = $this->client->write(
            '/auth/' . $this->methodPathSegment . '/login',
            [
                'role_id' => $this->roleId,
                'secret_id' => $this->secretId,
            ]
        );

        return $response->getAuth();
    }
}
