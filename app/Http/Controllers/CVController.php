<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller {
    //

    public function showCV() {
        $cvs = CV::with('user')->get()->each(function($cv) {
            $cv->image = Storage::url($cv->image);
            $cv->file = Storage::url($cv->file); 
        });
        return view('show-cv', ['cvs' => $cvs]);
    }

    public function showUserCV() {
        $cvs = auth()->user()->cvs()->with('user')->get()->each(function($cv) {
            $cv->image = Storage::url($cv->image);
            $cv->file = Storage::url($cv->file); 
        });
        return view('show-cv', ['cvs' => $cvs]);
    }

    public function createCV() {
        return view('create-cv');
    }

    public function searchCV($keyword) {
        $cvs = [];
        if(!empty($keyword)) {
            $cvs = CV::whereRaw("name LIKE '%$keyword%'")->get()->each(function($cv) {
                $cv->image = Storage::url($cv->image);
                $cv->file = Storage::url($cv->file); 
            });
        }

        return view('show-cv', ['cvs' => $cvs]);
    }

    public function storeCV(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'file' => 'required|file|mimes:pdf',
            'image' => 'required|image',
        ]);

        $file = $request->file('file');
        $image = $request->file('image');

        $filePath = Storage::put('/public/cv/' . $file->getBasename(), $file);
        $imagePath = Storage::put('/public/image/' . $image->getBasename(), $image);

        CV::create([
            'name' => $data['name'],
            'user_id' => auth()->user()->id,
            'content' => $request->input('content', '{}'),
            'file' => $filePath,
            'image' => $imagePath,
        ]);

        return redirect('/cv/my-cv');
    }
}
