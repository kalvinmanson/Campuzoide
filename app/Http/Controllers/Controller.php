<?php

namespace App\Http\Controllers;

use Auth;
use App\Country;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        view()->share('country', $this::country());
    }
    public function country() {
        $domain = request()->server->get('SERVER_NAME');
        $country = Country::where('domain', $domain)->first();
        if($country) {
            return $country;
        } else {
            $country = Country::first();
            return $country;
        }
        
    }

    public function hasrole($role) {
        //validar solo admin
        $current_user = Auth::user();
        if($current_user->role == $role) {
            return true;
        } else {
            flash('No tiene permiso para acceder a esta área.', 'danger');
            return false;
        }
    }
}
