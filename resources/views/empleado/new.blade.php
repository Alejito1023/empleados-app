<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Empleado</title>
  </head>
  <body>
    <div class="container">
        <h1>Add Empleado</h1>
        <form method="POST" action="{{ route("empleados.store") }}">
            @csrf
            <div class="mb-3">
              <label for="codigo" class="form-label">Code</label>
              <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
              disabled="disabled">
              <div id="codigoHelp" class="form-text">Empleado Code</div>
            </div>
    
            <div class="mb-3">
              <label for="name" class="form-label">Empleado</label>
              <input type="text" required class="form-control" id="name" aria-describedby="nameHelp"
                 name="name" placeholder="empleado name.">
            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" required class="form-control" id="apellido" aria-describedby="nameHelp"
                 name="apellido" placeholder="apellido name.">
            </div>

            <div class="mb-3">
              <label for="posicion" class="form-label">Posicion</label>
              <input type="text" required class="form-control" id="posicion" aria-describedby="nameHelp"
                 name="posicion" placeholder="posicion name.">
            </div>
    

            <label for="departamento">Departamento:</label>
            <select class="form-select"  id="departamento" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id}}">{{$departamento->dep_nomb}}</option>
                @endforeach
            </select>



            <div class="mb-3">
              <label for="fecha_contratacion" class="form-label">Fecha_contratacion</label>
              <input type="date" required class="form-control" id="fecha_contratacion" aria-describedby="nameHelp"
                 name="fecha_contratacion" placeholder="fecha_contratacion name.">
            </div>


            <div class="mb-3">
              <label for="salario" class="form-label">Salario</label>
              <input type="text" required class="form-control" id="salario" aria-describedby="nameHelp"
                 name="salario" placeholder="salario name.">
            </div>


            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('empleados.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
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