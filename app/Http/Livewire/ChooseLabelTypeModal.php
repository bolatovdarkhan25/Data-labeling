<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;

class ChooseLabelTypeModal extends Component
{
    protected $listeners = [
        'openLabelTypesModal' => 'open'
    ];

    public $displayModal = false;
    public $chosenType;
    public $fileId;

    public function open($id)
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->fileId = $id;
        $this->chosenType = null;
        $this->displayModal = true;
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function choose($type)
    {
        $this->chosenType = $type;
    }

    public function save()
    {
        $this->validate([
            'chosenType' => ['required', 'string', Rule::in(['sound', 'author', 'text'])]
        ]);

        $this->close();

        $this->emit('typeChosen', $this->chosenType, $this->fileId);
    }

    public function render()
    {
        return view('livewire.choose-label-type-modal');
    }
}
