<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFraudRequest;
use App\Http\Requests\UpdateFraudRequest;
use App\Models\Fraud;

class FraudController extends Controller
{
    public function index()
    {
        $frauds = Fraud::all();
        // dd($frauds);
        return view('user.iis.fraud.index', compact('frauds'));
    }
    
    public function store(Request $request)
    {
        Fraud::create($request->all());
		return redirect()->route('iis.fraud')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function edit(Fraud $fraud)
	{
		$fraud = Fraud::find($fraud);
		return redirect()->route('iis.fraud');
	}

    public function update(UpdateFraudRequest $request, Fraud $fraud)
	{
        $data = $request->validated();
        $model = $fraud->fill($data);

        $model->save();
        return redirect()->route('iis.fraud')->with('sukses update', 'Data berhasil diperbarui');
	}

    public function destroy(Fraud $fraud)
    {
        $fraud->delete();
        return redirect()->route('iis.fraud')->with('sukses delete', 'Data berhasil dihapus');
    }
}
