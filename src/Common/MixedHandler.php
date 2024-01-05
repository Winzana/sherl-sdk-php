<?php

namespace Sherl\Sdk\Common;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

class MixedHandler implements SubscribingHandlerInterface
{
    /**
     * @return array<array<string,mixed>>
     */
    public static function getSubscribingMethods(): array
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

    /**
     * @param mixed $data
     * @param array<string,mixed> $type
     * @return mixed
     */
    public function deserializeFromJSON(JsonDeserializationVisitor $visitor, $data, array $type)
    {
        return $data;
    }
}
