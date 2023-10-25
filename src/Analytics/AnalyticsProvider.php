<?php

namespace Sherl\Sdk\User;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Dto\SearchResult;

use Sherl\Sdk\Analytics\Dto\AnalyticsOutputDto;
use Sherl\Sdk\Analytics\Dto\AnalyticsInputDto;
use Sherl\Sdk\Analytics\Dto\AnalyticsInputBaseDto;
use Sherl\Sdk\Analytics\Dto\AnalyticsFindBIInputDto;
use Sherl\Sdk\Analytics\Dto\CAAnalyticsInputDto;
use Sherl\Sdk\Analytics\Dto\NotificationsAnalyticsInputDto;
use Sherl\Sdk\Analytics\Dto\ProductAnalyticsInputDto;
use Sherl\Sdk\Analytics\Enum\TraceEnum;


class AnalyticsProvider
{
    public const DOMAIN = "Analytics";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlAnalyticsException(ResponseInterface $response)
    {
        throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function getAnalytics(
        AnalyticsInputDto $filters,
    ): ?AnalyticsOutputDto {
        $response = $this->client->get("/api/analytics", [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            [
              RequestOptions::JSON => $filters
            ]
          ]);

        if ($response->getStatusCode() >= 300) {
            throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AnalyticsOutputDto::class,
            'json'
        );
    }

    public function getAudiencesAnalytics(
      AnalyticsInputBaseDto $filters,
  ): ?AnalyticsOutputDto {
      $response = $this->client->get("/api/analytics/audiences", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          [
            RequestOptions::JSON => $filters
          ]
        ]);

      if ($response->getStatusCode() >= 300) {
          throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
      }

      return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          AnalyticsOutputDto::class,
          'json'
      );
  }

  public function getBIAnalytics(
    AnalyticsFindBIInputDto $filters,
): ?AnalyticsOutputDto {
    $response = $this->client->get("/api/analytics/bi", [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        [
          RequestOptions::JSON => $filters
        ]
      ]);

    if ($response->getStatusCode() >= 300) {
        throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        AnalyticsOutputDto::class,
        'json'
    );
}

  public function getCAAnalytics(
    CAAnalyticsInputDto $filters,
  ): ?AnalyticsOutputDto {
    $response = $this->client->get("/api/analytics/ca", [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        [
          RequestOptions::JSON => $filters
        ]
      ]);

    if ($response->getStatusCode() >= 300) {
        throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        AnalyticsOutputDto::class,
        'json'
    );
  }

  public function getNotificationsAnalytics(
    NotificationsAnalyticsInputDto $filters,
  ): ?AnalyticsOutputDto {
    $response = $this->client->get("/api/analytics/notifications", [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        [
          RequestOptions::JSON => $filters
        ]
      ]);

    if ($response->getStatusCode() >= 300) {
        throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        AnalyticsOutputDto::class,
        'json'
    );
  }

  public function getProductsAnalytics(
    ProductAnalyticsInputDto $filters,
  ): ?AnalyticsOutputDto {
    $response = $this->client->get("/api/analytics/products", [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        [
          RequestOptions::JSON => $filters
        ]
      ]);

    if ($response->getStatusCode() >= 300) {
        throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        AnalyticsOutputDto::class,
        'json'
    );
  }

  public function getTrackingAnalytics(
    AnalyticsFindByInputDto $filters,
  ) {
    $response = $this->client->get("/api/analytics/tracking", [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        [
          RequestOptions::JSON => $filters
        ]
      ]);

    if ($response->getStatusCode() >= 300) {
        throw new SherlException(AnalyticsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        AnalyticsOutputDto::class,
        'json'
    );
  }
  

}
