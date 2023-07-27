<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\ExternalApiService;

class DashboardController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->middleware('auth:web');
        $this->externalApiService = $externalApiService;
    }

    public function index(Request $request)
    {
        $data = $this->externalApiService->getAllItems();

        $page = $request->get('page', 1);
        $perPage = 9;
        $paginator = new LengthAwarePaginator(
            $data->forPage($page, $perPage),
            $data->count(),
            $perPage,
            $page
        );

        return view('dashboard', ['data' => $paginator]);
    }
}
