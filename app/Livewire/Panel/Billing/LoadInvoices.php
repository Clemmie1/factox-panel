<?php

namespace App\Livewire\Panel\Billing;

use App\Models\Invoice;
use Livewire\Component;

class LoadInvoices extends Component
{

    public $amount = 5;

    public function get()
    {

    }

    public function loadMore()
    {
        $this->amount += 5;
    }

    public function render()
    {

        $list = Invoice::query()->take($this->amount)->where(['owner_id' => \Auth::id()])->orderByDesc('created_at')->get();
        return view('livewire.panel.billing.load-invoices', [
            'listInvoice' => $list
        ]);
    }
}
