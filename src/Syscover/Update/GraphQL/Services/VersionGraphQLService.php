<?php namespace Syscover\Update\GraphQL\Services;

use Syscover\Update\Models\Version;
use Syscover\Update\Services\VersionService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class VersionGraphQLService extends CoreGraphQLService
{
    public function __construct(Version $model, VersionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
