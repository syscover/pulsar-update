<?php namespace Syscover\Update\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Syscover\Core\Controllers\CoreController;
use Syscover\Update\Services\VersionService;
use Syscover\Update\Models\Version;

class VersionController extends CoreController
{
    public function __construct(Version $model, VersionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check(Request $request)
    {
        $objects = $request->all();

        if (isset($objects['variables']) && is_array($objects['variables']))
        {
            $variables = $objects['variables'];
            $q = Version::builder();
            foreach ($variables as $object)
            {
                // check that version has 3 numbers
                if (count(explode('.', $object['version'])) !== 3)
                {
                    return $this->errorResponse('Version ' . $object['version'] . ' has not x.x.x format', Response::HTTP_NOT_ACCEPTABLE);
                }

                $q->orWhere(function ($query) use ($object) {

                    $query
                        ->where('package_id', $object['package_id'])
                        ->whereRaw(
                            'CONCAT(
                                LPAD(SUBSTRING_INDEX(SUBSTRING_INDEX(`version`, \'.\', 1), \'.\', -1), 10, \'0\'),
                                LPAD(SUBSTRING_INDEX(SUBSTRING_INDEX(`version`, \'.\', 2), \'.\', -1), 10, \'0\'),
                                LPAD(SUBSTRING_INDEX(SUBSTRING_INDEX(`version`, \'.\', 3), \'.\', -1), 10, \'0\')) 
                                > 
                                CONCAT(LPAD(?,10,\'0\'), LPAD(?,10,\'0\'), LPAD(?,10,\'0\'))',
                            explode('.', $object['version'])
                        )
                        ->where('version', '>', $object['version']);
                });
            }

            // get all versions of current packages
            $versions = $q->get();
        }

        return $this->successResponse($versions);
    }
}
