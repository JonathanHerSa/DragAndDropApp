<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ElementoController extends Controller
{
    public function store(Request $request)
    {
        $elem = Elemento::where('id', $request->element)->first();
        if ($request->prov) {
            $request->validate([
                'element' => 'required|exists:elementos,id',
                'prov' => 'required',
            ]);
            $elem->update([
                'Prov_id' => $request->prov,
                'updated_at' => date(now()),
            ]);
        } else {
            $request->validate([
                'element' => 'required|exists:elementos,id',
                'list' => 'required|exists:listas,id',
            ]);
            $elem->update([
                'listas_id' => $request->list,
                'updated_at' => date(now()),
            ]);
        }
        return redirect(route('lista.index'));
    }
}
