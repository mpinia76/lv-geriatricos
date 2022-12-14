@extends('admin.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Rol
	      <small>Crear</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="{{ route('role.index') }}">Roles</a></li>
	      <!--<li class="active">Create Form</li>-->
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Crear rol</h3>
	          </div>   
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('role.store') }}" method="post">
	          {{ csrf_field() }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
	                <label for="name">Nombre</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
								</div>
								
								<div class="row">
									<!--<div class="col-lg-4">
										<label for="name">Posts Permissions</label>
										@foreach ($permissions as $permission)
											@if ($permission->for == 'post')
												<div class="checkbox">
													<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
												</div>
											@endif
										@endforeach
									</div>-->
									<div class="col-lg-4">
										<label for="name">Permisos de usuarios</label>
											@foreach ($permissions as $permission)
												@if ($permission->for == 'Usuario')
													<div class="checkbox">
														<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
													</div>
												@endif
											@endforeach
									</div>
	
									<!--<div class="col-lg-4">
										<label for="name">Other Permissions</label>
											@foreach ($permissions as $permission)
												@if ($permission->for == 'other')
													<div class="checkbox">
														<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
													</div>
												@endif
											@endforeach
									</div>-->
								</div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Guardar</button>
	              <a href='{{ route('role.index') }}' class="btn btn-warning">Volver</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
	        </div>
	        <!-- /.box -->

	        
	      </div>
	      <!-- /.col-->
	    </div>
	    <!-- ./row -->
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection