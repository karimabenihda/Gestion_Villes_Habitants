<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Modifier un Habitant</h1>
    <form action="{{ route('habitants.update', $habitant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="cin" value="{{ $habitant->cin }}" required><br>
        <input type="text" name="nom" value="{{ $habitant->nom }}" required><br>
        <input type="text" name="prenom" value="{{ $habitant->prenom }}" required><br>
        <select name="ville_id" required>
            <option value="">Sélectionnez une Ville</option>
            @foreach($villes as $ville)
                <option value="{{ $ville->id }}" {{ $habitant->ville_id == $ville->id ? 'selected' : '' }}>{{ $ville->ville }}</option>
            @endforeach
        </select><br>
        <input type="file" name="photo"><br>
        <button type="submit">Mettre à jour</button>
    </form>


</body>
</html>