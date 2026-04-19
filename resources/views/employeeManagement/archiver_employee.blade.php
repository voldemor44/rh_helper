<div class="form-header">
    <h3>Archivage d'un employé</h3>
    <p>Etes-vous sûr de vouloir archiver cet employé ?</p>
</div>
<div class="modal-btn delete-action">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ route('archivage', ['id' => $employee->id]) }}">
                @csrf
                <button style="width: 200px" type="submit" class="submit btn btn-primary continue-btn">Archiver</button>
            </form>
        </div>
        <div class="col-6">
            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
        </div>
    </div>
</div>
