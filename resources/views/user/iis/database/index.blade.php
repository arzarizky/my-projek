@extends('user.iis.layout.app',[
'title' => 'Database IIS',
'pageTitle' => 'Database IIS',
])

@section('content')

    <div class="notify"></div>
    <div class="card">
        <div class="border-bottom-warning">
            <!-- Button trigger modal -->
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Database </h3>
            </div>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create-modal">
                Tambah Data
            </button>
            <div class="table-responsive text-center">
                <table class="table table-bordered data-table" id="databases">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>DBMS</th>
                            <th>Hostname</th>
                            <th>Aktivitas</th>
                            <th>Shift</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <th>Action</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($databases as $database)
							<tr>
								<td>{{ date('d-m-Y', strtotime($database->date)) }}</td>
								<td>{{$database->Dbms->name}}</td>
								<td>{{$database->Hostname->name}}</td>
								<td>{{$database->Activity->name}}</td>
								<td>{{$database->Shift->name}}</td>
								<td>{{$database->Time->name}}</td>
								<td>{{$database->status}}</td>
								<td>{{$database->detail}}</td>
								<td>{{$database->action}}</td>
                                <td>
                                    <a href="{{ route('iis.database.edit', $database->id) }}"type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit-modal{{$database->id}}">Edit</a>
                                    <a href="{{route('iis.database.destroy', $database->id)}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal{{$database->id}}">Delete</a>
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
                <form id="createForm" action="{{ route('iis.database.store') }}" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
						<div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>DBMS</label>
                            <select name="dbms_id" class="form-control" required>
								<option value="">-- Pilih DBMS --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Hostname</label>
                            <select name="hostname_id" class="form-control" required>
								<option value="">-- Pilih Hostname --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Aktivitas</label>
                            <select name="activity_id" class="form-control" required>
								<option value="">-- Pilih Aktivitas --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Shift</label>
                            <select name="shift_id" class="form-control" required>
                              @foreach($shifts as $shift)
                                <option value="{{$shift->id}}" {{old('shift_id') == $shift->id ? 'selected' : ''}}>{{$shift->name}}</option>
                              @endforeach
                           </select>
                        </div>
						<div class="form-group">
                            <label>Jam</label>
                            <select name="time_id" class="form-control" required>
                              @foreach($times as $time)
                                <option value="{{$time->id}}" {{old('time_id') == $time->id ? 'selected' : ''}}>{{$time->name}}</option>
                              @endforeach
                           </select>
                        </div>
						<div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>Detail</label>
                            <input type="text" name="detail" class="form-control" required>
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

    @foreach ($databases as $database)
    <div class="modal fade" id="edit-modal{{$database->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit" action="{{ route('iis.database.update', $database->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ $database->date }}" required>
                        </div>
						<div class="form-group">
                            <label>DBMS</label>
                            <select name="dbms_id" class="form-control" required>
								<option value="">-- Pilih DBMS --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Hostname</label>
                            <select name="hostname_id" class="form-control" required>
								<option value="">-- Pilih Hostname --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Aktivitas</label>
                            <select name="activity_id" class="form-control" required>
								<option value="">-- Pilih Aktivitas --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Shift</label>
                            <select name="shift_id" class="form-control" required>
                              @foreach($shifts as $shift)
                                <option value="{{$shift->id}}" {{old('shift_id') == $shift->id ? 'selected' : ''}}>{{$shift->name}}</option>
                              @endforeach
                           </select>
                        </div>
						<div class="form-group">
                            <label>Jam</label>
                            <select name="time_id" class="form-control" required>
                              @foreach($times as $time)
                                <option value="{{$time->id}}" {{old('time_id') == $time->id ? 'selected' : ''}}>{{$time->name}}</option>
                              @endforeach
                           </select>
                        </div>
						<div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="{{ $database->status }}" required>
                        </div>
						<div class="form-group">
                            <label>Detail</label>
                            <input type="text" name="detail" class="form-control" value="{{ $database->detail }}" required>
                        </div>
						<div class="form-group">
                            <label>Action</label>
                            <input type="text" name="action" class="form-control" value="{{ $database->action }}" required>
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
    @endforeach

    @foreach($databases as $database)
    <div class="modal fade" id="delete-modal{{$database->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('iis.database.destroy', $database->id) }}" method="post" id="form-delete">
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
        $(document).ready(function() {
            $('#databases').DataTable( {
            } );
        } );

        $(document).ready(function() {
            $.ajax({
                url: '{{ route('iis.database.dbmses') }}',
                method: 'GET',
                success: function(res) {
                    $.each(res, function(i, d) {
                        $('select[name="dbms_id"]').append('<option value="' + d.id + '" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });

        $('select[name="dbms_id"]').on('change', function(e) {
            let idDbms = $(this).find(':selected').data('id')
            $.ajax({
                url: '{{ route('iis.database.hostnames', '') }}' + '/' + idDbms,
                method: 'GET',
                success: function(res) {
                    $('select[name="hostname_id"]').html('');
                    $('select[name="hostname_id"]').append('<option value="">-- Pilih Hostname --</option>');
                    $.each(res, function(i, d) {
                        $('select[name="hostname_id"]').append('<option value="' + d.id +'" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });

        $('select[name="hostname_id"]').on('change', function(e) {
            let idHostname = $(this).find(':selected').data('id')
            $.ajax({
                url: '{{ route('iis.database.activities', '') }}' + '/' + idHostname,
                method: 'GET',
                success: function(res) {
                    $('select[name="activity_id"]').html('');
                    $('select[name="activity_id"]').append('<option value="">-- Pilih Aktivitas --</option>');
                    $.each(res, function(i, d) {
                        $('select[name="activity_id"]').append('<option value="' + d.id +'" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });
    </script>
@endpush
