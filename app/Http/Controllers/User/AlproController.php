<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAlproRequest;

//models
use App\Models\Shift;
use App\Models\Time;
use App\Models\Alpro;
use App\Models\IpAddress;

class AlproController extends Controller
{
    public function index()
    {
        $alpros = Alpro::all();
        $shifts = Shift::all();
        $times = Time::all();
        return view('user.iis.alpro.index', compact('alpros', 'shifts', 'times'));
    }

    public function getIpAddresses()
    {
        $ip_addresses = IpAddress::all();
        return response()->json($ip_addresses, 200);
    }

    public function getHostnameAlprosbyIpAddress(IpAddress $ip_address)
    {
        return response()->json($ip_address->hostnameAlpros, 200);
    }
    
    public function store(Request $request)
    {
        Alpro::create($request->all());
        return redirect()->route('iis.alpro');
    }

    public function edit(Alpro $alpro)
	{
		$alpro = Alpro::find($alpro);
		return redirect()->route('iis.alpro');
	}

    public function update(UpdateAlproRequest $request, Alpro $alpro)
	{
        $data = $request->validated();
        $model = $alpro->fill($data);

        $model->save();
        return redirect()->route('iis.alpro')->with('sukses update', 'Data berhasil diperbarui');
	}

    public function destroy(Alpro $alpro)
    {
        $alpro->delete();
        return redirect()->route('iis.alpro');
    }
}
