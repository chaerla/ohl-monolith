<?php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{

    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->middleware('auth:web');
        $this->externalApiService = $externalApiService;
    }

    public function show($id)
    {
        $data = $this->externalApiService->getItemById($id);
        if ($data->isEmpty()) {
            return redirect()->to('/not-found');
        }
        return view('item', compact('data'));
    }
}
