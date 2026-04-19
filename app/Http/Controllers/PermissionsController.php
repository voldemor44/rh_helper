<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Permissions;
use App\Models\TypePermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

use function Pest\Laravel\get;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // **Pour l'employé** //

        $permissions = Permission::where('user_id', '=', Auth::user()->id)->get();
        $typePermissions = TypePermission::all();

        // statistic
        $totalPermissions = Permission::where('user_id', '=', Auth::user()->id)->count();

        $instancePermissions = Permission::where('user_id', '=', Auth::user()->id)
            ->where('statut', 'En instance')->count();
        $all_instancePermissions = Permission::where('user_id', '=', Auth::user()->id)
            ->where('statut', 'En instance')->get();

        $refusedPermissions = Permission::where('user_id', '=', Auth::user()->id)
            ->where('statut', 'Rejetée')->count();
        $all_refusedPermissions = Permission::where('user_id', '=', Auth::user()->id)
            ->where('statut', 'Rejetée')->get();

        $validatePermissions = Permission::where('user_id', '=', Auth::user()->id)
            ->where('statut', 'Validée')->count();
        $all_validatePermissions = Permission::where('user_id', '=', Auth::user()->id)
            ->where('statut', 'Validée')->get();
        if ($totalPermissions != 0) {
            $vp = round((($validatePermissions / $totalPermissions) * 100))  . '%';
            $ip = round((($instancePermissions / $totalPermissions) * 100))  . '%';
            $rp = round((($refusedPermissions / $totalPermissions) * 100))  . '%';
        } else {
            $vp = '0%';
            $ip = '0%';
            $rp = '0%';
        }



        // **Pour l'admin et le Manager** //
        if (Auth::user()->roles->contains('nom', 'Administrateur')) {
            $allPermissions = Permission::all();
            //dd($allPermissions);

            // statistic
            $nbrPermissions = Permission::all()->count();

            $nbr_instancePermissions = Permission::where('statut', 'En instance')->count();
            $all_ip = Permission::where('statut', 'En instance')->get();

            $nbr_refusedPermissions = Permission::where('statut', 'Rejetée')->count();
            $all_rp = Permission::where('statut', 'Rejetée')->get();

            $nbr_validatePermissions = Permission::where('statut', 'Validée')->count();
            $all_vp = Permission::where('statut', 'Validée')->get();

            $nbr_vp = round((($nbr_validatePermissions / $nbrPermissions) * 100))  . '%';
            $nbr_ip = round((($nbr_instancePermissions / $nbrPermissions) * 100))  . '%';
            $nbr_rp = round((($nbr_refusedPermissions / $nbrPermissions) * 100))  . '%';

            return view('permissions', compact(
                'typePermissions',
                'allPermissions',
                'nbrPermissions',
                'all_ip',
                'nbr_instancePermissions',
                'all_rp',
                'nbr_refusedPermissions',
                'all_vp',
                'nbr_validatePermissions',
                'nbr_vp',
                'nbr_ip',
                'nbr_rp',
            ));
        }

        if (Auth::user()->roles->contains('nom', 'Manager')) {

            $m_permissions = Permission::all();

            $allPermissions = [];

            foreach ($m_permissions as $permission) {
                // utilisateur qui a lancé la demande de permission
                $user = User::where('id', $permission->user_id)->first();

                if ($user->departement_id === Auth::user()->departement_id) {
                    array_push($allPermissions, $permission);
                }
            }

            // statistic
            $nbrPermissions = count($allPermissions); // tous les permissions des membres du departement du Manager

            $m_ip = Permission::where('statut', 'En instance')->get();
            $all_ip = [];  // n°1

            foreach ($m_ip as $permission) {
                // utilisateur qui a lancé la demande de permission
                $user = User::where('id', $permission->user_id)->first();

                if ($user->departement_id === Auth::user()->departement_id) {
                    array_push($all_ip, $permission);
                }
            }
            $nbr_instancePermissions = count($all_ip); // n°1 number

            $m_rp = Permission::where('statut', 'Rejetée')->get();
            $all_rp = []; // n°2

            foreach ($m_rp as $permission) {
                // utilisateur qui a lancé la demande de permission
                $user = User::where('id', $permission->user_id)->first();

                if ($user->departement_id === Auth::user()->departement_id) {
                    array_push($all_rp, $permission);
                }
            }
            $nbr_refusedPermissions = count($all_rp); // n°2 number

            $m_vp = Permission::where('statut', 'Validée')->get();
            $all_vp = []; // n°3

            foreach ($m_vp as $permission) {
                // utilisateur qui a lancé la demande de permission
                $user = User::where('id', $permission->user_id)->first();

                if ($user->departement_id === Auth::user()->departement_id) {
                    array_push($all_vp, $permission);
                }
            }
            $nbr_validatePermissions = count($all_vp); // n°3 number


            $nbr_vp = round((($nbr_validatePermissions / $nbrPermissions) * 100))  . '%';
            $nbr_ip = round((($nbr_instancePermissions / $nbrPermissions) * 100))  . '%';
            $nbr_rp = round((($nbr_refusedPermissions / $nbrPermissions) * 100))  . '%';

            return view('permissions', compact(
                'typePermissions',
                'allPermissions',
                'nbrPermissions',
                'all_ip',
                'nbr_instancePermissions',
                'all_rp',
                'nbr_refusedPermissions',
                'all_vp',
                'nbr_validatePermissions',
                'nbr_vp',
                'nbr_ip',
                'nbr_rp',
            ));
        }


        return view('permissions', compact(
            'permissions',
            'typePermissions',
            'totalPermissions',
            'instancePermissions',
            'all_instancePermissions',
            'refusedPermissions',
            'all_refusedPermissions',
            'validatePermissions',
            'all_validatePermissions',
            'vp',
            'ip',
            'rp',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file) {
            $filename = time() . '.' . $request->file->extension();
            $path = $request->file->storeAs('photos', $filename, 'public');
            Permission::create([
                'contenu' => $request->description,
                'user_id' => Auth::user()->id,
                'type_permission_id' => $request->typePermission,
                'objet' => $request->objet,
                'document' => $path,

            ]);
        } else {

            Permission::create([
                'contenu' => $request->description,
                'user_id' => Auth::user()->id,
                'type_permission_id' => $request->typePermission,
                'objet' => $request->objet,

            ]);
        }

        return redirect()->route('permission-page');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        $typePermissions = TypePermission::all();
        return view('permissions.edit_permission', compact('permission', 'typePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        if ($permission->objet != $request->objet) {
            $permission->update([
                'objet' => $request->objet
            ]);
        }

        if ($permission->contenu != $request->description) {
            $permission->update([
                'contenu' => $request->description
            ]);
        }

        if ($permission->type_permission_id != $request->typePermission) {
            $permission->update([
                'type_permission_id' => $request->typePermission
            ]);
        }

        return redirect()->route('permission-page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permission-page');
    }

    public function destroyPage($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.delete_permission', compact('permission'));
    }

    public function rejectPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update([
            'statut' => 'Rejetée'
        ]);
        return redirect()->route('permission-page');
    }
    public function validatePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update([
            'statut' => 'Validée'
        ]);
        return redirect()->route('permission-page');
    }
}
