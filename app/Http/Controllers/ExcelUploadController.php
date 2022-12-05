<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneValidationRequest;
use App\Imports\CountryImport;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUploadController extends Controller
{
    public function index()
    {
        return view('admin.uploadfile');
    }

    public function uploadCountry(Request $request)
    {
     Excel::import(new CountryImport, $request->file);

     return redirect()->route('importfile')
     ->with('success', 'Country uploaded successfully');
    }

    public function paginate()
    {
        $dropdown = Country::all();
        $countries = Country::paginate(7);
        return view('admin.excel-paginate',compact('countries', 'dropdown'));
    }
    public function phone(Request $request)
    {
        //dd($request->all()) regex:/^([0-9\s\-\+\(\)]*)$/;
        // 'regex:/\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|
        //  2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|
        //  4[987654310]|3[9643210]|3[70]|7|1)\d{1,14}$/ '  /^(((067|068|069)\d{7})){1}$/

        $contryCodes = [
            "albania" => [
                'regex' => '/^(\355)[0-9]{13}$/',
                'digits' => 13
            ],
            "kosovo" => [
                'regex' => '[383]\d{1,11}',
                'digits' => 11
            ],
            "Macedonia" => [
                'regex' => '[389]\d{1,13}',
                'digits' => 13
            ],
            "Egypt" => [
                'regex' => '[20]\d{1,12}',
                'digits' => 12
            ],

        ];
        //dd($request->country);
        //dd($contryCodes[$request->country]);
        $countrycode = $request->country;
        $phone = $request->phone;
        if(isset($contryCodes[$countrycode])) {
            //dd(isset($contryCodes));
            $validated = $request->validate([
                'phone' => ['required'],['regex:'.$contryCodes[$countrycode]['regex']], ['digits:'.$contryCodes[$phone]['digits']],
            ]);
         return redirect()->route('filepaginate')->with('status', 'Valid!');  
        }
        else{
            return redirect()->route('filepaginate')->with('status', ' Not Valid!');
        }
        return redirect()->route('filepaginate')->with('status', 'Valid!'); 

        // $request->validate([
        //  'phone' => ['required'],['regex:/^([0-9\s\-\+\(\)]*)$/'],
        // ]);
 
        //ky kodi s ka nevoje sepse e kontrollon me regex , duhet thjesht te gjej regex e duhur per cdo shtet 
        // if ($countrycode === substr($phone,0,3) ){
        //  return "Valid";
        // }else{
        //  return "Not Valid";
        // }
        
    }

}
