<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateNetworkRequest;

//models
use App\Models\Network;
use App\Models\Shift;
use App\Models\Time;
use App\Models\Interconnection;

class NetworkController extends Controller
{
    public function index()
    {
        $networks = Network::all();
        $shifts = Shift::all();
        $times = Time::all();
        return view('user.iis.network.index', compact('networks', 'shifts', 'times'));
    }

    public function getInterconnections()
    {
        $interconnections = Interconnection::all();
        return response()->json($interconnections, 200);
    }
    
    public function getNamesbyInterconnection(Interconnection $interconnection)
    {
        return response()->json($interconnection->names, 200);
    }

    public function store(Request $request)
    {
        Network::create($request->all());
        return redirect()->route('iis.network');
    }

    public function edit(Network $network)
	{
		$network = Network::find($network);
		return redirect()->route('iis.network');
	}

    public function update(UpdateNetworkRequest $request, Network $network)
	{
        $data = $request->validated();
        $model = $network->fill($data);

        $model->save();
        return redirect()->route('iis.network')->with('sukses update', 'Data berhasil diperbarui');
	}

    public function destroy(Network $network)
    {
        $network->delete();
        return redirect()->route('iis.network');
    }
}
