<?php

namespace Sherl\Sdk\User;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;

use Sherl\Sdk\User\Dto\UpdatePasswordInputDto;
use Sherl\Sdk\User\Dto\ValidateResetPasswordInputDto;

class VirtualMoneyProvider
{
    public const DOMAIN = "VirtualMoney";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlVirtualMoneyException(ResponseInterface $response)
    {
        throw new SherlException(VirtualMoneyProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

}
