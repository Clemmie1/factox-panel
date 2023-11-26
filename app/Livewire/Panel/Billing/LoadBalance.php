<?php

namespace App\Livewire\Panel\Billing;

use App\Models\Invoice;
use Auth;
use DB;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class LoadBalance extends Component
{

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.Billing.LoadBalance');
    }

    public function render()
    {
        sleep(0.5);
        $TotalAmountOfMonth = Invoice::query()
            ->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), date('Y-m'))
            ->sum('item_price');

        return view('livewire.panel.billing.load-balance', [
            'TotalBalance' => Auth::user()->balance,
            'TotalAmountOfMonth' => $TotalAmountOfMonth == 0 ? '0.00' : $TotalAmountOfMonth
        ]);
    }
}
