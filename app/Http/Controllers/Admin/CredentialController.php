<?php

namespace App\Http\Controllers\Admin;

use App\Credential;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credentialEN = Credential::whereTranslation('anchor', 'anchor_en')->firstOrFail();
        $credentialRU = $credentialEN->getTranslation('ru', true);

        return view(
            'admin.credentials.index',
            [
                'credentialEN'  => $credentialEN,
                'credentialRU'  => $credentialRU,
                'logotypes'     => $credentialEN->images
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.credentials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name_en'   => 'required',
            'company_name_ru'   => 'required',
            'logo'              => 'required|image'
        ]);

        Credential::add($request->all());

        return redirect()->route('credentials.index');
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
     * @param  Credential $credential
     * @return \Illuminate\Http\Response
     */
    public function edit(Credential $credential)
    {
        $credentialEN = $credential->whereTranslation('anchor', 'anchor_en')->firstOrFail();
        $credentialRU = $credentialEN->getTranslation('ru', true);

        $logotypes = $credentialEN->images;

        return view(
            'admin.credentials.edit',
            [
                'credentialEN'  => $credentialEN,
                'credentialRU'  => $credentialRU,
                'logotypes'          => $logotypes
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Credential $credential
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Credential $credential)
    {
        $this->validate($request, [
            'company_name_en'   => 'required',
            'company_name_ru'   => 'required',
            'logo'              => 'required|image'
        ]);

        $credential->edit($request->all());

        return redirect()->route('credentials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Credential::find($id)->remove();
        return redirect()->route('credentials.index');
    }
}
