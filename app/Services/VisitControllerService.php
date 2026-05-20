<?php

namespace App\Services;

use App\Models\Visit;

class VisitControllerService
{
    public function store(array $data): Visit
    {
        $visit = Visit::create($data);

        return $visit;
    }
}
