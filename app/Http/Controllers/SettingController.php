<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=\App\Models\Akun::All();
        $setting=\App\Models\Setting::All();
        return view('admin.setting.setting' ,
        ['akun' => $akun,  'setting'=> $setting]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        $kode = $request->kode;
        $akun = $request->akun;
        foreach($akun as $key => $no)
        {
            $input['no_akun'] = $akun[$key];
            $setting= DB::table('Setting')
            ->where('Id_setting',$kode[$key])
            ->update($input);
        }
        Alert::warning('Pesan ','Setting Akun telah dilakukan ');
        return redirect('setting');
           
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
    public function destroy($id)
    {
        //
    }
}
