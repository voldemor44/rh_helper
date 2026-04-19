<form method="POST" action="{{ route('up-departement', ['id' => $departement->id]) }}">
    @csrf
    <div class="form-group">
        <label>Nom du département </label>
        <input name="nom" class="form-control" value="{{ $departement->nom }}" type="text">
    </div>
    <div class="submit-section">
        <button class="btn btn-primary submit-btn">Modifier</button>
    </div>
</form>
