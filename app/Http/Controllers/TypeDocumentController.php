<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use App\Http\Requests\StoreTypeDocumentRequest;
use App\Http\Requests\UpdateTypeDocumentRequest;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeDocument = TypeDocument::all();
        return $typeDocument;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $typeDocument = new TypeDocument();
        $typeDocument->name = $request->name;

        $typeDocument->save();
        return 'success';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $typeDocument = typeDocument::find($id);
        return $typeDocument;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $typeDocument = typeDocument::find($id);
        $typeDocument->name = $request->name ?? $typeDocument->name;
        $typeDocument->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $typeDocument = typeDocument::find($id);
        $typeDocument->delete();
        return 'delete success';
    }
}
