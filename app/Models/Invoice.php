<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'item_name',
        'item_code',
        'price_per_item',
        'amount_paid',
        'quantity'
    ];

    public function handleStore($item, $quantity)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $this->user_id = $user->id;
            $this->quantity = $quantity;
            $this->item_name = $item['nama'];
            $this->item_code = $item['kode'];
            $this->price_per_item = $item['harga'];
            $this->amount_paid = $item['harga'] * $quantity;
            $this->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
