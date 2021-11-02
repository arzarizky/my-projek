@extends('user.iis.layout.app',[
'title' => 'Fraud',
'pageTitle' => 'Fraud',
])

@section('content')

    <div class="notify"></div>
    <div class="card">
        <div class="border-bottom-warning">
            <!-- Button trigger modal -->
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Fraud </h3>
            </div>
        </div>
        <div class="card-body">
            <h5>URL Web Fraud: <a href="https://192.168.137.118/wsf/index.php" target="_blank">https://192.168.137.118/wsf/index.php</a></h5>
            <br>
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create-modal">
                Tambah Data
            </button>
            <div class="table-responsive text-center">
                <table class="table table-bordered data-table" id="frauds">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Shift Pagi</th>
                            <th>Shift Siang</th>
                            <th>Shift Malam</th>
                            <th colspan="3">Review</th>
							<th rowspan="2" style="vertical-align: middle">Action</th>
                        </tr>
                        <tr>
                            <th style="width: 8%">Tanggal</th>
                            <th style="width: 17%">Alert & Web Dashboard</th>
                            <th style="width: 17%">Alert & Web Dashboard</th>
                            <th style="width: 17%">Alert & Web Dashboard</th>
                            <th>Reviewer</th>
                            <th>Action</th>
                            <th>Recommendation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($frauds as $fraud)
                                <tr>
                                    <td>{{ $fraud->tanggal }}</td>
                                    <td style="text-align: left">{!! nl2br(e($fraud->shift_pagi)) !!}</td>
                                    <td style="text-align: left">{!! nl2br(e($fraud->shift_siang)) !!}</td>
                                    <td style="text-align: left">{!! nl2br(e($fraud->shift_malam)) !!}</td>
                                    <td>{{ $fraud->review }}</td>
                                    <td>{{ $fraud->action }}</td>
                                    <td>{{ $fraud->recommendation }}</td>
									<td>
										<a href="{{ route('iis.fraud.edit', $fraud->id) }}"type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit-modal{{$fraud->id}}">Edit</a>
										<a href="{{route('iis.fraud.destroy', $fraud->id)}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal{{$fraud->id}}">Delete</a>
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
                <form id="createForm" action="{{ route('iis.fraud.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Shift Pagi</label>
                            <textarea type="text" name="shift_pagi" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Shift Siang</label>
                            <textarea type="text" name="shift_siang" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Shift Malam</label>
                            <textarea type="text" name="shift_malam" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <input type="text" name="review" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Action</label>
                            <input type="text" name="Action" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Recommendation</label>
                            <input type="text" name="recommendation" class="form-control" required>
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

    @foreach ($frauds as $fraud)
    <div class="modal fade" id="edit-modal{{$fraud->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit" action="{{ route('iis.fraud.update', $fraud->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{$fraud->tanggal}}">
                        </div>
                        <div class="form-group">
                            <label>Shift Pagi</label>
                            <textarea type="text" name="shift_pagi" class="form-control">{{$fraud->shift_pagi}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Shift Siang</label>
                            <textarea type="text" name="shift_siang" class="form-control">{{$fraud->shift_siang}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Shift Malam</label>
                            <textarea type="text" name="shift_malam" class="form-control">{{$fraud->shift_malam}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <input type="text" name="review" class="form-control" value="{{$fraud->review}}">
                        </div>
                        <div class="form-group">
                            <label>Action</label>
                            <input type="text" name="action" class="form-control" value="{{$fraud->action}}">
                        </div>
                        <div class="form-group">
                            <label>Recommendation</label>
                            <input type="text" name="recommendation" class="form-control" value="{{$fraud->recommendation}}">
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

    @foreach($frauds as $fraud)
    <div class="modal fade" id="delete-modal{{$fraud->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('iis.fraud.destroy', $fraud->id) }}" method="post" id="form-delete">
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
            $('#frauds').DataTable( {
            } );
        } );
    </script>
@endpush
