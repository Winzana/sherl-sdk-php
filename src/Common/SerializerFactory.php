<?php

namespace Sherl\Sdk\Common;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

use Sherl\Sdk\Common\MixedHandler;

class SerializerFactory
{
    private static ?Serializer $instance = null;

    public static function getInstance(): Serializer
    {
        if (!self::$instance) {
            self::create();
        }

        return self::$instance;
    }

    private static function create()
    {
        self::$instance = SerializerBuilder::create()
          ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
          ->enableEnumSupport(true)
          ->configureHandlers(function (HandlerRegistry $registry) {
              $registry->registerSubscribingHandler(new MixedHandler());
          })
          ->build();
    }
}
