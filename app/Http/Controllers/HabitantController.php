<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitantRequest;
use Illuminate\Http\Request;
use App\Models\Habitant;
use App\Models\Ville;  // Make sure you import the Ville model

class HabitantController extends Controller
{
    // Index method to list all habitants
    public function index()
    {
        // Fetch habitants with their associated city (ville), paginated
        $habitants = Habitant::with('ville')->paginate(10);
        $villes = Ville::all();  // Fetch all villes (cities) to pass to the view
        return view('habitants.index', compact('habitants', 'villes'));  // Pass both habitants and villes to the view
    }

    // Show the form to create a new habitant (GET request)
    public function create()
    {
        $villes = Ville::all();  
        return view('habitants.create', compact('villes'));  
    }

    public function store(StoreHabitantRequest $request)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        } else {
            $path = null;  
        }
                
        Habitant::create([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'ville_id' => $request->ville_id,
            'photo' => $path,
        ]);
        
        return redirect('/')->with('success', 'Habitant ajouté avec succès !');
    }

    public function edit($id)
    {
        $habitant = Habitant::findOrFail($id);
        return view('habitants.edit', compact('habitant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cin' => 'required|string|unique:habitants,cin,' . $id,
            'nom' => 'required|string|max:55',
            'prenom' => 'required|string|max:55',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $habitant = Habitant::findOrFail($id);
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $habitant->photo = $path;
        }

        $habitant->update([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'ville_id' => $request->ville_id,
        ]);

        return redirect('/habitants.index')->with('success', 'Habitant mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $habitant = Habitant::findOrFail($id);
        $habitant->delete();
        
        return redirect('/habitants.index')->with('success', 'Habitant supprimé avec succès !');
    }
}
