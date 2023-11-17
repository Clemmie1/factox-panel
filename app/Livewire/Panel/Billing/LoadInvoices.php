<?php

namespace App\Livewire\Panel\Billing;

use App\Models\Invoice;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class LoadInvoices extends Component
{

    public $amount = 5;

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.Billing.LoadInvoices');
    }

    public function loadMore()
    {
        $this->amount += 5;
    }

    public function render()
    {
        sleep(0.5);
        $list = Invoice::query()->take($this->amount)->where(['owner_id' => \Auth::id()])->orderByDesc('created_at')->get();
        return view('livewire.panel.billing.load-invoices', [
            'listInvoice' => $list
        ]);
    }
}
