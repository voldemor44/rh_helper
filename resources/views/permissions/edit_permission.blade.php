@if (Auth::user()->roles->contains('nom', 'Utilisateur') && !Auth::user()->roles->contains('nom', 'Manager'))
    <form method="POST" action="{{ route('up-permission', ['id' => $permission->id]) }}">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Objet</label>
                    <input name="objet" class="form-control" type="text" value="{{ $permission->objet }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Type de demande</label>
                    <select name="typePermission" class="select">
                        @foreach ($typePermissions as $typePermission)
                            @if ($typePermission->id == $permission->type_permission_id)
                                <option selected value="{{ $typePermission->id }}">{{ $typePermission->type }}</option>
                            @else
                                <option value="{{ $typePermission->id }}">{{ $typePermission->type }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="description">Description de la demande</label>
                    <textarea name="description" rows="3" id="description" class="form-control">{{ $permission->contenu }}</textarea>
                </div>
            </div>
        </div>

        <div class="submit-section">
            <button class="btn btn-primary submit-btn">Modifier</button>
        </div>
    </form>
@endif

@if (Auth::user()->roles->contains('nom', 'Administrateur') || Auth::user()->roles->contains('nom', 'Manager'))
    <div class="form-header">
        <h3>Validation de la demande </h3>
        <p>Etes sûr de vouloir valider cette demande ?</p>
    </div>
    <div class="modal-btn delete-action">
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('validate-permission', ['id' => $permission->id]) }}">
                    @csrf
                    <button style="width: 200px" type="submit"
                        class="submit btn btn-primary continue-btn">Valider</button>
                </form>
            </div>
            <div class="col-6">
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
            </div>
        </div>
    </div>
@endif
