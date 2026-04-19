<div class="form-header">
    <h3>Suspension de la tâche</h3>
    <p>Etes-vous sûr de vouloir suspendre cette tâche ?</p>
</div>
<div class="modal-btn delete-action">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ route('avoidedTask', ['taskId' => $task->id]) }}">
                @csrf
                <button style="width: 200px" type="submit" class="submit btn btn-primary continue-btn">Suspendre</button>
            </form>
        </div>
        <div class="col-6">
            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
        </div>
    </div>
</div>
