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
abstract class AbstractPathAuthenticationStrategy extends AbstractAuthenticationStrategy
{
    /**
     * @var string
     */
    protected $methodPathSegment;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getMethodPathSegment(): string
    {
        return $this->methodPathSegment;
    }

    /**
     * @param string $methodPathSegment
     *
     * @return static
     */
    public function setMethodPathSegment(string $methodPathSegment)
    {
        $this->methodPathSegment = $methodPathSegment;

        return $this;
    }
}
