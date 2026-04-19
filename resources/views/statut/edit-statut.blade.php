<form method="POST" action="{{ route('up-statut', ['id' => $statut->id]) }}">
    @csrf
    <div class="form-group">
        <label>Nom du statut </label>
        <input name="statut" class="form-control" value="{{ $statut->statut }}" type="text">
    </div>

    <div class="submit-section">
        <button class="btn btn-primary submit-btn">Modifier</button>
    </div>
</form>
