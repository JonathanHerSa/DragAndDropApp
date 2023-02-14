<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Elemento;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaController extends Controller
{
    public function index()
    {
        $listas = Lista::all();
        $elementos = [];
        foreach ($listas as $list) {
            $elementos[$list->nombre] = Elemento::where('listas_id', $list->id)->get();
        }
        return Inertia::render('AppServicios', ['listas' => $listas, 'elementos' => $elementos]);
    }
}