<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Services\ExternalApiService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class InvoiceController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->middleware('auth:api');
        $this->externalApiService = $externalApiService;
    }

    public function store(InvoiceRequest $request)
    {
        $invoice = new Invoice();
        $data =  $this->externalApiService->getItemById($request->item_id);
        if ($data->isEmpty()) {
            return redirect()->to('/not-found');
        }
        $this->externalApiService->buyItem($request->item_id, $request->quantity);
        $invoice->handleStore($data, $request->quantity);
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully made a purchase',
        ]);
    }

    public function getInvoices()
    {
        $user = Auth::user();
        $invoices = Invoice::where('user_id', $user->id)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'OK',
            'data' => $invoices,
        ]);
    }
}
