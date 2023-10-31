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

        $list = Invoice::take($this->amount)->where(['owner_id' => \Auth::id()])->get();
        $listCount = Invoice::where(['owner_id' => \Auth::id()])->count();
        return view('livewire.panel.billing.load-invoices', [
            'listInvoice' => $list,
            'InvoiceTotal' => $listCount,
        ]);
    }
}
