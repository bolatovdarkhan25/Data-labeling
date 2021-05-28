<?php

namespace App\Http\Controllers;

use App\Models\LabeledAuthor;
use App\Models\LabeledSound;
use App\Models\LabeledText;
use Illuminate\Http\Request;

class LabelAudioController extends Controller
{
    public function saveSounds(Request $request)
    {
        $request->validate([
            'audio_file_id' => 'required|numeric|exists:audio_files,id',
            'regions' => 'required|array',
            'regions.*' => 'required|array',
            'regions.*.start' => 'required|numeric',
            'regions.*.end' => 'required|numeric',
            'regions.*.sound' => 'required|string',
        ]);

        $audioFileId = $request['audio_file_id'];

        $deletingFiles = LabeledSound::where('audio_file_id', $audioFileId)->get();

        foreach ($deletingFiles as $file) {
            $file->delete();
        }

        foreach ($request['regions'] as $region) {
            LabeledSound::create([
                'start' => $region['start'],
                'end' => $region['end'],
                'sound' => $region['sound'],
                'audio_file_id' => $audioFileId
            ]);
        }

        return response()->json(['message' => 'Successfully saved'], 200);
    }

    public function saveAuthors(Request $request)
    {
        $request->validate([
            'audio_file_id' => 'required|numeric|exists:audio_files,id',
            'regions' => 'required|array',
            'regions.*' => 'required|array',
            'regions.*.start' => 'required|numeric',
            'regions.*.end' => 'required|numeric',
            'regions.*.author' => 'required|string',
        ]);

        $audioFileId = $request['audio_file_id'];

        $deletingFiles = LabeledAuthor::where('audio_file_id', $audioFileId)->get();

        foreach ($deletingFiles as $file) {
            $file->delete();
        }

        foreach ($request['regions'] as $region) {
            LabeledAuthor::create([
                'start' => $region['start'],
                'end' => $region['end'],
                'author' => $region['author'],
                'audio_file_id' => $audioFileId
            ]);
        }

        return response()->json(['message' => 'Successfully saved'], 200);
    }

    public function saveTexts(Request $request)
    {
        $request->validate([
            'audio_file_id' => 'required|numeric|exists:audio_files,id',
            'regions' => 'required|array',
            'regions.*' => 'required|array',
            'regions.*.start' => 'required|numeric',
            'regions.*.end' => 'required|numeric',
            'regions.*.author' => 'required|string',
            'regions.*.text' => 'required|string',
        ]);

        $audioFileId = $request['audio_file_id'];

        $deletingFiles = LabeledText::where('audio_file_id', $audioFileId)->get();

        foreach ($deletingFiles as $file) {
            $file->delete();
        }

        foreach ($request['regions'] as $region) {
            LabeledText::create([
                'start' => $region['start'],
                'end' => $region['end'],
                'author' => $region['author'],
                'text' => $region['text'],
                'audio_file_id' => $audioFileId
            ]);
        }

        return response()->json(['message' => 'Successfully saved'], 200);
    }
}
