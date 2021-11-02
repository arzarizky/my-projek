@extends('user.iis.layout.app',[
	'title' => 'Network IIS',
	'pageTitle' => 'Network IIS',
])

@section('content')

	<div class="notify"></div>
	<div class="card">
		<div class="border-bottom-warning">
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Network </h3>
            </div>
        </div>
		<div class="card-body">
			<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create-modal">
				Tambah Data
			</button>
			<div class="table-responsive text-center">
				<table class="table table-bordered data-table" id="networks">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>Interkoneksi</th>
							<th>Nama</th>
							<th>Shift</th>
							<th>Jam</th>
							<th>Utilitas BW</th>
							<th>CPU</th>
							<th>Memory</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($networks as $network)
							<tr>
								<td>{{ date('d-m-Y', strtotime($network->date)) }}</td>
								<td>{{ $network->Interconnection->name }}</td>
								<td>{{ $network->Name->name }}</td>
								<td>{{ $network->Shift->name }}</td>
								<td>{{ $network->Time->name }}</td>
								<td>{{ number_format($network->utility) }}</td>
								<td>{{ $network->cpu }}&#37;</td>
								<td>{{ $network->memory }}&#37;</td>
                                <td>
                                    <a href="{{ route('iis.network.edit', $network->id) }}"type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit-modal{{$network->id}}">Edit</a>
                                    <a href="{{route('iis.network.destroy', $network->id)}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal{{$network->id}}">Delete</a>
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
                <form id="createForm" action="{{ route('iis.network.store') }}" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
						<div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Interkoneksi</label>
                            <select name="interconnection_id" class="form-control" required>
								<option value="">-- Pilih Interkoneksi --</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <select name="name_id" class="form-control" required>
								<option value="">-- Pilih Nama --</option>
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
                            <label>Utilitas</label>
                            <input type="number" name="utility" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>CPU</label>
                            <input type="number" min="1" max="100" name="cpu" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>Memory</label>
                            <input type="number" min="1" max="100" name="memory" class="form-control" required>
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

    @foreach ($networks as $network)
    <div class="modal fade" id="edit-modal{{$network->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit" action="{{ route('iis.network.update', $network->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ $network->date }}" required>
                        </div>
                        <div class="form-group">
                            <label>Interkoneksi</label>
                            <select name="interconnection_id" class="form-control" required>
								<option value="">-- Pilih Interkoneksi --</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <select name="name_id" class="form-control" required>
								<option value="">-- Pilih Nama --</option>
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
                            <label>Utilitas</label>
                            <input type="number" name="utility" class="form-control" value="{{ $network->utility }}" required>
                        </div>
						<div class="form-group">
                            <label>CPU</label>
                            <input type="number" min="1" max="100" name="cpu" class="form-control" value="{{ $network->cpu }}" required>
                        </div>
						<div class="form-group">
                            <label>Memory</label>
                            <input type="number" min="1" max="100" name="memory" class="form-control" value="{{ $network->memory }}" required>
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

    @foreach($networks as $network)
    <div class="modal fade" id="delete-modal{{$network->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('iis.network.destroy', $network->id) }}" method="post" id="form-delete">
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
            $('#networks').DataTable( {
            } );
        } );

		$(document).ready(function() {
            $.ajax({
                url: '{{ route('iis.network.interconnections') }}',
                method: 'GET',
                success: function(res) {
                    $.each(res, function(i, d) {
                        $('select[name="interconnection_id"]').append('<option value="' + d.id + '" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });

        $('select[name="interconnection_id"]').on('change', function(e) {
            let idInterconnection = $(this).find(':selected').data('id')
            $.ajax({
                url: '{{ route('iis.network.names', '') }}' + '/' + idInterconnection,
                method: 'GET',
                success: function(res) {
                    $('select[name="name_id"]').html('');
                    $('select[name="name_id"]').append('<option value="">-- Pilih Nama --</option>');
                    $.each(res, function(i, d) {
                        $('select[name="name_id"]').append('<option value="' + d.id +'" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });
	</script>
@endpush