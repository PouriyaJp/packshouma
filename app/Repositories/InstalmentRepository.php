<?php
namespace App\Repositories;

use App\Models\Admin\Instalment;
use App\Repositories\Interfaces\InstalmentRepositoryInterface;

class InstalmentRepository implements InstalmentRepositoryInterface
{
    public function allInstalments()
    {
        return Instalment::all();
    }

    public function storeInstalment($data)
    {
        return Instalment::create($data);
    }

    public function updateInstalment($data)
    {
        $instalment = Instalment::find($data['id']);
        $instalment->update($data);
        return $instalment;
    }

    public function destroyInstalment($id)
    {
        return Instalment::destroy($id);
    }
}
