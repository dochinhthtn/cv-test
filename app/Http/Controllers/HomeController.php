<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller {
    public function index() {
        $cvs = CV::with('user')->get()->each(function($cv) {
            $cv->image = Storage::url($cv->image);
            $cv->file = Storage::url($cv->file); 
        });
        return view('show-cv', ['cvs' => $cvs]);
    }

}
