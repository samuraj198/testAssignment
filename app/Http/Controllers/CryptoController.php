<?php

namespace App\Http\Controllers;

use App\Http\Resources\CryptoResource;
use App\Models\Crypto;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();

        return response()->json([
            'success' => true,
            'message' => 'Получены цены биткоина из БД',
            'data' => CryptoResource::collection($cryptos)
        ]);
    }
}
