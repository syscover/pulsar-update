<?php namespace Syscover\Update\Services;

use Syscover\Core\Exceptions\ModelNotChangeException;
use Syscover\Core\Services\Service;
use Syscover\Update\Models\Version;

class VersionService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'package_id'    => 'required|numeric|exists:admin_package,id',
            'version'       => 'required|max:20',
            'name'          => 'required|between:2,255'
        ]);

        return Version::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'package_id'    => 'numeric|exists:admin_package,id',
            'version'       => 'max:20',
            'name'          => 'between:2,255'
        ]);

        $object = Version::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException();

        // save changes
        $object->save();

        return $object;
    }
}