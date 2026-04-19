<form method="POST" action="{{ route('up-fonction', ['id' => $fonction->id]) }}">
    @csrf
    <div class="form-group">
        <label>Nom de la fonction </label>
        <input name="nom" class="form-control" value="{{ $fonction->nom }}" type="text">
    </div>
    <div class="form-group">
        <label>Départment </label>
        <select name="departement" class="myselect">
            @foreach ($departements as $departement)
                @if ($departement->id == $fonction->departement->id)
                    <option selected value="{{ $departement->id }}">
                        {{ $departement->nom }}</option>
                @else
                    <option value="{{ $departement->id }}">{{ $departement->nom }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="submit-section">
        <button class="btn btn-primary submit-btn">Modifier</button>
    </div>
</form>
