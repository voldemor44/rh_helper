<form method="POST" action="{{ route('update-employee', ['id' => $employee->id]) }}">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Nom & Prénoms</label>
                <input readonly name="name" type="text" class="form-control" value="{{ $employee->name }}">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Téléphone </label>
                <input name="tel" readonlytype="text" class="form-control" value="{{ $employee->telephone }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Email </label>
                <input readonly name="email" type="email" class="form-control" value="{{ $employee->email }}">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Statut</label>
                <select name="statut" class="select">
                    @foreach ($statut_users as $statut_user)
                        @if ($statut_user->id == $employee->statutUtilisateur->id)
                            <option selected value="{{ $statut_user->id }}">
                                {{ $statut_user->statut }}</option>
                        @else
                            <option value="{{ $statut_user->id }}">{{ $statut_user->statut }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Departement</label>
                <select name="departement" class="select">
                    @foreach ($departements as $departement)
                        @if ($departement->id == $employee->departement->id)
                            <option selected value="{{ $departement->id }}">
                                {{ $departement->nom }}</option>
                        @else
                            <option value="{{ $departement->id }}">{{ $departement->nom }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label">Fonction</label>
                <select name="fonction" class="select">
                    @foreach ($fonctions as $fonction)
                        @if ($fonction->id == $employee->fonction->id)
                            <option selected value="{{ $fonction->id }}">
                                {{ $fonction->nom }}</option>
                        @else
                            <option value="{{ $fonction->id }}">{{ $fonction->nom }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <center>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-form-label">Rôle</label>
                    <select name="role" class="select">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </center>


    </div>

    <div class="submit-section">
        <button type="submit" class="btn btn-primary submit-btn">Modifier</button>
    </div>

</form>
