<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSecurityRequest;
use App\Models\Security;

class SecurityController extends Controller
{
    public function index()
    {
        $securities = Security::all();
        return view('user.iis.security.index', compact('securities'));
    }

    public function store(Request $request)
    {
        Security::create($request->all());
		return redirect()->route('iis.security')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function edit(Security $security)
	{
		$security = Security::find($security);
		return redirect()->route('iis.security');
	}

    public function update(UpdateSecurityRequest $request, Security $security)
	{
        $data = $request->validated();
        $model = $security->fill($data);

        $model->save();
        return redirect()->route('iis.security')->with('sukses update', 'Data berhasil diperbarui');
	}
    public function destroy(Security $security)
    {
        $security->delete();
        return redirect()->route('iis.security')->with('sukses delete', 'Data berhasil dihapus');
    }
}
