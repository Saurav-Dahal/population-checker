<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\City;
use App\Models\Gender;
use App\Models\Population;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $admin = new User;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();

         if($save){
            return back()->with('success','New user has been added successfuly.');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    public function checkUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
       ]);

       $userInfo = User::where('email','=', $request->email)->first();

       if(!$userInfo){
           return back()->with('fail','We do not recognize your email address.');
       }else{
           //check password
           if(Hash::check($request->password, $userInfo->password)){
               $request->session()->put('LoggedUser', $userInfo->id);
               return redirect('user/dashboard');

           }else{
               return back()->with('fail','Incorrect password');
           }
       }
    }
    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }

    }
    public function dashboard(Request $request)
    {

        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        // dd($data);
        $countries = Country::get();
        $cities = City::get();
        $genders = Gender::get();
        $population = Population::query();

        $total_population = Population::select([DB::raw("SUM(old) as old_people"), DB::raw("SUM(young) as young_people"), DB::raw("SUM(child) as child_people")])->get();

        $top_population = Population::select([DB::raw("SUM(old+young+child) as total"),'country_id']) 
        ->groupBy('country_id')
        ->orderBy('total', 'DESC')
        ->limit(5)
        ->get();

        $people = DB::table('populations AS p')
        ->select([DB::raw("SUM(old) as old_people"), DB::raw("SUM(young) as young_people"), DB::raw("SUM(child) as child_people"),'city_id']) 
        ->groupBy('city_id')
        ->get();


        if($request->country_id > 0){
            if($request->ajax()){
                $country_people = $population->where(['country_id' => $request->country_id])
                ->select([DB::raw("SUM(old) as old_people"), DB::raw("SUM(young) as young_people"), DB::raw("SUM(child) as child_people"),'country_id']) 
                ->groupBy('country_id')
                ->get();
    
                return response()->json(['country_people'=> $country_people]);
            }
        } elseif($request->gender_id > 0){
            if($request->ajax()){
                $g_people = $population->where(['city_id' => $request->city_id])->where(['gender_id' => $request->gender_id])
                ->get();
                return response()->json(['g_people'=> $g_people]);
            }
        }elseif($request->city_id > 0){
            if($request->ajax()){
                $people = $population->where(['city_id' => $request->city_id])
                ->select([DB::raw("SUM(old) as old_people"), DB::raw("SUM(young) as young_people"), DB::raw("SUM(child) as child_people"),'city_id']) 
                ->groupBy('city_id')
                ->get();
    
                return response()->json(['people'=> $people]);
            }
        }

        return view('backend.dashboard', compact('data', 'countries', 'cities', 'genders', 'population', 'total_population', 'top_population', 'people'));
    }

    public function getCities(Request $request)
    {
        $city=City::where('country_id', $request->country_id)->orderBy('name')->get();
        return $city;
    }

    public function getCountryPop($country_id )
    {  
        $population = Population::query();

        if($country_id > 0){
                $country_people = $population->where(['country_id' => $country_id])
                ->select([DB::raw("SUM(old) as old_people"), DB::raw("SUM(young) as young_people"), DB::raw("SUM(child) as child_people"),'country_id']) 
                ->groupBy('country_id')
                ->get();
    
                return response()->json(['country_people'=> $country_people]);
        }

    }

    public function getCityPop($city_id)
    {
        $population = Population::query();

        if($city_id > 0){
            $people = $population->where(['city_id' => $city_id])
            ->select([DB::raw("SUM(old) as old_people"), DB::raw("SUM(young) as young_people"), DB::raw("SUM(child) as child_people"),'city_id']) 
            ->groupBy('city_id')
            ->get();

            return response()->json(['people'=> $people]);
        }
    }

    public function getGenderPop($city_id, $gender_id)
    {   
        $population = Population::query();

        if($gender_id > 0){
            $g_people = $population->where(['city_id' => $city_id])->where(['gender_id' => $gender_id])
            ->get();

            return response()->json(['g_people'=> $g_people]);
        } 
    }

    public function getGenderPopByCountry($country_id, $gender_id)
    {  
        $population = Population::query();

        if($gender_id > 0){
            $g_people_by_country = $population->where(['country_id' => $country_id])->where(['gender_id' => $gender_id])
            
            ->select([DB::raw("SUM(old) as old"), DB::raw("SUM(young) as young"), DB::raw("SUM(child) as child"),'gender_id']) 
            ->groupBy('gender_id')
            ->get();
            return response()->json(['g_people_by_country'=> $g_people_by_country]);
        } 
    }

}
