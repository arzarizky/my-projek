<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDatabaseRequest;

// models
use App\Models\Database;
use App\Models\Shift;
use App\Models\Time;
use App\Models\Dbms;
use App\Models\Hostname;


class DatabaseController extends Controller
{
    public function index()
    {
        $databases = Database::all();
        $shifts = Shift::all();
        $times = Time::all();
        return view('user.iis.database.index', compact('databases', 'shifts', 'times'));
    }

    public function getDbmses()
    {
        $dbmses = Dbms::all();
        return response()->json($dbmses, 200);
    }

    public function getHostnamesbyDbms(Dbms $dbms)
    {
        return response()->json($dbms->hostnames, 200);
    }

    public function getActivitiesbyHostname(Hostname $hostname)
    {
        return response()->json($hostname->activities, 200);
    }

    public function store(Request $request)
    {
        Database::create($request->all());
        return redirect()->route('iis.database');
    }
    
    public function edit(Database $database)
	{
		$database = Database::find($database);
		return redirect()->route('iis.database');
	}

    public function update(UpdateDatabaseRequest $request, Database $database)
	{
        $data = $request->validated();
        $model = $database->fill($data);

        $model->save();
        return redirect()->route('iis.database')->with('sukses update', 'Data berhasil diperbarui');
	}

    public function destroy(Database $database)
    {
        $database->delete();
        return redirect()->route('iis.database');
    }
}
