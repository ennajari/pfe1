<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Tableau ajoute heure</title>
</head>
<style>

    body {
          font: italic small-caps bold 16px/2 cursive;
            margin: 0;
            padding: 0;
            background-image: url(ad.png);
            background-repeat: no-repeat;
            background-size: cover;
          }
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
            label {
                display: block;
                margin-bottom: 6px;
            }
        h1 {
                margin-top: 2%;
                color: rgb(0, 0, 0);
                text-align: center;
                font-size: 36px;
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
    .btn {
  font-family: Arial, sans-serif;
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  color: #fff;
}

.btn-secondary {
  background-color: #6c757d;
}

.btn-secondary:hover {
  background-color: #5a6268;
}
.btn {
  font-family: Arial, sans-serif;
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  color: #fff;
}

.btn-primary {
  background-color: #30a00f;
}

.btn-primary:hover {
  background-color: #3e8123;
}

    </style>
<body style="background:linear-gradient(to bottom, #87CEFA, #1E90FF); ">
  <h1>Tableau de dedisponibilité:</h1>

  <form method="POST" action="{{ route('desponibilites.store') }}">
    @csrf
    <table>

      <thead>
        <tr>
          <th>les jours</th>
          <th>Temps a choisir</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Lundi</td>
          <td>
            <input type="checkbox" name="Lundi[]" value="8-10" id="t">08:00-10:00
            <input type="checkbox" name="Lundi[]" value="10-12" id="l">10:00-12:00
            <input type="checkbox" name="Lundi[]" value="14-16" id="j">14:00-16:00
            <input type="checkbox" name="Lundi[]" value="16-18" id="r">16:00-18:00
          </td>
        </tr>
        <tr>
          <td>Mardi</td>
          <td>
            <input type="checkbox" name="Mardi[]" value="8-10" id="t">08:00-10:00
            <input type="checkbox" name="Mardi[]" value="10-12" id="l">10:00-12:00
            <input type="checkbox" name="Mardi[]" value="14-16" id="j">14:00-16:00
            <input type="checkbox" name="Mardi[]" value="16-18" id="r">16:00-18:00
          </td>
        </tr>
        <tr>
          <td>mercredi</td>
          <td>
            <input type="checkbox" name="Mercredi[]" value="8-10" id="t">08:00-10:00
            <input type="checkbox" name="Mercredi[]" value="10-12" id="l">10:00-12:00
            <input type="checkbox" name="Mercredi[]" value="14-16" id="j">14:00-16:00
            <input type="checkbox" name="Mercredi[]" value="16-18" id="r">16:00-18:00
          </td>
        </tr>
        <tr>
          <td>jeudi</td>
          <td>
            <input type="checkbox" name="Jeudi[]" value="8-10" id="t">08:00-10:00
            <input type="checkbox" name="Jeudi[]" value="10-12" id="l">10:00-12:00
            <input type="checkbox" name="Jeudi[]" value="14-16" id="j">14:00-16:00
            <input type="checkbox" name="Jeudi[]" value="16-18" id="r">16:00-18:00
          </td>
        </tr>
        <tr>
          <td>Vendredi</td>
          <td>
            <input type="checkbox" name="Vendredi[]" value="8-10" id="t">08:00-10:00
            <input type="checkbox" name="Vendredi[]" value="10-12" id="l">10:00-12:00
            <input type="checkbox" name="Vendredi[]" value="14-16" id="j">14:00-16:00
            <input type="checkbox" name="Vendredi[]" value="16-18" id="r">16:00-18:00
          </td>
        </tr>
        <tr>
          <td>Samudi</td>
          <td>
            <input type="checkbox" name="Samudi[]" value="8-10" id="t">08:00-10:00
            <input type="checkbox" name="Samudi[]" value="10-12" id="l">10:00-12:00
            <input type="checkbox" name="Samudi[]" value="14-16" id="j">14:00-16:00
            <input type="checkbox" name="Samudi[]" value="16-18" id="r">16:00-18:00
          </td>
        </tr>
      </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Sauvegarder</button>

  </form>

  </table>

</body>
</html>
