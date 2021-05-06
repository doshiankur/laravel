<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Job;
use App\Http\Requests\EmployeeRequest;


class EmployeeController extends Controller
{
    function touristpost(EmployeeRequest $req){
        //dd($req);
       /* $req->validate([
        	'emp_name' => 'required|max:255',
            'emp_address' => 'required|email',
            'join_date' => 'required|date',
            'emp_photo'=>'required|max:10000|mimes:jpg,jpeg,png'
        ]);*/
        $validatedData = $req->validated();
        $emp=new Employee;

        $fileName = time().'_'.$req->file('emp_photo')->getClientOriginalName();	
            $filePath = $req->file('emp_photo')->storeAs('uploads', $fileName, 'public');
            $emp->file_name =$fileName;
            $emp->name=$req->emp_name;
            $emp->address=$req->emp_address;
            $emp->join_date=date('Y-m-d',strtotime($req->join_date));
            $emp->end_date=date('Y-m-d',strtotime($req->end_date));
          //dd($emp);
          $emp->save();
          return redirect('employeelist');
    }




    function index(EmployeeRequest $request){
        //dd("hi");
        dd($request);//retrun redirect view('employee');
          $emp=new Employee;
          /*$emp->name=$req->emp_name;
          $emp->address=$req->emp_address;
          $emp->save();
          return redirect('employeelist');*/
$validatedData = $req->validated();
			$fileName = time().'_'.$req->file('emp_photo')->getClientOriginalName();	
            $filePath = $req->file('emp_photo')->storeAs('uploads', $fileName, 'public');
            $emp->file_name =$fileName;
            $emp->name=$req->emp_name;
            $emp->address=$req->emp_address;
            $emp->join_date=date('Y-m-d',strtotime($req->join_date));
          //dd($emp);
          $emp->save();
          return redirect('employeelist');
            //$fileModel->file_path = '/storage/' . $filePath;
            //$fileModel->save();

    }
    function employeelist(){
    	$emp=new Employee;
    	//$emp_list=$emp->all();//dd($emp_list);
    	$emp_list=DB::table('employees')
    	          ->join('jobs','jobs.employee_id',"=","employees.id")
    	          ->select('employees.*','jobs.CompanyName')
    	          ->get();
    	          //dd($emp_list);
    	return view('emplist',["emplist"=>$emp_list]);
    }
    function getEmployeeDetail(Request $req){
          //echo $req->id;exit;
          $emp=new Employee;
          $emp_data=$emp->find($req->id)->job;dd($emp_data);  
          return view('editemp',["emplist"=>$emp_data]);        
    }
    function empEdit(Request $req){
          dd($req);
    }
    function deleteEmployeeDetail(Request $req){
        //dd($req);
        $emp=new Employee;
        $emp_data=$emp->find($req->id);//dd($emp_data); 
        $emp_data->delete();
        return redirect()->back();
        //return redirect('employeelist'); 

    }
}