@extends('admin.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Permiso
	      <small>Crear</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="{{ route('permission.index') }}">Permisos</a></li>
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
	            <h3 class="box-title">Crear permiso</h3>
	          </div>   
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('permission.store') }}" method="post">
	          {{ csrf_field() }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
	                <label for="name">Nombre</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
	              </div>

	              <div class="form-group">
	              	<label for="for">Para</label>
	              	<select name="for" id="for" class="form-control">
	              		<option selected disable>Seleccionar...</option>
						<option value="Usuario">Usuario</option>
	              	</select>
	              </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Guardar</button>
	              <a href='{{ route('permission.index') }}' class="btn btn-warning">Volver</a>
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