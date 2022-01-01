<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <main class="mainh-100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center padre">
                    <div class="card card-fondo">
                        <div class="card-body">
                            <h2>
                                Registrar Pelicula
                            </h2>
                            <form action="/peliculas" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre_pelicula">Nombre de pelicula</label>
                                    <input type="text" name="nombre_pelicula" id="nombre_pelicula" class="form-control" value="{{old('nombre_pelicula')}}">
                                    {!! $errors->first('nombre_pelicula','<br><small id="nombre_peliculaHelp" class="alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_pelicula">Descripcion</label>
                                    <textarea  name="descripcion_pelicula" id="descripcion_pelicula" class="form-control">
                                        {{old('descripcion_pelicula')}}
                                    </textarea>
                                    {!! $errors->first('descripcion_pelicula','<br><small id="descripcion_peliculaHelp" class="alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="tipo_pelicula">Genero de Pelicula</label>
                                    <select name="tipo_pelicula" id="tipo_pelicula" class="form-control">
                                        <option value="accion">Accion</option>
                                        <option value="comedia">Comedia</option>
                                        <option value="romance">Romance</option>
                                        <option value="terror">Terror</option>
                                    </select>
                                    {!! $errors->first('tipo_pelicula','<br><small id="tipo_peliculaHelp" class="alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="fecha_estreno_pelicula">Fecha de Estreno Pelicula</label>
                                    <input type="date" name="fecha_estreno_pelicula" id="fecha_estreno_pelicula" class="form-control" value="{{old('fecha_estreno_pelicula')}}">
                                    {!! $errors->first('fecha_estreno_pelicula','<br><small id="fecha_estreno_peliculaHelp" class="alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label for="precio_pelicula">Precio de la Pelicula</label>
                                    <input type="text" name="precio_pelicula" id="precio_pelicula" class="form-control" value="{{old('precio_pelicula')}}">
                                    {!! $errors->first('precio_pelicula','<br><small id="precio_peliculaHelp" class="alert alert-danger">:message</small>') !!}
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>       
</body>
</html>