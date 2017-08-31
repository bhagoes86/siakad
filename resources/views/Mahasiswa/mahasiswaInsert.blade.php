@extends('Mahasiswa.masterMahasiswa')

@section('title', 'Insert Data')

@section('content')
	<div class="container">
		<form method="post" action="{{url('Mahasiswa')}}">
			<div class="form-group row">
				{{csrf_field()}}
				<label class="col-sm-2 col-form-label col-form-label-lg">Nim :</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" placeholder="Masukan NIM">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label col-form-label-lg">Nama :</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label col-form-label-lg">Alamat :</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-form-label-lg col-sm-2">Jenis Kelamin :</label>
				<div class="col-sm-10">
					<select name="jenis_kelamin">
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-form-label col-form-label-lg col-sm-2">No Tlp :</label>
				<div class="col-sm-10">
					<input type="text" name="no_tlp" placeholder="eg.085799999999" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label-lg col-form-label">Tepmat Tanggal Lahir :</label>
				<div class="col-sm-10">
					<input type="text" name="ttl" placeholder="Masukan Tanggal Lahir" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label col-form-label-lg">Jurusan :</label>
				<div class="col-sm-10">
					<select name="id_jurusan">
						<option value="1">Teknik Informatika</option>
						<option value="2">Teknik Elektro</option>
					</select>
				</div>
			</div>
			<div class="col-sm-12 text-center">
				<button type="submit" class="btn btn-primary btn-sm">Save</button>
			</div>
		</form>
	</div>
@endsection