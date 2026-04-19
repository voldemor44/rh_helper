<div class="form-header">
    <h3> {{ $task->titre }}</h3>
    <p>Voulez-vous compléter cette tâche ?</p>
    <p>(Cette tâche sera considérée comme achevée)</p>
</div>
<div class="modal-btn delete-action">
    <div class="row">
        <div class="col-6">
            <form method="POST" action="{{ route('completedTask', ['taskId' => $task->id]) }}">
                @csrf
                <button style="width: 200px" type="submit" class="submit btn btn-primary continue-btn">Compléter</button>
            </form>
        </div>
        <div class="col-6">
            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Annuler</a>
        </div>
    </div>
</div>
