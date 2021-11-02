<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;
use App\Models\Incident;
use App\Models\Segment;
use App\Models\Status;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();
        $segments = Segment::all();
        $status = Status::all();
        return view('user.incident.index', compact('incidents', 'segments', 'status'));
    }

    public function store(Request $request)
	{
        Incident::create($request->all());
		return redirect()->route('incident');
	}

    public function edit(Incident $incident)
	{
		$incident = Incident::find($incident);
		return redirect()->route('incident');
	}

    public function update(UpdateIncidentRequest $request, Incident $incident)
	{
        $data = $request->validated();
        $model = $incident->fill($data);

        $model->save();
        return redirect()->route('incident');
	}
    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incident');
    }
}
