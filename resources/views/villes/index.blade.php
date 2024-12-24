<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des villes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Ajouter une ville</h2>
        <a href="/">></a>
        <form action="/addVille" method="POST" class="text-center" style="border:2px #dddd solid; padding:30px;">
            @csrf
            <input type="text" name="ville" placeholder="Nom de la ville" required>
            <input type="submit" value="Ajouter" class="btn btn-primary">
        </form>

        <div class="cards mt-4">
            @foreach ($villes as $ville)
                <div class="card my-3">
                    <div class="card-body">
                        @if (session('editVilleId') == $ville->id)
                            <form action="/editVille/{{ $ville->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="ville" value="{{ $ville->ville }}" placeholder="Nom de la ville" required>
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                <a href="/" class="btn btn-secondary">Annuler</a>
                            </form>
                        @else
                            <h4 class="card-title">{{ $ville->ville }}</h4>
                            <p class="card-text">Nombre d'Habitant : <strong>{{$ville->nombreHabitant}}</strong></p>
                            <span>
                                <form action="/deleteVille" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $ville->id }}">
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                                <a href="/editVille/{{ $ville->id }}" class="btn btn-success">Modifier</a>
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
