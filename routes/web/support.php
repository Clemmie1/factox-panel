<?php
use Illuminate\Support\Facades\Route;
use \App\Models\SupportTicket;

Route::get('/support', function () {
    return view('Panel.Support.tickets');
})->middleware(['verified', 'auth'])->name('support.tickets');

Route::get('/support/ticket/{ticket_id}', function ($ticket_id) {

    $get = SupportTicket::where([
        'owner_id' => Auth::id(),
        'ticket_id' => $ticket_id,
    ])->first();

    if ($get){
        return view('Panel.Support.ViewTicket.home')->with([
            'ticketData' => $get,
            'ticketID' => $ticket_id,
        ]);
    } else {
        return redirect(\route('support.tickets'));
    }

})->middleware(['verified', 'auth'])->name('support.tickets.viewticket');
