@extends('user.jadwal.layout.app',[
	'title' => 'Dashboard Jadwal',
	'pageTitle' => 'Dashboard Jadwal',
])

@section('content')
<div class="card">
        <div class="border-bottom-danger">
            <!-- Button trigger modal -->
            <div class="ml-4 mt-2 mb-4 mt-4 text-center">
                <h3> Jadwal </h3>
            </div>
        </div>
        <div class="card-body">
          <a href="" class="btn btn-success float-right mb-4">Tambah Data</a>
            <div class="table-responsive text-center">
                <table class="table table-bordered data-table" id="fraud-table">
                    <thead>
                      <th colspan="8">SERVER</th>
                    </thead>
                    <tbody>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive text-center mb-4">
                <table class="table table-bordered data-table" id="fraud-table">
                    <thead>
                      <th colspan="8">NETWORK</th>
                    </thead>
                    <tbody>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive text-center mb-4">
                <table class="table table-bordered data-table" id="fraud-table">
                    <thead>
                      <th colspan="8">DBA ON CALL</th>
                    </thead>
                    <tbody>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
</script>
@endpush