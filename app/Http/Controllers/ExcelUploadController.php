<?php

namespace App\Http\Controllers;

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
    public function phone(Request $request)
    {
        $contryCodes = [
            'Albania' => [
                'regex' => '355[0-9]{10}',  
            ],
            'Kosovo' => [
                'regex' => '383[0-9]{8}',
            ],
            'Macedonia' => [
                'regex' => '389[0-9]{10}',
            ],
            'Egypt' => [
                'regex' => '20[0-9]{10}',
            ],
        ];
        $country = $request->country;
        $phone = $request->phone;
        if(isset($contryCodes[$country])) {
            $validated = Validator::make($request->all(), [
                'phone' => ['required','regex:"'.$contryCodes[$country]["regex"].'"'], 
            ]);
            if($validated->fails()) {
                return redirect()->route('filepaginate')->with('status', 'Not Valid!'); 
            }   
        }
        return redirect()->route('filepaginate')->with('status', 'Valid!'); 
    } 

}
