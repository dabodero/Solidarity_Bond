<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private const CLIENT = 1;
    private const ADMIN = 2;
    private const FABLAB = 3;

    /**
     * Retourne tout les Roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Crer un nouveau role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create($request->all());
    }

    /**
     * Retourne un role
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $role;
    }

    /**
     * Met à jour les roles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
    }

    /**
     * Supprime un role.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
    }

    /**
     * Retourne le role client
     * @return int
     */
    public static function getNumeroRoleClient(){ return self::CLIENT; }

    /**
     * Retourne le role admin
     * @return int
     */
    public static function getNumeroRoleAdmin(){ return self::ADMIN; }

    /**
     * Retourne le role fablab
     * @return int
     */
    public static function getNumeroRoleFablab(){ return self::FABLAB; }
}
