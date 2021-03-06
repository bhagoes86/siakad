@extends('Akademik.masterAkademik')

@section('judul', 'Edit Data Mahasiswa')

@section('content')
	<div class="container-fluid">
		<div class="col s12 m6 l4">
			<div class="card z-depth-2">
				<div class="card-content">
					<span class="card-title text-center"><strong class="cyan-text">Edit Data mahasiswa</strong></span>
					<br>
						<div class="container-fluid">
							{{ Form::open(array('method' => 'post' ,'action' => ['Akademik\Mahasiswa\MahasiswaController@update',encrypt($data->id)],'files' => true, 'class' => 'col s12')) }}
								{{csrf_field()}}
								{{ Form::hidden('_method','PATCH') }}
								<div class="row">
									<div class="col s12 m6 input-field">
										<i class="material-icons prefix">format_list_numbered</i>
										{{ Form::text('nim',$data->nim,['id' => 'nim','data-length' => '8']) }}
										<label for="nim">NIM</label>
									</div>
									<div class="input-field col s12 m6">
										<i class="material-icons prefix">account_circle</i>
										{{ Form::text('nama',$data->nama,['id' => 'nama','data-length' => '30']) }}
										<label for="nama">Nama Mahasiswa</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m6">
										<i class="material-icons prefix">phone</i>
										{{ Form::text('no_tlp',$data->no_tlp,['id' => 'notlp','data-length' => '12']) }}
										<label for="notlp">No Telpon</label>
									</div>
									<div class="col s12 m6 input-field">
										<i class="material-icons prefix">email</i>
										{{ Form::text('email',$data->email,['id' => 'email','data-length' => '30']) }}
										<label for="email">E-mail</label>
									</div>
								</div>
								<div class="row">
									<div class="col s12 m6 input-field">
										<i class="material-icons prefix">assignment_ind</i>
										{{ Form::text('tempat',$data->tempat,['id' => 'tempat', 'data-length' => '20']) }}
										<label for="tempat">Tempat Lahir</label>
									</div>
									<div class="col s12 m6 input-field">
										<i class="material-icons prefix">perm_contact_calendar</i>
										{{ Form::text('tanggal',$data->tanggal,['id' => 'datepicker','data-length' => '15']) }}
										<label for="datepicker">Tanggal Lahir</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m6">
										<div class="row">
											<div class="col s12 m4 ">
												<i class="material-icons prefix">accessibility</i>
												<label>Jenis Kelamin</label>
											</div>
											@if($data->jenis_kelamin == 'Laki-Laki')
												<div class="col s12 m4">
													{{ Form::radio('jenis_kelamin','Laki-Laki',true,['id' => 'jenis_kelamin','class' => 'with-gap']) }}
													<label for="jenis_kelamin">Laki-Laki</label>
												</div>
												<div class="col s12 m4">
													{{ Form::radio('jenis_kelamin','Perempuan',false,['id' => 'jenis_kelamin1','class' => 'with-gap']) }}
													<label for="jenis_kelamin1">Perempuan</label>
												</div>
											@else
												<div class="col s12 m4">
													{{ Form::radio('jenis_kelamin','Laki-Laki',false,['id' => 'jenis_kelamin','class' => 'with-gap']) }}
													<label for="jenis_kelamin">Laki-Laki</label>
												</div>
												<div class="col s12 m4">
													{{ Form::radio('jenis_kelamin','Perempuan',true,['id' => 'jenis_kelamin1','class' => 'with-gap']) }}
													<label for="jenis_kelamin1">Perempuan</label>
												</div>
											@endif
										</div>
									</div>
									<div class="col s12 m6 input-field">
										<div class="file-field input-field">
									    	<div class="btn">
									    		<span>File</span>
									    		{{ Form::file('foto') }}
									    	</div>
									    	<div class="file-path-wrapper">
									    		<input class="file-path validate" type="text">
									    	</div>
									    </div>
									</div>
								</div>
								<div class="row">
									<div class="col s12 m6 input-field">
										<i class="material-icons prefix">library_books</i>
										{{ Form::textarea('alamat',$data->alamat,['id' => 'alamat','data-length' => '100', 'class' => 'materialize-textarea']) }}
										<label for="alamat">Alamat :</label>
									</div>
									<div class="col s12 m6 input-field">
										<select name="id_jurusan" class="blue-text">
											@foreach($jurusan as $jurusan)
												@if($data->id_jurusan == $jurusan->id)
													<option value="{!! $jurusan->id !!}" selected>{!! $jurusan->nama_jurusan !!}</option>
												@else
													<option value="{!! $jurusan->id !!}">{!! $jurusan->nama_jurusan !!}</option>
												@endif
											@endforeach
										</select>
										
									</div>
								</div>
								<div class="row">
									<div class="col s12 text-center">
										<button class="btn btn-sm waves-light waves-effect blue"><i class="material-icons right">cloud_upload</i>Update</button>
									</div>
								</div>
							{{ Form::close() }}
						</div>
				</div>
			</div>
		</div>
	</div>
		@if($errors->any())
			@foreach($errors->all() as $error)
				<script type="text/javascript">
			      		const Icon = '<i class="material-icons print">clear</i>';
						const Message = '{!! $error !!}';
						const $Content = Icon + Message ;
					Materialize.toast( $Content, 4000,'rounded red' );
	      		</script>
      		@endforeach
		@endif	
	</div>
@endsection