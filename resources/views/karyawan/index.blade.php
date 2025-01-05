@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            {{$title}}
          </div>
          <h2 class="page-title">
            {{$title}}
          </h2>
        </div>
      </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                    @if (Session::get('success'))
                        <div class="alert alert-success">                       
                          {{Session::get('success')}}
                        </div>
                    @endif

                    @if (Session::get('warning'))
                        <div class="alert alert-warning">
                          {{Session::get('warning')}}
                        </div>
                    @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <a href="#" class="btn btn-primary" id="btnTambahkaryawan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>Tambah Data</a>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-12">
                      <form action="/karyawan" method="GET">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{Request('nama_karyawan')}}">
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="form-group">
                              <select name="kode_dept" id="kode_dept" class="form-select">
                                <option value="">Departemen</option>
                                @foreach ($departemen as $d)
                                  <option {{Request('kode_dept')== $d->kode_dept ? 'selected' : ''}} value="{{$d->kode_dept}}">{{$d->nama_dept}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="form-group">
                              <select name="kode_status" id="kode_status" class="form-select">
                                <option value="">Status</option>
                                @foreach ($status as $d)
                                  <option {{Request('kode_status')== $d->kode_status ? 'selected' : ''}} value="{{$d->kode_status}}">{{$d->nama_status}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-2">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                              Cari Data</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-12">
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Karyawan</th>
                                <th>Jabatan</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Departemen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                              <tr>
                                <td>1</td>
                                <td>12345</td>
                                <td>BONARDI</td>
                                <td>STAF IF</td>
                                <td>081288211355</td>
                                <td>BABELAN</td>
                                <td>NULL</td>
                                <td>NULL</td>
                                <td>NULL</td>
                        </tbody>
                    </table>
                    {{$karyawan->links('vendor.pagination.bootstrap-5')}}
                    </div>
                    </div>
                  </div>
              </div> 
            </div>
        </div>
    </div>
</div>

{{-- modal tambah --}}
<div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 12l14 0" /></svg>
                </span>
                <input type="text" id="nik" name="nik" value="" class="form-control" placeholder="Ketik NIK Anda">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                </span>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="" class="form-control" placeholder="Ketik Nama Anda">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-pentagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13.163 2.168l8.021 5.828c.694 .504 .984 1.397 .719 2.212l-3.064 9.43a1.978 1.978 0 0 1 -1.881 1.367h-9.916a1.978 1.978 0 0 1 -1.881 -1.367l-3.064 -9.43a1.978 1.978 0 0 1 .719 -2.212l8.021 -5.828a1.978 1.978 0 0 1 2.326 0z" /><path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" /><path d="M6 20.703v-.703a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.707" /></svg>
                </span>
                <input type="text" id="jabatan" name="jabatan" value="" class="form-control" placeholder="Ketik Jabatan Anda">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                </span>
                <input type="text" id="no_hp" name="no_hp" value="" class="form-control" placeholder="Ketik No Hp Anda">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 12l14 0" /></svg>
                </span>
                <input type="text" id="alamat" name="alamat" value="" class="form-control" placeholder="Ketikan Alamat Anda">
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
                <div class="form-label">Input Foto Anda</div>
                <input type="file" name="foto" class="form-control">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <select name="kode_status" id="kode_status" class="form-select">
                <option >Status</option>
                @foreach ($status as $d)
                  <option {{Request('kode_status')== $d->kode_status ? 'selected' : ''}} value="{{$d->kode_status}}">{{$d->nama_status}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <select name="kode_dept" id="kode_dept" class="form-select">
                <option >Departemen</option>
                @foreach ($departemen as $d)
                  <option {{Request('kode_dept')== $d->kode_dept ? 'selected' : ''}} value="{{$d->kode_dept}}">{{$d->nama_dept}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- modal edit --}}
<div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadeditform">
        
      </div>
    </div>
  </div>
</div>
@endsection
@push('myscript')
  <script>
    $(function() {
      $("#btnTambahkaryawan").click(function() {
        $("#modal-inputkaryawan").modal("show");
      });
      $(".edit").click(function() {
        var nik = $(this).attr('nik');   
        $.ajax({
          type : 'POST',
          url : '/karyawan/edit',
          cache: false,
          data : {
            _token : "{{csrf_token()}}",
            nik : nik
          },
          success : function(respond) {
            $("#loadeditform").html(respond);
          }
        });
        $("#modal-editkaryawan").modal("show");
      });

      $(".delete-confirm").click(function(e) {
        var form = $(this).closest('form');
        e.preventDefault();
        Swal.fire({
            title: "Apakah Anda Yakin Menghapus Data?",
            text: "Jika Ya, maka data akan terhapus permanent!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Saja!"
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
              Swal.fire({
                title: "Deleted!",
                text: "Data Berhasil Dihapus.",
                icon: "success"
              });
            }
          });
        });
      $("#frmKaryawan").submit(function() {
          var nik = $("#nik").val();
          var nama_lengkap = $("#nama_lengkap").val();
          var jabatan = $("#jabatan").val();
          var no_hp = $("#no_hp").val();
          var alamat = $("#alamat").val();
          var kode_status = $("#frmKaryawan").find("#kode_status").val();
          var kode_dept = $("#frmKaryawan").find("#kode_dept").val();
          if (nik == "") {
            // alert('NIK harus diisi');
            Swal.fire({
              title: 'Warning!',
              text: 'NIK harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#nik").focus();
            });
            return false;
          } else if (nama_lengkap == ""){
            Swal.fire({
              title: 'Warning!',
              text: 'Nama harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#nama_lengkap").focus();
            });
            return false;
          } else if (jabatan == ""){
            Swal.fire({
              title: 'Warning!',
              text: 'Jabatan harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#jabatan").focus();
            });
            return false;
          } else if (no_hp == ""){
            Swal.fire({
              title: 'Warning!',
              text: 'No Hp harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#no_hp").focus();
            });
            return false;
          } else if (alamat == ""){
            Swal.fire({
              title: 'Warning!',
              text: 'Alamat harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#alamat").focus();
            });
            return false;
          } else if (kode_status == ""){
            Swal.fire({
              title: 'Warning!',
              text: 'Status harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#kode_status").focus();
            });
            return false;
          } else if (kode_dept == ""){
            Swal.fire({
              title: 'Warning!',
              text: 'Departemen harus diisi!',
              icon: 'warning',
              confirmButtonText: 'Ok'
            }).then((result)=> {
              $("#kode_dept").focus();
            });
            return false;
          }
        });
    });
  </script>
@endpush