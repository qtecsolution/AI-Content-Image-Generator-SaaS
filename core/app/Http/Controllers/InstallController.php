<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class InstallController extends Controller
{
    protected function welcome()
    {


        overWriteEnvFile('APP_URL', URL::to('/'));
        overWriteEnvFile('VUE_APP_ROOT_URL', URL::to('/') . '/api/');


        return view('install.welcome');
    }

    // permission
    protected function permission()
    {

        $permission['curl_enabled'] = function_exists('curl_version');
        $permission['db_file_write_perm'] = is_writable(base_path('.env'));
        $permission['storage'] = is_writable(base_path('storage'));
        $permission['bootstrap'] = is_readable(base_path('bootstrap/cache'));
        $permission['public'] = is_writable(base_path('public'));
        $permission['htaccess'] = is_readable(base_path('.htaccess'));

        return view('install.permission', compact('permission'));
    }

    // create
    protected function create()
    {


        return view('install.setup');
    }

    //save database information in env file
    //here the get database key or data for env file
    // clear cache
    protected function dbStore(Request $request)
    {

        foreach ($request->types as $type) {
            //here the get database key or data for env file
            overWriteEnvFile($type, $request[$type]);
        }

        return redirect()->route('check.db');
    }

    // checkDbConnection
    protected function checkDbConnection()
    {

        try {
            //check the database connection for import the sql file
            DB::connection()->getPdo();

            return redirect()->route('sql.setup')->with('success', 'Your database connection done successfully');
        } catch (\Exception $e) {
            return redirect()->route('sql.setup')->with('wrong', 'Could not connect to the database. Please check your configuration');
        }
    }


    //import sql page
    protected function importSql()
    {

        try {
            //check the database connection for import the sql file
            DB::connection()->getPdo();
            $connected = true;
            return view('install.importSql', compact('connected'));
        } catch (\Exception $e) {
            $connected = false;
            return view('install.importSql', compact('connected'));
        }
    }

    //import the sql file in database or goto organization setup page
    protected function sqlUpload()
    {

        try {
            //import the sql file in database
            $sql_path = base_path('demo.sql');
            DB::unprepared(file_get_contents($sql_path)); // uploaded sql

            return redirect()->route('org.create2');
        } catch (\Exception $e) {
            die("There are some problems, Please check your configuration. error:" . $e);
        }
    }

    protected function sqlUpload2()
    {

        return view('install.setupOrg');
    }

    protected function done()
    {

        return view('install.done');
    }



    protected function sqlUploadEmpty()
    {

        try {
            //import the sql file in database
            $sql_path = base_path('empty.sql');
            DB::unprepared(file_get_contents($sql_path)); // uploaded sql

            return view('install.setupOrg');
        } catch (\Exception $e) {
            die("There are some problems, Please check your configuration. error:" . $e);
        }
    }

    //store the organization details in db
    protected function orgSetup(Request $request)
    {
        if ($request->hasFile('type_logo')) {
            $logo = fileUpload($request->type_logo, 'site', 'own_site');
            writeConfig('type_logo', $logo);
        }
        if ($request->hasFile('footer_logo')) {
            $f_icon = fileUpload($request->footer_logo, 'site', 'f_icon');
            writeConfig('footer_logo', $f_icon);
        }

        if ($request->hasFile('favicon_icon')) {
            $f_logo = fileUpload($request->favicon_icon, 'site', 'footer_logo');
            writeConfig('favicon_icon', $f_logo);
        }
        if ($request->has('type_name')) {
            writeConfig('type_name', $request->type_name);
            overWriteEnvFile('APP_NAME', $request->type_name);
        }
        if ($request->has('footer')) {
            writeConfig($request->type_footer, $request->footer, true);
        }
        if ($request->has('fb')) {
            writeConfig($request->type_fb, $request->fb, true);
        }
        if ($request->has('tw')) {
            writeConfig($request->type_tw, $request->tw, true);
        }
        if ($request->has('google')) {
            writeConfig($request->type_google, $request->google, true);
        }
        if ($request->has('address')) {
            writeConfig($request->type_address, $request->address, true);
        }
        if ($request->has('number')) {
            writeConfig($request->type_number, $request->number, true);
        }
        if ($request->has('mail')) {
            writeConfig($request->type_mail, $request->mail, true);
        }

        return redirect()->route('admin.create');
    }

    //admin create page
    protected function adminCreate()
    {
        return view('install.user');
    }

    //create a admin with full access
    //save and add the super access permission
    // replace the RouteService provider when installation is done
    //return the dashboard when all is done
    protected function adminStore(Request $request)
    {



        $request->validate(
            [
                'name'      => ['required', 'string', 'max:255', 'unique:users'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'  => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'name.required' => translate('Name is required'),
                'name.unique' => translate('Name already exist'),
                'email.required' => translate('Email is required'),
                'email.email' => translate('invalid email'),
                'email.unique' => translate('Email already exist'),
                'password.unique' => translate('Password is required'),
                'password.min' => translate('Password must be minimum 8 characters'),
                'password.confirmed' => translate('Password did not matched'),
            ]
        );
        //create admin and hash password
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = 'admin';
        $user->password = Hash::make($request->password);
        //slug save
        $user->slug = Str::slug($request->name);
        if ($user->save()) {
            $user->assignGroup('super-admin');
            //replace the env file
            $se = Str::before(env('APP_URL'), '/public');
            overWriteEnvFile('APP_URL', $se);
            overWriteEnvFile('APP_ENV', 'production');
            overWriteEnvFile('VUE_APP_ROOT_URL', $se . '/api/');
            overWriteEnvFile('APP_DEBUG', false);
            overWriteEnvFile('APP_DEMO', false);
            copy(base_path('install/RouteServiceProvider.php'), base_path('app/Providers/RouteServiceProvider.php'));
            Artisan::call('optimize:clear');
            return view('install.done');
       
        } else {
            return redirect()->back()->with('failed', translate('There are some problem try again'));
        }
    }
}
