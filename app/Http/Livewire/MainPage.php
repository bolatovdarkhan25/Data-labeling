<?php

namespace App\Http\Livewire;

use App\Models\AudioFile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class MainPage extends Component
{
    use WithFileUploads;

    public $selectedFiles;
    public $labelingFile;
    public $isPlaying;
    public $labelingType;

    protected $rules = [
        'selectedFiles' => 'required|array',
        'selectedFiles.*' => 'required|file|mimes:mp3,wav'
    ];

    protected $listeners = [
        'typeChosen' => 'labelTypeChosen',
        'addRegion' => 'addRegion'
    ];

    public function upload()
    {
        $this->validate();

        foreach ($this->selectedFiles as $selectedFile) {
            $path = $selectedFile->store('public/audio-files');

            if ($path) {
                AudioFile::create([
                    'name' => $selectedFile->getClientOriginalName(),
                    'path' => substr($path, 7),
                    'user_id' => Auth::id()
                ]);
            }
        }

        $this->selectedFiles = null;

        $this->render();
    }

    public function label($id)
    {
        $this->openLabelTypeModal($id);
    }

    public function cancelLabeling()
    {
        $this->labelingFile = null;
    }

    public function openLabelTypeModal($id)
    {
        $this->emit('openLabelTypesModal', $id);
    }

    public function labelTypeChosen($type, $id)
    {
        $this->labelingFile = AudioFile::find($id);
        $this->labelingType = $type;
    }

    public function addRegion($region)
    {
        dd($region);
    }

    public function render()
    {
        $audioFiles = AudioFile::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('livewire.main-page', compact('audioFiles'));
    }
}
