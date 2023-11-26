<?php

namespace App\Livewire\Panel\Billing;

use App\Models\Invoice;
use DB;
use Livewire\Component;

class LoadChart extends Component
{
    public function render()
    {

        $userId = \Auth::user()->id;

        $monthlyAmounts = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyAmounts["TotalAmountFor" . date('F', mktime(0, 0, 0, $month, 1))] = Invoice::where(['owner_id' => $userId])
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', date('Y'))
                ->sum('item_price');
        }

        return view('livewire.panel.billing.load-chart', ['getStatsForChart' => $monthlyAmounts]);
    }
}
