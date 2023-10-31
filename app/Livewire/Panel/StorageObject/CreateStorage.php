<?php

namespace App\Livewire\Panel\StorageObject;

use App\Jobs\CreateObjectStorage;
use App\Livewire\Panel\Account\UpdateEmail;
use App\Models\Invoice;
use App\Models\ObjectStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Livewire;
use Nette\Utils\Random;

class CreateStorage extends Component
{

    use LivewireAlert;

    #[Rule('required', message: 'Введите имя сегмента', onUpdate: true)]
    public $nameBucket;

    #[Rule('required', message: 'Тип сегмента', onUpdate: true)]
    public $typeBucket;

    public function createBucket()
    {
        $this->validate();
        sleep(2);

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

        $genIdBucket = 'bucket-'.Random::generate();
        $generateInt = \Nette\Utils\Random::generateInt(7);
        Invoice::create([
            'owner_id' => Auth::id(),
            'invoice_id' => $generateInt,
            'invoice_to_name' => Auth::user()->name,
            'invoice_to_email' => Auth::user()->email,
            'item' => 'Хранилище объектов',
            'item_id' => $genIdBucket,
            'item_description' => 'Создание хранилище объектов',
            'item_price' => 20,
        ]);

        ObjectStorage::create([
            'owner_id' => Auth::id(),
            'bucket_name' => $this->nameBucket,
            'bucket_id' => $genIdBucket,
            'expires' => now()->addDay(30),
        ]);

        dispatch(new CreateObjectStorage($genIdBucket));
        $this->dispatch('hideDrawer');

    }



    public function render()
    {
        $data = json_decode(Storage::get('price/ObjectStorage.json'), true);
        return view('livewire.panel.storage-object.create-storage', [
            'dataPrice' => $data
        ]);
    }
}
