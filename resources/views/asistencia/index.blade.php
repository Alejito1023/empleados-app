<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Asistencia</title>
  </head>
  <body>
    <div class="container">
    <h1>Listado de Asistencia</h1>
    <a href="{{ route('asistencias.create')}}" class="btn btn-success"> Add </a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Empleado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora Entrada</th>
            <th scope="col">Hora Salida</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($asistencias as $asistencia)
                
          <tr>
            <th scope="row">{{ $asistencia->id}}</th>
            <td>{{ $asistencia->empleado_id}}</td>
            <td>{{ $asistencia->fecha}}</td>
            <td>{{ $asistencia->hora_entrada}}</td>
            <td>{{ $asistencia->hora_salida}}</td>

            <td>
                <a href=" {{ route("asistencias.edit" , ['asistencia'=>$asistencia->id]) }} " 
                    class=" btn btn-info"> Edit </a></li>
                <form action="{{ route('asistencias.destroy', ['asistencia' =>$asistencia->id]) }}"
                    method="POST" style="display: inline-back">
                    @method('delete')
                    @csrf
                   <input class="btn btn-danger" type="submit" value="delete">
                </form>
            </td>
          </tr>

           @endforeach
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>