<?php

namespace App\Http\Livewire;

use App\Models\AudioFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class MainPage extends Component
{
    use WithFileUploads;

    public $selectedFile;

    protected $rules = [
        'selectedFile' => 'required|file|mimes:mp3,m4a,mpa,wav'
    ];

    public function upload()
    {
        $this->validate();

        $path = $this->selectedFile->store('audio-files');

        if ($path) {
            AudioFile::create([
                'name' => $this->selectedFile->getClientOriginalName(),
                'path' => $path,
                'user_id' => Auth::id()
            ]);
        }

        $this->render();
    }

    public function render()
    {
        $audioFiles = AudioFile::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('livewire.main-page', compact('audioFiles'));
    }
}
