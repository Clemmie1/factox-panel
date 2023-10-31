<?php

namespace App\Livewire\Panel\Support;

use App\Http\Controllers\OCI\ObjectStorage\ListObjects;
use App\Models\SupportTicket;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class LoadTickets extends Component
{
    public $ticketID;
    public $data = null;
    public $dataStats = [];

    public function mount()
    {

        $statusCounts = SupportTicket::selectRaw('ticket_status, COUNT(*) as count')
            ->whereIn('ticket_status', [0, 1, 3])
            ->groupBy('ticket_status')
            ->pluck('count', 'ticket_status')
            ->all();


        $this->dataStats = [
            'countStatus0' => $statusCounts[0] ?? 0,
            'countStatus1' => $statusCounts[1] ?? 0,
            'countStatus3' => $statusCounts[3] ?? 0,
        ];

        $this->data = SupportTicket::where(['owner_id'=>\Auth::user()->id])->orderBy('ticket_status')->get();
    }

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.Support.loadListTickets');
    }

    public function render()
    {
        return view('livewire.panel.support.load-tickets');
    }
}
