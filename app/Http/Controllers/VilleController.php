<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        return view('villes.index', compact('villes'));
    }
    public function showEditScreen($id_ville)
    {
        session(['editVilleId' => $id_ville]);
        $villes = Ville::all(); // Ensure it's plural for multiple villes
        return view('villes.index', compact('villes'));
    }
    public function updateVille(Request $request, $id_ville)
    {
        $request->validate([
            'ville' => 'required|string|max:255',
        ]);

        $ville = Ville::findOrFail($id_ville);
        $ville->ville = $request->ville;
        $ville->save();

        session()->forget('editVilleId');
        return redirect('/showVilles')->with('success', 'Ville mise à jour avec succès.');
    }

    public function deleteVille(Request $request){
    $request->validate([
        'id'=>'required|exists:villes,id',
    ]);
    $ville=Ville::findOrFail($request->id);
    $ville->delete();
    return redirect('/showVilles')->with('success', 'Ville supprimée avec succès.');

    }
    public function create(Request $request){
        $request->validate([
            'ville' => 'required|string|max:255',
        ]);
        Ville::create([
            'ville'=>$request->ville,
            'nombreHabitant'=>0,
        ]);
        return redirect('/showVilles')->with('success', 'Ville ajoutée avec succès.');

    }

}
