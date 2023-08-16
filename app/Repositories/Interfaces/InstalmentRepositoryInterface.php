<?php

namespace App\Repositories\Interfaces;

Interface InstalmentRepositoryInterface
{
    public function allInstalments();
    public function storeInstalment($data);
    public function updateInstalment($data);
    public function destroyInstalment($id);
}
