<?php namespace Syscover\Update\Controllers;

use Illuminate\Http\Request;
use Syscover\Core\Controllers\CoreController;
use Syscover\Core\Services\VersionService;
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





//        try {
//            $object = $this->model->findOrFail($id);
//        }
//        catch (ModelNotFoundException $e) {
//            $model = class_basename($e->getModel());
//            return $this->errorResponse('Does not exist any instance of ' . $model . ' with the given id', Response::HTTP_NOT_FOUND);
//        }

        return $this->successResponse(ActionService);
    }
}
