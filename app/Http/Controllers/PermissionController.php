<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registro = Permission::all();

        return view('permission.list',compact('registro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->get('name');
        $permission->label = $request->get('label');
        $permission->save();
        \Session::flash('flash_message',[
            'msg'=>"permission cadastrado!",
            'class'=>"alert-success" 
        ]);

        return redirect()->action('PermissionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);

        $permission->delete();
        
        \Session::flash('flash_message',[
            'msg'=>"permission cadastrado!",
            'class'=>"alert-success" 
        ]);

        return redirect()->action('PermissionController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Permission::find($id);

        return view('permission.edit',compact('registro'));
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
        $role = Permission::find($id);
        $role->name = $request->get('name');
        $role->label = $request->get('label');
        $role->update();
        \Session::flash('flash_message',[
            'msg'=>"permission cadastrado!",
            'class'=>"alert-success" 
        ]);

        return redirect()->action('PermissionController@index');
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
