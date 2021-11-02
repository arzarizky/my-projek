@extends('user.iis.layout.app',[
	'title' => 'Alpro Critical',
	'pageTitle' => 'Alpro Critical',
])

@section('content')

	<div class="notify"></div>
	<div class="card">
		<div class="border-bottom-warning">
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Alpro Critical </h3>
            </div>
        </div>
		<div class="card-body">
			<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create-modal">
				Tambah Data
			</button>
			<div class="table-responsive text-center">
				<table class="table table-bordered data-table" id="alpros">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>IP Address</th>
							<th>Hostname</th>
							<th>Shift</th>
							<th>Jam</th>
							<th>CPU</th>
							<th>Disk</th>
							<th>Memory</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($alpros as $alpro)
							<tr>
								<td> {{ date('d-m-Y', strtotime($alpro->date)) }} </td>
								<td>{{$alpro->IpAddress->name}}</td>
								<td>{{$alpro->HostnameAlpro->name}}</td>
								<td>{{$alpro->Shift->name}}</td>
								<td>{{$alpro->Time->name}}</td>
								<td>{{$alpro->cpu}}&#37; </td>
								<td>{{$alpro->disk}}&#37; </td>
								<td>{{$alpro->memory}}&#37; </td>
                                <td>
                                    <a href="{{ route('iis.alpro.edit', $alpro->id) }}"type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit-modal{{$alpro->id}}">Edit</a>
                                    <a href="{{route('iis.alpro.destroy', $alpro->id)}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal{{$alpro->id}}">Delete</a>
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
                <form id="createForm" action="{{ route('iis.alpro.store') }}" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
						<div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>IP Address</label>
                            <select name="ip_address_id" class="form-control" required>
								<option value="">-- Pilih IP Address --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Hostname</label>
                            <select name="hostname_alpro_id" class="form-control" required>
								<option value="">-- Pilih Hostname --</option>
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
                            <label>CPU</label>
                            <input type="number" min="1" max="100" name="cpu" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label>Disk</label>
                            <input type="number" min="1" max="100" name="disk" class="form-control" required>
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

    @foreach ($alpros as $alpro)
    <div class="modal fade" id="edit-modal{{$alpro->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit" action="{{ route('iis.alpro.update', $alpro->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ $alpro->date }}" required>
                        </div>
						<div class="form-group">
                            <label>IP Address</label>
                            <select name="ip_address_id" class="form-control" required>
								<option value="">-- Pilih IP Address --</option>
							</select>
                        </div>
						<div class="form-group">
                            <label>Hostname</label>
                            <select name="hostname_alpro_id" class="form-control" required>
								<option value="">-- Pilih Hostname --</option>
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
                            <label>CPU</label>
                            <input type="number" min="1" max="100" name="cpu" class="form-control" value="{{ $alpro->cpu }}" required>
                        </div>
						<div class="form-group">
                            <label>Disk</label>
                            <input type="number" min="1" max="100" name="disk" class="form-control" value="{{ $alpro->disk }}" required>
                        </div>
						<div class="form-group">
                            <label>Memory</label>
                            <input type="number" min="1" max="100" name="memory" class="form-control" value="{{ $alpro->memory }}" required>
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

    @foreach($alpros as $alpro)
    <div class="modal fade" id="delete-modal{{$alpro->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('iis.alpro.destroy', $alpro->id) }}" method="post" id="form-delete">
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
            $('#alpros').DataTable( {
            } );
        } );

		$(document).ready(function() {
            $.ajax({
                url: '{{ route('iis.alpro.ip_addresses') }}',
                method: 'GET',
                success: function(res) {
                    $.each(res, function(i, d) {
                        $('select[name="ip_address_id"]').append('<option value="' + d.id + '" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });

        $('select[name="ip_address_id"]').on('change', function(e) {
            let idIpAddress = $(this).find(':selected').data('id')
            $.ajax({
                url: '{{ route('iis.alpro.hostname_alpros', '') }}' + '/' + idIpAddress,
                method: 'GET',
                success: function(res) {
                    $('select[name="hostname_alpro_id"]').html('');
                    $('select[name="hostname_alpro_id"]').append('<option value="">-- Pilih Hostname --</option>');
                    $.each(res, function(i, d) {
                        $('select[name="hostname_alpro_id"]').append('<option value="' + d.id +'" data-id="' + d.id + '">' + d.name + '</option>');
                    });
                }
            });
        });
	</script>
@endpush