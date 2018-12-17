<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Module;
use App\Models\ModuleItem;
use Session;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::paginate(10);
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('modules.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validate the data */
        $this->validate($request , array(
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:50',
        ));
 
        $module = Module::create($request->only('branch_id', 'name', 'description'));
        
        foreach ($request->name_item as $key => $item) {
            $moduleItem = new ModuleItem();
            $moduleItem->module_id = $module->id;
            $moduleItem->name = $item;
            $moduleItem->description = $request->description_item[$key];
            $moduleItem->save();
        }
        
        Session::flash('success', 'Le module a été enregistré avec succès!');
        return redirect()->route('module.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        Session::flash('success', 'Le module a été supprimé avec succès!');
        return redirect()->route('modules.index');
    }
}
