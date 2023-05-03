@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>gestion des emplois de temps </title>
      <head>
        <title>
    <title>Formulaire de réservation :</title>
    <style>
body {
    font: italic small-caps bold 16px/2 cursive;
        margin: 0;
        padding: 0;
        background-image: url(ad.png);
        background-repeat: no-repeat;
        background-size: cover;
      }
        h1 {
            color: rgb(3, 3, 37);
            text-align: center;
            font-size: 36px;
        }
        form {
            margin-right: 3%;
          margin-left: 3%;
            background-color: #cac4c4;
            padding: 4%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgb(0, 0, 0);
            font-size:x-large;
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
    background-color: rgb(0, 255, 55);
    background-image: linear-gradient(to top left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(0, 0, 0, 0.6), inset -2px -2px 3px rgba(0, 0, 0, 0.6);
}

.styled:hover {
    background-color: rgb(193, 205, 216);
}

.styled:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, 0.6), inset 2px 2px 3px rgba(0, 0, 0, 0.6);
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}

th {
  background-color: rgb(129, 118, 118);
  color: white;
}
    </style>
</head>
<body>

    <form action="traitement.php" method="post">
        <h1>page d'admin :</h1>
        <button class="favorite styled"
        type="button">
     <a href="/emploi">afficher les emplois</a>
</button>
<br>
<br>
<body>
<br>
<table>
    <thead>
        <tr>
            <th>nom de professeur</th>
            <th>email</th>
            <th>spécialité</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ Auth::user()->name }}</td> <!-- remplacer "prof1" par le nom d'utilisateur de la session -->
            <td>{{ Auth::user()->email }}</td>
            <td>{{ Auth::user()->speciality }}</td>
            <td>
                <button type="button" onclick="window.history.back();" class="btn btn-secondary">Modifier
                <a href="/despo"></a></button>
                <button type="button" onclick="supprimerLigne(this)" class="btn btn-secondary">Supprimer</button>
            </td>
        </tr>
    </tbody>
</table>
<script>
    function supprimerLigne(btn) {
        // Obtenez la ligne parente (tr) du bouton cliqué
        var row = btn.parentNode.parentNode;
        // Supprimez la ligne de la table
        row.remove();
    }
</script>
</form>
</body>


</html>
@endsection
