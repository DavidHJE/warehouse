<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\State;
use App\Models\Supplier;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        return view('material.store', compact('states','categories','suppliers','warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'warranty' => $request->warranty,
            'spot' => $request->spot,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => Auth::id(),
            'removed_at' => null,
            'removed_by' => null,
            'removed_commentary' => null,
            'state_id' => $request->state_id,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'warehouse_id' => $request->warehouse_id
        ];

        //dd($request->all());
        Material::create($data);
        return redirect()->back()->with('message', 'Le matériel a était ajouter avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $states = State::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        return view('material.edit', compact('material','states','categories','suppliers','warehouses'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $data = [
            'name' => $request->name,
            'warranty' => $request->warranty,
            'spot' => $request->spot,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => Auth::id(),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_by' => Auth::id(),
            'removed_at' => null,
            'removed_by' => null,
            'removed_commentary' => null,
            'state_id' => $request->state_id,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'warehouse_id' => $request->warehouse_id
        ];

        $material->update($data);
        return redirect()->back()->with('message', 'Le matériel a était modifier avec succès!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
