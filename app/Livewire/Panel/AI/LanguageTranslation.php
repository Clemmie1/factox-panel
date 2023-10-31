<?php

namespace App\Livewire\Panel\AI;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LanguageTranslation extends Component
{

    use LivewireAlert;

    public $text;
    public $sourceLanguageCode;
    public $targetLanguageCode;

    public $translatedText = 'Перевод';

    public function translateText()
    {

        if ($this->text != null && $this->text != '')
        {
            $get = \App\Http\Controllers\OCI\AI\LanguageTranslation::textTranslation($this->text, 'en', 'ru');
            $this->translatedText = $get['documents'][0]['translatedText'];
            $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>request ok. ".$get['documents'][0]['key']."</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '300',
                'toast' => true,
            ]);
        }

    }

    public function resetText()
    {
        $this->reset('text');
        $this->translatedText = 'Перевод';
    }

    public function render()
    {
        return view('livewire.panel.a-i.language-translation');
    }
}
