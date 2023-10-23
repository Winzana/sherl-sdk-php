<?php

namespace Sherl\Sdk\Common;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

class MixedHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
          [
            'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
            'format' => 'json',
            'type' => 'mixed',
            'method' => 'deserializeFromJSON',
          ],
        ];
    }

    public function deserializeFromJSON(JsonDeserializationVisitor $visitor, $data, array $type)
    {
        return $data;
    }
}
