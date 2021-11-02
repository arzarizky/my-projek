@extends('user.iis.layout.app',[
	'title' => 'Dashboard IIS',
	'pageTitle' => 'Dashboard IIS',
])

@section('content')

<div class="notify"></div>
<div class="card">
      <div class="border-bottom-danger">
        <!-- Button trigger modal -->
        <div class="ml-4 mt-2 mb-4 mt-4">
          <h3> Infrastruktur server & DB </h3>
        </div>
      </div>
        <div class="card-body">
            <div class="table-responsive">    
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                          <th>Hostname</th>
                          <th>CPU</th>
                          <th>Disk</th>
                          <th>Memory</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($alpros as $alpro)
                      <tr>
                        <td>{{ $alpro->HostnameAlpro->name }}</td>
                        <td>{{ $alpro->cpu }}&#37;</td>
                        <td>{{ $alpro->disk }}&#37;</td>
                        <td>{{ $alpro->memory }}&#37;</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
<!-- Table ke - 2  -->
<div class="card mt-4">
  <div class="border-bottom-danger">
      <!-- Button trigger modal -->
      <div class=" ml-4 mt-2 mb-2 mb-4 mt-4">
        <h3> Infrastruktur Network </h3>
      </div>
  </div>
      <div class="card-body">
          <div class="table-responsive">    
              <table class="table table-bordered data-table">
                  <thead>
                      <tr>
                          <th>Interkoneksi</th>
                          <th>CPU</th>
                          <th>Memory</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($networks as $network)
                        <tr>
                          <td>{{ $network->Interconnection->name }}</td>
                          <td>{{ $network->cpu }}</td>
                          <td>{{ $network->memory }}</td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
</div>



  <div class="card mt-4">
    <div class="border-bottom-danger">
      <div class="mt-4 mb-4 ml-3">
        <h3> Ultilasi Link </h3>
      </div>
    </div>
      <div class="card-body">
        <div class="table-responsive">    
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>Interkoneksi</th>
                <th>Summary</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
  </div>

  <div class="card mt-4">
    <div class="border-bottom-danger">
      <div class="mt-1 mb-1 ml-2">
        <div class="mt-4 mb-4 ml-3">
          <h3> Security & fraud </h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">    
        <table class="table table-bordered data-table" id="tabel-fraud">
          <thead>
            @if(session('success'))
            <div class="notify"><div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div></div>
            @endif
            @if(session('update success'))
            <div class="notify"><div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('update success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div></div>
            @endif
            @if(session('delete success'))
            <div class="notify"><div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('delete success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div></div>
            @endif
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create-modal">
              Tambah Data
            </button>
            <tr>
              <th>No</th>
              <th>Security</th>
              <th>Fraud</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data_security_fraud as $key => $security_fraud)  
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$security_fraud->security}}</td>
              <td>{{$security_fraud->fraud}}</td>
              <td>
                <a href="/iis/edit/{{$security_fraud->id}}" type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit{{$security_fraud['id']}}" >Edit</a> 
                <a href="/iis/delete/{{$security_fraud->id}}" type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#delete{{$security_fraud['id']}}" >Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- Modal Create -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create-modalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="createForm" action="{{route('iis.create')}}" method="POST">
          @csrf
        <div class="form-group">
            <label for="s">Security</label>
            <input type="text" id="s" name="security" class="form-control">
        </div>
        <div class="form-group">
          <label for="f">Fraud</label>
          <input type="text" id="f" name="fraud" class="form-control">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-store">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Create -->

<!-- Modal Edit -->
@foreach ($data_security_fraud as $key => $security_fraud)  
<div class="modal fade" id="edit{{$security_fraud['id']}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create-modalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="createForm" action="/iis/update/{{$security_fraud->id}}" method="POST">
          @csrf
        <div class="form-group">
            <label for="s">Security</label>
            <input type="text" name="security" value="{{$security_fraud->security}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="f">Fraud</label>
          <input type="text" id="f" name="fraud" value="{{$security_fraud->fraud}}" class="form-control">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-store" >Perbarui</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Edit -->

<!-- Destroy Modal -->
@foreach($data_security_fraud as $key => $security_fraud)
<div class="modal fade" id="delete{{$security_fraud['id']}}" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="/iis/delete/{{$security_fraud->id}}" type="button" class="btn btn-danger btn-destroy">Hapus</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Destroy Modal -->

@stop

@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#tabel-fraud').DataTable( {
            } );
        } );
</script>
@endpush