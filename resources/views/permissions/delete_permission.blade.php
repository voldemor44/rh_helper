@if (Auth::user()->roles->contains('nom', 'Utilisateur') && !Auth::user()->roles->contains('nom', 'Manager'))
    <div class="form-header">
        <h3>Suppression de la demande </h3>
        <p>Etes sûr de vouloir supprimer cette demande ?</p>
    </div>
    <div class="modal-btn delete-action">
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('deleted-permission', ['id' => $permission->id]) }}">
                    @csrf
                    <button style="width: 200px" type="submit"
                        class="submit btn btn-primary continue-btn">Supprimer</button>
                </form>
            </div>
            <div class="col-6">
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
            </div>
        </div>
    </div>
@endif

@if (Auth::user()->roles->contains('nom', 'Manager') || Auth::user()->roles->contains('nom', 'Administrateur'))
    <div class="form-header">
        <h3>Rejet de la demande </h3>
        <p>Etes sûr de vouloir rejeter cette demande ?</p>
    </div>
    <div class="modal-btn delete-action">
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('reject-permission', ['id' => $permission->id]) }}">
                    @csrf
                    <button style="width: 200px" type="submit"
                        class="submit btn btn-primary continue-btn">Rejeter</button>
                </form>
            </div>
            <div class="col-6">
                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
            </div>
        </div>
    </div>
@endif
