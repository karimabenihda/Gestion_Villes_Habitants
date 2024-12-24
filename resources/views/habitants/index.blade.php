<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-AfG5Z4kWJk+XIg6WTgi1ZWwIryO41bTf+qMoWWykPbF5Al+Ij45HQBe4+vOMsbip" crossorigin="anonymous">
</head>
<body>
    <h3>Gestion des Habitant</h3>
    <div class="container">
    <a href="/addHabitant">Ajouter un Habitant</a>
    <a href="/showVilles">Ajouter une Ville</a>
    <div>Filtrer par ville 
    <div><select name="ville" id="ville">
        @foreach($habitants as $habitant) 
        <option value={{$habitant->ville_id}}>{{$habitant->ville->ville}}</option>
        @endforeach
         </select></div>
    </div>
</div>
<div class="container">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>CIN</th>
                <th>Photo</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
@foreach($habitants as $habitant) 
<tr>
<td>{{$habitant->cin}}</td>
<td><img src="{{$habitant->photo}}" alt="Photo of {{ $habitant->nom }}" width="50" height="50"></td>
<td>{{$habitant->nom}}</td>
<td>{{$habitant->prenom}}</td>
<td>{{$habitant->ville->ville ?? 'not found' }}</td>
<td><button>Delete</button>
<button>Edit</button></td>
</tr>
@endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $habitants->links() }}
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-8WRZo1+3jcBsGcjVD5CwUynvVJJr1Unbrgi1A62tCzSB58jIPjx8qqC1dB8ZxWhG" crossorigin="anonymous"></script>
</body>
</html>