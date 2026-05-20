<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Resources\VisitResource;
use App\Services\VisitControllerService;

class VisitController extends Controller
{
    public function __construct(private VisitControllerService $visitControllerService)
    {}

    public function store(StoreVisitRequest $request)
    {
        $visit = $this->visitControllerService->store($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Посещение записано в базу данных',
            'data' => VisitResource::make($visit)
        ]);
    }
}
