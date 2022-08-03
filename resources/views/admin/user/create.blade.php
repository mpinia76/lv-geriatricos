@extends('admin.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Usuario
	      <small>Crear</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="{{ route('user.index') }}">Usuarios</a></li>
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
	            <h3 class="box-title">Crear usuario</h3>
	          </div>   
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('user.store') }}" method="post">
	          {{ csrf_field() }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}">
                </div>

                <!--<div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{ old('phone') }}">
                </div>-->

                <div class="form-group">
                  <label for="password">Clave</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Clave" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirmar clave</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar clave">
								</div>
								
								<div class="form-group">
                  <label for="status">Estado</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" value="0" @if (old('status') == 1)
                      checked
                    @endif value="1">Estado</label>
                  </div>
                </div>

                <div class="form-group">
                <label>Roles</label>
                <div class="row">
                  @foreach ($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox">
                          <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                        </div>
                      </div>
                  @endforeach
                </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Guardar</button>
	              <a href='{{ route('user.index') }}' class="btn btn-warning">Volver</a>
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