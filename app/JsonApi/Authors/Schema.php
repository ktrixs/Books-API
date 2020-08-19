<?php

namespace App\JsonApi\Authors;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'authors';

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'id' => $resource->id,
            'name' => $resource->name,
            'surname' => $resource->surname,
            // 'created-at' => $resource->created_at->toAtomString(),
            // 'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }
}
