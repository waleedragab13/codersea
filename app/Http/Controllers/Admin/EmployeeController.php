<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $employees = Employee::paginate(5);
       return view('admin.employee.list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $employee = new Employee;
        return view('admin.employee.form',[
            'companies'=>$companies,
            'employee' =>$employee,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'company_id'=>'required',
            'email'=>'required|email|unique:employees',
        ]);
        if ($validator->fails()) {
            session()->push('m', 'danger');
            session()->push('m', 'Bad Request');
            return back()->withInput()->withErrors(["error" => $validator->errors()->all()]);
        }
         $data=[
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id,
        ];
        // dd($edata);
        
        Employee::create($data);
        return redirect('admin/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('admin.employee.form',[
            'companies'=>$companies,
            'employee' =>$employee,
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $employee = Employee::find($id);
        $validator = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'company_id'=>'required',
            "email" => "required|email|unique:employees,email,".$employee->id.",id", 
        ]);
        if ($validator->fails()) {
            session()->push('m', 'danger');
            session()->push('m', 'Bad Request');
            return back()->withInput()->withErrors(["error" => $validator->errors()->all()]);
        }
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        
        $employee->save();
        return redirect('admin/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $employee = Employee::findOrFail($id);
        $employee->delete($id);
        return redirect('admin/employees');
    }
}
