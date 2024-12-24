<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un Habitant</h1>
    <form action="{{ route('habitants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="cin" placeholder="CIN" required><br>
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" placeholder="Prénom" required><br>
        <select name="ville_id" required>
            <option value="" disabled>Sélectionnez une Ville</option>
            @foreach($villes as $ville)
                <option value="{{ $ville->id }}">{{ $ville->ville }}</option>
            @endforeach
        </select><br>
        <input type="file" name="photo"><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
    
