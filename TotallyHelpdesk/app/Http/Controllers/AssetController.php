<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function addAsset(Request $request)
    {
        DB::table('assets')
            ->insert([
                'name' => $request->input('name'),
                'itemtype' => $request->input('type'),
                'location' => $request->input('location'),
                'assettag' => $request->input('assettag'),
                'ipaddress' => $request->input('ipaddress'),
                'manufacturer' => $request->input('manufacturer'),
                'model' => $request->input('model'),
                'serialnumber' => $request->input('serial'),
                'purchasedate' => $request->input('purchase'),
                'renewby' => $request->input('renewal'),
                'productkey' => $request->input('key'),
                'currentlydisabled' => $request->input('disabled'),
            ]);

        return redirect('/assets');
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

    public function assetList()
    {
        $assets = DB::select('select * FROM assets WHERE isdeleted is null OR isdeleted = 0');

        return view('/assets', ['qassets' => $assets]);
    }

    public function deleteAsset(Request $request)
    {
        $affected = DB::update('update assets SET isdeleted = 1, deletionmethod =? WHERE id = ?', [$request->input('del'), $request->input('id')]);

        return redirect('/assets');
    }
}

