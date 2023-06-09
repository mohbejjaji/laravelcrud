<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::latest()->paginate(5);
    
        return view('produits.index',compact('produits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required',
        ]);
    
        Produit::create($request->all());
     
        return redirect()->route('produits.index')
                        ->with('success','Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('produits.show',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required',
        ]);
    
        $produit->update($request->all());
    
        return redirect()->route('produits.index')
                        ->with('success','Produit mis à jour avec succès');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        
        $produit->delete();
        return redirect()->route('produits.index')
                  ->with('success','Produit supprimé avec succès');
    }
}
