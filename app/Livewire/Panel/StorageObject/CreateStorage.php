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

        $genIdBucket = 'bucket-'.Random::generate();


        if (!\App\Http\Controllers\Billing\Invoice::CreateInvoice(
            Auth::user(),
            'Хранилище объектов',
            $genIdBucket,
            'Создание хранилище объектов',
            20
        ))
        {
            $this->alert('warning', "<a class='text-muted' style='font-weight: bold;'>Не достаточно средств</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '280',
                'toast' => true,
            ]);
            return;
        }


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
