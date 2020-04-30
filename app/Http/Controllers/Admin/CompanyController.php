<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\UploadAble;
use App\Models\Company;

use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use UploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $companies = Company::paginate(5);
       return view('admin.company.list', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company;
        return view('admin.company.form',compact('company'));
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
            'name'=>'required',
            'email'=>'required|email|unique:companies',
            'logo'     =>  'mimes:jpg,jpeg,png|max:10000'
        ]);
        if ($validator->fails()) {
            session()->push('m', 'danger');
            session()->push('m', 'Bad Request');
            return back()->withInput()->withErrors(["error" => $validator->errors()->all()]);
        }
         $data=[
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ];
       if (!empty($request->logo)) {
            $image = $this->uploadOne($request->logo, 'logo');
            $data['logo'] = $image;
        }
        // dd($edata);
        
        Company::create($data);
        session()->push('m', 'success');
        session()->push('m', 'successefully saved data');
        return redirect('admin/companies');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.form', compact('company'));
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
        $company = Company::find($id);
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            "email" => "required|email|unique:companies,email,".$company->id.",id", 
            'logo'     =>  'mimes:jpg,jpeg,png|max:10000'
        ]);
        if ($validator->fails()) {
            session()->push('m', 'danger');
            session()->push('m', 'Bad Request');
            return back()->withInput()->withErrors(["error" => $validator->errors()->all()]);
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
       if (!empty($request->newlogo)) {
            if($company->logo != null){
                $this->deleteOne($company->logo);
            }
            $image = $this->uploadOne($request->newlogo, 'logo');
            $company->logo = $image;
        }
        // dd($edata);
        
        $company->save();
        return redirect('admin/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->logo != null) {
            $this->deleteOne($company->logo);
        }
        $company->delete($id);
        return redirect('admin/companies');
    }
}
