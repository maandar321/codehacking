<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;

class StudentController extends Controller
{
    public function index()
    {
        return view('add-student');
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());

            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path)->get();


                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {


                            $insert[] = [
                                'name' => $value->name,
                                'designation' => $value->designation,
                                'status' => $value->status,
                                'doj' => $value->doj,
                                'basic_salary' => $value->basic_salary,
                                'absences' => $value->absences,
                                'late' => $value->late,
                                'other_deduction' => $value->other_deduction,
                                'lunch' => $value->lunch,
                                'tax_ded' => $value->tax_ded,
                                'bonus' => $value->bonus,
                                'total_deduction' => $value->total_deduction,
                                'net_payable' => $value->net_payable,

                            ];


                    }

                    if(!empty($insert)){

                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }



}