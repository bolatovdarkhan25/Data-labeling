<?php

namespace App\Http\Livewire;

use App\Models\AudioFile;
use App\Models\LabeledAuthor;
use App\Models\LabeledSound;
use App\Models\LabeledText;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class MainPage extends Component
{
    use WithFileUploads;

    public $selectedFiles;
    public $labelingFile;
    public $isPlaying;
    public $labelingType;
    public $notSubscribed;

    protected $rules = [
        'selectedFiles' => 'required|array',
        'selectedFiles.*' => 'required|file|mimes:mp3,wav'
    ];

    protected $listeners = [
        'typeChosen' => 'labelTypeChosen',
        'refresh' => 'cancelLabeling'
    ];

    public function upload()
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

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
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $this->openLabelTypeModal($id);
    }

    public function cancelLabeling()
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $this->labelingFile = null;
        $this->labelingType = null;
    }

    public function openLabelTypeModal($id)
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $this->emit('openLabelTypesModal', $id);
    }

    public function labelTypeChosen($type, $id)
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $this->labelingFile = AudioFile::find($id);
        $this->labelingType = $type;
    }

    public function downloadSounds($id)
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $headers = ['id', 'start', 'end', 'sound'];

        $data = LabeledSound::where('audio_file_id', $id)->select($headers)->get()->toArray();

        $fileData = [$headers];

        foreach ($data as $key => $value) {
            $arr = [$key + 1, $value['start'], $value['end'], $value['sound']];
            array_push($fileData, $arr);
        }

        $handle = fopen('../storage/app/public/sound.csv', 'w');

        foreach ($fileData as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);

        return Storage::disk('public')->download('sound.csv');
    }

    public function downloadAuthors($id)
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $headers = ['id', 'start', 'end', 'author'];

        $data = LabeledAuthor::where('audio_file_id', $id)->select($headers)->get()->toArray();

        $fileData = [$headers];

        foreach ($data as $key => $value) {
            $arr = [$key + 1, $value['start'], $value['end'], $value['author']];
            array_push($fileData, $arr);
        }

        $handle = fopen('../storage/app/public/author.csv', 'w');

        foreach ($fileData as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);

        return Storage::disk('public')->download('author.csv');
    }

    public function downloadTexts($id)
    {
        if (!Auth::user()->subscription) {
            $this->notSubscribed = true;

            return;
        }

        $headers = ['id', 'start', 'end', 'author', 'text'];

        $data = LabeledText::where('audio_file_id', $id)->select($headers)->get()->toArray();

        $fileData = [$headers];

        foreach ($data as $key => $value) {
            $arr = [$key + 1, $value['start'], $value['end'], $value['author'], $value['text']];
            array_push($fileData, $arr);
        }

        $handle = fopen('../storage/app/public/text.csv', 'w');

        foreach ($fileData as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);

        return Storage::disk('public')->download('text.csv');
    }

    public function render()
    {
        $audioFiles = AudioFile::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('livewire.main-page', compact('audioFiles'));
    }
}
