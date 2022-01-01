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
        <div class="container-fluid">
            <div class="padre">
                <div class="card card-fondo">
                    <div class="card-header">
                            <h1>Lista De Peliculas</h1>
                            <a href="/peliculas/create" class="btn btn-info">Agragra</a>
                    </div>
                    <div class="card-body">
                        <table class="table-bordered">
                            <thead>
                                <th>Nº</th>
                                <th>Nombre de la pelicula</th>
                                <th>Descripcion de la plelicula</th>
                                <th>Tipo de pelicula</th>
                                <th>Fecha de Estreno</th>
                                <th>Precio</th>
                                <th>Accionesº</th>
                            </thead>
                            <tbody>
                                @forelse ($pelicula as $pel)
                                <tr>
                                    <td>{{$pel->id}}</td>
                                    <td>{{$pel->nombre_pelicula}}</td>
                                    <td>{{$pel->descripcion_pelicula}}</td>
                                    <td>{{$pel->tipo_pelicula}}</td>
                                    <td>{{$pel->fecha_estreno_pelicula}}</td>
                                    <td>{{$pel->precio_pelicula}}</td>
                                    <td>
                                        <button type="button" data-id="{{$pel->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                        <button type="button" data-id="{{$pel->id}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                @empty
                                        
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        {{ $pelicula->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{ asset('js/Crud.js') }}"></script>
</body>
</html>