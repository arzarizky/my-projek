<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\security_fraud;
use App\Models\Alpro;
use App\Models\Network;

class IisController extends Controller
{
    public function index()
	{
		$alpros = Alpro::all();
		$networks = Network::all();
		$data_security_fraud = security_fraud::all();
		return view('user.iis.index', compact('data_security_fraud', 'alpros', 'networks'));
	}

	public function create(Request $request)
	{
		security_fraud::create($request->all());
		return redirect()->route('iis')->with('success', 'Data berhasil ditambahkan');
	}

	public function edit($security_fraud)
	{
		$security_fraud = security_fraud::find($security_fraud);
		return redirect()->route('iis');
		
	}

	public function update(Request $request,$security_fraud)
	{
		$security_fraud = security_fraud::find($security_fraud);
		$security_fraud->update( $request->all());
		return redirect()->route('iis')->with('update success', 'Data berhasil diperbarui');
	}

	public function destroy($security_fraud)
	{
		$security_fraud = security_fraud::find($security_fraud);
		$security_fraud->delete();
		return redirect('iis')->with('delete success', 'Data berhasil dihapus');
	}
}
