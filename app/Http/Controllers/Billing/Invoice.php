<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class Invoice extends Controller
{
    static public function CreateInvoice(User $user, null | string $item, null | string $item_id, null | string $item_description, null | int $item_price)
    {

        $generateInt = Random::generateInt(7);
        $userBalance = $user->balance;

        if ($userBalance >= $item_price){
            $user->decrement('balance', $item_price);
            \App\Models\Invoice::create([
                'owner_id' => $user->id,
                'invoice_id' => $generateInt,
                'invoice_to_name' => $user->name,
                'invoice_to_email' => $user->email,
                'item' => $item,
                'item_id' => $item_id,
                'item_description' => $item_description,
                'item_price' => $item_price,
            ]);
            return true;
        } else {
            return false;
        }

    }
}
