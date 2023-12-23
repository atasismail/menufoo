<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {

        $data['tema_sayisi'] = Tema::count();
        $temaSayisi = User::with('tema')->where('id', Auth::user()->id)->get();
        $data['temam_sayisi'] = count($temaSayisi[0]->tema);
        return view('yonetim.components.index', compact('data'));
    }
}
