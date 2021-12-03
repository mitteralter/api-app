<?php

namespace App\JsonApi\Facs;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'facs';

    /**
     * @param \App\Fac $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Fac $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'rfc' => $resource->rfc,
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
        ];
    }




}
