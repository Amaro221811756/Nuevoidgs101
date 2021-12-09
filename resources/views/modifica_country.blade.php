<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title> Paises del mundo </title>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('modifica_country')}}" method="GET">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" class="form-control" value="{{ $country[0]->Code }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ $country[0]->Name }}" readonly>
                    </div> 
                    <div class="form-group">
                        <label for="region">Región</label>
                        <input type="text" name="region" class="form-control" value="{{ $country[0]->Region }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="IndepYear">Año de Independencia</label>
                        <input type="text" name="IndepYear" class="form-control" value="{{ $country[0]->IndepYear }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="population">Población</label>
                        <input type="text" name="population" class="form-control" value="{{ $country[0]->Population }}" >
                    </div>
                    <div class="form-group">
                        <label for="SurfaceArea">Superficie</label>
                        <input type="text" name="SurfaceArea" class="form-control" value="{{ $country[0]->SurfaceArea }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lifeexpectancy">Expectativa de vida</label>
                        <input type="text" name="lifeexpectancy" class="form-control" value="{{ $country[0]->LifeExpectancy }}" >
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Actualizar" class="btn btn-success">
                        <a href="{{ route('country') }}" class="btn btn-warning">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>