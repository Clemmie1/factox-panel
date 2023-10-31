<?php

namespace App\Livewire\Panel\StorageObject\Bucket\Actions;

use App\Models\Invoice;
use App\Models\ObjectStorage;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RenewBucket extends Component
{
    use LivewireAlert;

    public $bucketID;
    public $nextDate;

    public function renewBucket()
    {
        sleep(1);

        if (Auth::user()->balance >= 20) {
            Auth::user()->decrement('balance', 20);
        } else {
            $this->alert('warning', "<a class='text-muted' style='font-weight: bold;'>Не достаточно средств</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '280',
                'toast' => true,
            ]);
            return;
        }

        ObjectStorage::where('bucket_id', $this->bucketID)->update([
            'expires' => now()->addDay(60),
        ]);

        $generateInt = \Nette\Utils\Random::generateInt(7);

        Invoice::create([
            'owner_id' => Auth::id(),
            'invoice_id' => $generateInt,
            'invoice_to_name' => Auth::user()->name,
            'invoice_to_email' => Auth::user()->email,
            'item' => 'Хранилище объектов',
            'item_id' => $this->bucketID,
            'item_description' => 'Продление хранилище объектов на 1 месяц',
            'item_price' => 20,
        ]);

        $this->dispatch('update-info');
        $this->dispatch('hideModal');
        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Продленено</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '200',
            'toast' => true,
        ]);

    }

    public function render()
    {
        return view('livewire.panel.storage-object.bucket.actions.renew-bucket');
    }
}
