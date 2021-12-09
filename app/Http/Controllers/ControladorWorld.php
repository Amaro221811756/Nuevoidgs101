<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\City;

class ControladorWorld extends Controller
{
    public function get_country(Request $req){
        $criterio=$req['criterio'];
        //$countries= DB::SELECT("SELECT Code,Name, Region,LifeExpectancy,IndepYear,Population,SurfaceArea
        //FROM country WHERE active=1 AND (name like '%$criterio%' OR region like '%$criterio%')");
        //$countries=Country::All();
        $countries=Country::where('active','=',1)
            ->where (function($query) use ($criterio){
                $query->where("name", "like", "%$criterio%")->orwhere("region", "like", "%$criterio%");
            })->paginate(8);
            
        $countries2=Country::where('active','=',1)->get();
        return view('vista_country', ['countries'=>$countries,'countries2'=>$countries2]); 
    }

    public function eliminar (Request $req){
        $code = $req ['code'];
        //echo $code;
        //$eliminacountry = Country::where('Code', $code)->delete();
        $eliminacountry = Country::where ('Code', $code)->update(['active'=> 0 ]);
        if ($eliminacountry){
        //echo "Registro $code eliminado!";
        //echo "<script type='text/javascript'> alert ('Registro $code eliminado'); </script>";
            return back();
        }
    }

    public function modificar(Request $req){
        $code = $req ['code'];
        $country = Country::where('Code',$code)->get();
        return view('modifica_country',['country'=>$country]);
    }

    public function modifica_country(Request $req){
        $code = $req ['code'];
        $population = $req ['population'];
        $lifeexpectancy = $req ['lifeexpectancy'];
        $modificacountry = Country::where('Code',$code)->update
        (['Population'=>$population, 'LifeExpectancy'=>$lifeexpectancy]);
        if($modificacountry){
            return back();
        }
    }

    public function subirfoto(Request $req){
        $code = $req ['code'];
        return view("subirfoto",['code'=>$code]);
    }

    public function subirfoto2(Request $req){
        $code = $req ['code'];
        $nombre = $req ->file('file')->getClientOriginalName();
        $extension = $req ->file('file')->extension();

        if($extension == 'png' || $extension == 'jpg' ){
            $path = $req->file('file')->storeAs('banderas',$nombre);
            $subirfoto = Country::where('Code',$code)->update(['imagen'=>$nombre]);
            return redirect()->route('country');
        }
        else{
            echo "Tu archivo debe ser PNG o JPG";
        }
    }

    public function consultar(Request $req){
        $code = $req ['code'];
        $countries = Country::where("Code","$code")->get();
        echo json_encode($countries[0]);

    }
    
    public function consultar2(Request $req){
        $code = $req ['code'];
        $cities = City::where("CountryCode","$code")->get();
        echo json_encode($cities);
    }
    
}
