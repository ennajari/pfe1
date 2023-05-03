@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap5.bundle.min.js') }}"></script>
    <title>Formulaire de salle</title>
</head>
<body style="background:linear-gradient(to bottom, #87CEFA, #1E90FF); ">
    <style>
body{
    font: italic small-caps bold 16px/2 cursive;
        margin: 0;
        padding: 0;
        background-image: url(ad.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-color:
}
input[type="button"] {
            background-color: #ccc;
            color: #333;
        }
        h1 {
            margin-top: 1%;
            color: rgb(0, 0, 0);
            text-align: center;
            font-size: 36px;
        }
input[type="submit"], input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 1%;
            margin-bottom: 10px;
        }
.container{
    text-align: center;
}
.container h2{
    font-size: 2vw;
    font-family: 'Courier New', Courier, monospace;
    margin-bottom: 40px;
    letter-spacing: 1.2px;
}
.styled {
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgb(124, 113, 203);
    background-image: linear-gradient(to top left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, 0.6), inset -2px -2px 3px rgba(0, 0, 0, 0.6);
}

.styled:hover {
    background-color: rgb(0, 132, 255);
}

.styled:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, 0.6), inset 2px 2px 3px rgba(0, 0, 0, 0.6);
}

form select{
    width: 450px;
    padding: 15px;
    padding-left: 10px;
    background-color: #fff;
    border-radius: 10px;
    margin-top: 2%;
    border: none;
    outline: none;
    font-size: 1.2rem;
    box-shadow: 0 5px 10px 0 rgb(0,0,0,0.25);
    cursor: pointer;
}
    </style>
<div class="container">
        <h1>professeur:</h1>

        <form method="POST" action="{{ route('professeur.store') }}">
            @csrf
            <label for="specialite">Spécialité :</label><br>
            <select name="specialite" id="specialite">
                <option value="{{ Auth()->user()->speciality }}">{{ Auth()->user()->speciality }}</option>
            </select>
            <br>

            <label for="fillier">Filière :</label><br>
    <select name="fillier" id="filliere">
        <option value="">-- Sélectionnez une filière --</option>

        @foreach($fillieres as $filliere)
            <option value="{{ $filliere->filliere }}" data-filliere="{{ $filliere->filliere }}">{{ $filliere->filliere }}</option>
        @endforeach
    </select>
    <div>
            <label for="specialite">Semestre :</label><br>

            <select name="semestre" id="semestre">
                <option value="">-- Sélectionnez un semestre --</option>
                @foreach($semestres as $semestre)
                    <option value="{{ $semestre->semestre }}" data-semestre="{{ $semestre->semestre }}">{{ $semestre->semestre }}</option>
                @endforeach
            </select>
        </div>
            <label for="specialite">module :</label><br>
            <select name="module" id="module">
                <option value="">-- Sélectionnez un module --</option>
                @foreach($modules as $module)
                @if(Auth()->user()->speciality==$module->specialite)
                    <option value="{{ $module->nom_module }}" data-filliere="{{ $module->filliere }}" data-semestre="{{ $module->semestre }}">{{ $module->nom_module }}</option>
                @endif
                @endforeach
            </select>

            <br>
            <input type="submit" value="Valider ✓" class="favorite styled" id="VA">
        </form>



    </div>
    <script>
        const semestreSelect = document.getElementById('semestre');
        const filliereSelect = document.getElementById('filliere');
        const moduleSelect = document.getElementById('module');

        semestreSelect.addEventListener('change', function() {
            filterModules();
        });

        filliereSelect.addEventListener('change', function() {
            filterModules();
        });

        function filterModules() {
            const selectedSemestre = semestreSelect.options[semestreSelect.selectedIndex].getAttribute('data-semestre');
            const selectedFilliere = filliereSelect.options[filliereSelect.selectedIndex].getAttribute('data-filliere');

            for (let i = 0; i < moduleSelect.options.length; i++) {
                const moduleOption = moduleSelect.options[i];
                const moduleSemestre = moduleOption.getAttribute('data-semestre');
                const moduleFilliere = moduleOption.getAttribute('data-filliere');

                if ((selectedSemestre === null || moduleSemestre === selectedSemestre) &&
                    (selectedFilliere === null || moduleFilliere === selectedFilliere)) {
                    moduleOption.style.display = 'block';
                } else {
                    moduleOption.style.display = 'none';
                }
            }
        }
    </script>

</body>

<style>
 form {
            margin-top: 1%;
            margin-right: 20%;
            margin-left: 20%;
            background-color: #cac4c4;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgb(0, 0, 0);
            font-size:x-large;
        }
  table {
  border-collapse: collapse;
  width: 80%;
  margin-left: 9%;
  margin-right: 5%;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}

th {
  background-color: gray;
  color: white;
}
h1{
    text-align: center;
}
p{
    margin-left: 4%;
    font-size: large;
}
button.favorite.styled {
    background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 1%;
            margin-bottom: 10px;
            margin-left: 48%;
}
</style>
<br><br>
        <h1>Tableau de selection de professeur:</h1>

        <table class=" table-striped">
            <thead>
              <tr>
                <th>Nom de prof</th>
                <th>Specialite</th>
                <th>Filier</th>
                <th>Semester</th>
                <th>module</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($nom as $nm)
                @if(Auth::user()->id == $nm->prof_id)
                  <tr>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{$nm->specialite}}</td>
                    <td>{{$nm->fillier}}</td>
                    <td>{{$nm->semestre}}</td>
                    <td>{{$nm->module}}</td>
                    <td class="text-center">
                        <form action="{{ route('delete.row', $nm->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(this.form)"><i class="material-icons">&#xe872;</i></button>
                          </form>

                          <script>
                            function confirmDelete(form) {
                              if (confirm("Are you sure you want to delete this row?")) {
                                form.submit();
                              }
                            }
                          </script>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
          <button class="favorite styled" type="button" id="favorite" style="background-color: #4CAF50;"><a href="{{route('despo')}}" style="color: white;">Valider</a></button>

    <script>

    </script>

</html>
@endsection
