@extends('user.incident.layout.app',[
	'title' => 'Incident',
	'pageTitle' => 'Incident',
])

@section('content')
<div>
  <h1>Hello, {{ Auth::user()->name }}</h1>
  <p>Anda login sebagai {{ Auth::user()->role }}.</p>
</div>
<div class="card">
        <div class="border-bottom-danger">
            <!-- Button trigger modal -->
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Incident Tracking System </h3>
            </div>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success float-right mb-4" data-toggle="modal" data-target="#create-modal">
                Tambah Data
            </button>
          {{-- <a href="" class="btn btn-success float-right mb-4">Tambah Data</a> --}}
            <div class="table-responsive text-center">
                <table class="table table-bordered data-table" id="incidents">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Source</th>
                        <th>Segment</th>
                        <th>Incident Description</th>
                        <th>Status</th>
                        <th>Start</th>
                        <th>Start Date</th>
                        <th>Close</th>
                        <th>Close Date</th>
                        <th>Summary Incident</th>
                        <th>Action Taken</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($incidents as $key => $incident)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $incident->source }}</td>
                        <td>{{ $incident->Segment->name }}</td>
                        <td>{{ $incident->description }}</td>
                        <td>{{ $incident->Status->name }}</td>
                        <td>{{ date('h:i a', strtotime($incident->start)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($incident->start_date)) }}</td>
                        <td>{{ date('h:i a', strtotime($incident->close)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($incident->close_date)) }}</td>
                        <td>{{ $incident->summary}}</td>
                        <td>{{ $incident->action}}</td>
                        <td>
                            <a href="{{ route('incident.edit', $incident->id) }}"type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit-modal{{$incident->id}}">Edit</a>
                            <a href="{{route('incident.destroy', $incident->id)}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal{{$incident->id}}">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createForm" action="{{ route('incident.store') }}" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Source</label>
                            <input type="text" name="source" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segment</label>
                            <select name="segment_id" class="form-control" required>
                              @foreach($segments as $segment)
                              <option value="{{$segment->id}}" {{old('segment_id') == $segment->id ? 'selected' : ''}}>{{$segment->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label>Incident Description</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_id" class="form-control" required>
                              @foreach($status as $status)
                                <option value="{{$status->id}}" {{old('status_id') == $status->id ? 'selected' : ''}}>{{$status->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label>Start</label>
                            <input type="time" name="start" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Close</label>
                            <input type="time" name="close" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Close Date</label>
                            <input type="date" name="close_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Summary Incident</label>
                            <textarea type="text" name="summary" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Action</label>
                            <input type="text" name="action" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-store">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($incidents as $incident)
    <div class="modal fade" id="delete-modal{{$incident->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('incident.destroy', $incident->id) }}" method="post" id="form-delete">
                    <div class="modal-footer">
                    @csrf
                    @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-destroy">Ya, Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
</script>
@endpush