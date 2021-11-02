@extends('user.kontak.layout.app',[
	'title' => 'Kontak',
	'pageTitle' => 'Kontak',
])

@section('content')

    <div class="notify"></div>
    <div class="card">
        <div class="border-bottom-danger">
            <!-- Button trigger modal -->
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Kontak </h3>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table table-bordered data-table" id="fraud-table">
                    <thead>
                        <tr>
                            
                            <th style="vertical-align: middle"></th>
                            <th colspan="2" style="vertical-align: middle">L 2</th>
                            <th colspan="2" style="vertical-align: middle">L 3</th>
                            <th colspan="2" style="vertical-align: middle">L 4</th>
                            <th colspan="2" style="vertical-align: middle">L 5</th>
                        </tr>
                        <tr>
                            <th style="width: 8% vertical-align: middle">Divisi</th>
                            <th style="width: 8% vertical-align: middle">Nama</th>
                            <th style="width: 8% vertical-align: middle">No. Hp</th>
                            <th style="width: 8% vertical-align: middle">Nama</th>
                            <th style="width: 8% vertical-align: middle">No. Hp</th>
                            <th style="width: 8% vertical-align: middle">Nama</th>
                            <th style="width: 8% vertical-align: middle">No. Hp</th>
                            <th style="width: 8% vertical-align: middle">Nama</th>
                            <th style="width: 8% vertical-align: middle">No. Hp</th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    <td rowspan="2" style="vertical-align: middle">Network</td>
                                    <td style="text-align: left">Aldian Dwi Septian</td>
                                    <td style="text-align: left">082242711989</td>
                                    <td rowspan="2" style="text-align: left ">Rudi Himawan</td>
                                    <td rowspan="2" style="text-align: left">08111756934</td>
                                    <td rowspan="10" style="text-align: left">Ahmad Rizal Sani</td>
                                    <td rowspan="10" style="text-align: left">08121178844</td>
                                    <td rowspan="16" style="text-align: left">Erwin Setiabudi</td>
                                    <td rowspan="16" style="text-align: left">081318545850</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left">Binar Dwi Cahya</td>
                                    <td style="text-align: left">081384101660</td>
                                </tr>
                                <tr>
                                  <td rowspan="4" style="vertical-align: middle">Server</td>
                                  <td style="text-align: left">Bayu Setiawan</td>
                                  <td style="text-align: left">081285966988</td>
                                  <td rowspan="4"></td>
                                  <td rowspan="4"></td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Hanindyo Prabowo</td>
                                  <td style="text-align: left">08111007575</td>                                  
                                </tr>
                                <tr>
                                  <td style="text-align: left">Dhanny Ichsan</td>
                                  <td style="text-align: left">085210172721</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Emil Mahenra</td>
                                  <td style="text-align: left">085281854747</td>
                                </tr>
                                <tr>
                                  <td rowspan="4" style="vertical-align: middle">Database</td>
                                  <td style="text-align: left">Emil Mahenra</td>
                                  <td style="text-align: left">085281854747</td>
                                  <td rowspan="4"></td>
                                  <td rowspan="4"></td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Emil Mahenra</td>
                                  <td style="text-align: left">085281854747</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Emil Mahenra</td>
                                  <td style="text-align: left">085281854747</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Emil Mahenra</td>
                                  <td style="text-align: left">085281854747</td>
                                </tr>
                                <tr>
                                  <td rowspan="4" style="vertical-align: middle">Security</td>
                                  <td style="text-align: left">M. Thoriq Hafiz</td>
                                  <td style="text-align: left">081213320996</td>
                                  <td rowspan="4"></td>
                                  <td rowspan="4"></td>
                                  <td rowspan="6">D. N Indra Haryawan</td>
                                  <td rowspan="6">081213494972</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Salma Ayu Fahira</td>
                                  <td style="text-align: left">081216001700</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Fahri Awaluddin</td>
                                  <td style="text-align: left">082258061134</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Sudhista Febriawan Wira Pratama</td>
                                  <td style="text-align: left">082129994448</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Fraud</td>
                                    <td style="text-align: left">Sri Wiarsih</td>
                                    <td style="text-align: left">082123669667</td>
                                    <td rowspan="2">Rangga Yudha</td>
                                    <td rowspan="2">0811187465</td>
                                </tr>
                                <tr>
                                  <td style="text-align: left">Riky Saptaria</td>
                                  <td style="text-align: left">081316007233</td>
                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel"
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
    @endforeach --}}

@endsection

@push('js')
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#fraud-table').DataTable( {
            } );
        } );
    </script> --}}
@endpush

@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
</script>
@endpush