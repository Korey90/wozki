@extends('admin.layout.layout')
@section('content')
<script>
        window.onload = function () {
            document.getElementById('create-model-form').addEventListener('submit', function (event) {
                event.preventDefault();

                var name = document.getElementById('name').value;
                var fillable = document.getElementById('fillable').value;
                var relationType = document.getElementById('relation-type').value;
                var relatedModel = document.getElementById('related-model').value;
                var foreignKey = document.getElementById('foreign-key').value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('artisan.createModel') }}");
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        var response = JSON.parse(xhr.responseText);
                        
                        if (response.success) {
                            alert(response.message);
                        } else {
                            console.error(response.message);
                        }
                    }
                };

                var data = JSON.stringify({
                    name: name,
                    fillable: fillable,
                    relation_type: relationType,
                    related_model: relatedModel,
                    foreign_key: foreignKey
                });

                xhr.send(data);
            });
        };
</script>
<div class="container-fluid">
<div class="row">
    <h2 class="p-4">Dodaj Model</h2>
    <form id="create-model-form">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="fillable">Fillable (comma separated):</label>
        <input type="text" id="fillable" name="fillable">

        <label for="relation-type">Relation Type:</label>
        <select id="relation-type" name="relation_type">
            <option value="">--Please choose an option--</option>
            <option value="hasOne">hasOne</option>
            <option value="belongsTo">belongsTo</option>
        </select>

        <label for="related-model">Related Model:</label>
        <input type="text" id="related-model" name="related_model">

        <label for="foreign-key">Foreign Key:</label>
        <input type="text" id="foreign-key" name="foreign_key">

        <button type="submit">Create Model</button>
    </form>
    </div>

    <div class="row">
        <h2 class="p-4">Edycja Ścieżek Uzytkownika</h2>
        <form method="POST" action="{{ route('artisan.updateRoutes', 'user') }}" class="form">
            @csrf
            <textarea name="routes_user" class="form-control" rows="15">{{ $routes_user }}
            </textarea>
            <input type="submit" value="Zapisz">
        </form>
    </div>

    <div class="row">
        <h2 class="p-4">Edycja Ścieżek Admina</h2>
        <form method="POST" action="{{ route('artisan.updateRoutes', 'admin') }}" class="form">
            @csrf
            <textarea name="routes_admin" class="form-control" rows="15">{{ $routes_admin }}
            </textarea>
            <input type="submit" value="Zapisz">
        </form>
    </div>

    <div class="row">
        <h2 class="p-4">Edycja Ścieżek Api</h2>
        <form method="POST" action="{{ route('artisan.updateRoutes', 'api') }}" class="form">
            @csrf
            <textarea name="routes_api" class="form-control" rows="15">{{ $routes_api }}
            </textarea>
            <input type="submit" value="Zapisz">
        </form>
    </div>

    <div class="row">
        <h2 class="p-4">Tworzenie Kontrolera</h2>
        <form method="POST" action="{{ route('artisan.storeController') }}">
    @csrf
    <label for="name">Nazwa Kontrolera:</label>
    <input type="text" id="name" name="name" required>

    <label for="model">Nazwa Modelu (opcjonalne):</label>
    <input type="text" id="model" name="model">

    <input type="submit" value="Utwórz Kontroler">
</form>

    </div>

    <div class="row">
        <h2 class="p-4">Lista Kontrolerów Admina</h2>
        @foreach($admin_kontrolery as $kontroler)
            {{ $kontroler }} <br>
        @endforeach

    </div>
    <br><br><br><br><br><br>c
</div>
    @endsection('content')