@extends('user.iis.layout.app',[
'title' => 'Security IIS',
'pageTitle' => 'Security IIS',
])

@section('content')

    <div class="notify"></div>
    <div class="card">
        <div class="border-bottom-warning">
            <!-- Button trigger modal -->
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Security </h3>
            </div>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create-modal">
                Tambah Data
            </button>
            <div class="table-responsive text-center">
                <table class="table table-bordered data-table" id="securities">
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="2">Shift Pagi</th>
                            <th colspan="2">Shift Siang</th>
                            <th colspan="2">Shift Malam</th>
                            <th colspan="3">Review</th>
                            <th rowspan="2" style="vertical-align: middle">Action</th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th>WAF</th>
                            <th>CHDE Splunk Log</th>
                            <th>WAF</th>
                            <th>CHDE Splunk Log</th>
                            <th>WAF</th>
                            <th>CHDE Splunk Log</th>
                            <th>Reviewer</th>
                            <th>Action</th>
                            <th>Recommendation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($securities as $security)
                            <tr>
                                <td>{{ $security->tanggal }}</td>
                                <td>{{ $security->waf_pagi }}</td>
                                <td>{{ $security->chde_pagi }}</td>
                                <td>{{ $security->waf_siang }}</td>
                                <td>{{ $security->chde_siang }}</td>
                                <td>{{ $security->waf_malam }}</td>
                                <td>{{ $security->chde_malam }}</td>
                                <td>{{ $security->reviewer }}</td>
                                <td>{{ $security->action }}</td>
                                <td>{{ $security->recommendation }}</td>
                                <td>
                                    <a href="{{ route('iis.security.edit', $security->id) }}"type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit-modal{{$security->id}}">Edit</a>
                                    <a href="{{route('iis.security.destroy', $security->id)}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete-modal{{$security->id}}">Delete</a>
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
                <form id="createForm" action="{{ route('iis.security.store') }}" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>WAF Pagi</label>
                            <input type="text" name="waf_pagi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>CHDE Pagi</label>
                            <input type="text" name="chde_pagi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>WAF Siang</label>
                            <input type="text" name="waf_siang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>CHDE Siang</label>
                            <input type="text" name="chde_siang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>WAF Malam</label>
                            <input type="text" name="waf_malam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>CHDE Malam</label>
                            <input type="text" name="chde_malam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Reviewer</label>
                            <input type="text" name="reviewer" class="form-control" required>
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

    @foreach ($securities as $security)
    <div class="modal fade" id="edit-modal{{$security->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-edit" action="{{ route('iis.security.update', $security->id) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{$security->tanggal}}">
                        </div>
                        <div class="form-group">
                            <label>WAF Pagi</label>
                            <input type="text" name="waf_pagi" class="form-control" value="{{$security->waf_pagi}}">
                        </div>
                        <div class="form-group">
                            <label>CHDE Pagi</label>
                            <input type="text" name="chde_pagi" class="form-control" value="{{$security->chde_pagi}}">
                        </div>
                        <div class="form-group">
                            <label>WAF Siang</label>
                            <input type="text" name="waf_siang" class="form-control" value="{{$security->waf_siang}}">
                        </div>
                        <div class="form-group">
                            <label>CHDE Siang</label>
                            <input type="text" name="chde_siang" class="form-control" value="{{$security->chde_siang}}">
                        </div>
                        <div class="form-group">
                            <label>WAF Malam</label>
                            <input type="text" name="waf_malam" class="form-control" value="{{$security->waf_malam}}">
                        </div>
                        <div class="form-group">
                            <label>CHDE Malam</label>
                            <input type="text" name="chde_malam" class="form-control" value="{{$security->chde_malam}}">
                        </div>
                        <div class="form-group">
                            <label>Reviewer</label>
                            <input type="text" name="reviewer" class="form-control" value="{{$security->reviewer}}">
                        </div>
                        <div class="form-group">
                            <label>Action</label>
                            <input type="text" name="action" class="form-control" value="{{$security->action}}">
                        </div>
                        <div class="form-group">
                            <label>Recommendation</label>
                            <input type="text" name="recommendation" class="form-control" value="{{$security->recommendation}}">
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

    @foreach($securities as $security)
    <div class="modal fade" id="delete-modal{{$security->id}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('iis.security.destroy', $security->id) }}" method="post" id="form-delete">
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
            $('#securities').DataTable( {
            } );
        } );
    </script>

@endpush
