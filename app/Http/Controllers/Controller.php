<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function generateInvoiceUniq(){
        $latest = Transaction::latest()->first();
        if (!$latest) {
            return 'INV-00001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->uniq);
        return 'INV' . sprintf('%05d', $string+1);
    }
}
