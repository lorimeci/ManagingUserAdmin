<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNumberRequest;
use App\Http\Requests\PhoneValidationRequest;
use App\Imports\CountryImport;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
    public function phone(PhoneNumberRequest $request)
    {
        $request ->validated();
 
            $regexArray = [
            "3" => [
                'regex' => '355[0-9]{10}',  
            ],
            "112" => [
                'regex' => '383[0-9]{8}',
            ],
            "125"=> [
                'regex' => '389[0-9]{10}',
            ],
            "64"=> [
                'regex' => '20[0-9]{10}',
            ],
        ];

        $countryId = $request->country;
        $phone = $request->phone;
        $country = Country::find($countryId);
            if((preg_match("'".$regexArray[$countryId]['regex']."'",$phone))){
                return redirect()->route('filepaginate')->with(['success'=> "Valid!"]);
    
            }else{
                return redirect()->route('filepaginate')->with(['error'=>  "Not Valid!"]);
            }     
    } 

}
