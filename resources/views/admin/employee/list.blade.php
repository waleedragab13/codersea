@extends('admin.index')

@section('content')
<div class="row">
	<div class="pull-left">
            <a class="btn btn-success" href="{{ route('employees.create')}}">Add Employee</a>
    </div> 
  <div class="table table-responsive">
<table id="table" class="display table table-bordered" style="width:100%">
        <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>employee Name</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($employees as $employee)
            <tr> 
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->company->name}}</td>
                <td>
	            <a href="#" class="show-modal btn btn-info btn-sm">
	            	<i class="fa fa-eye"></i>
	            </a>
	            <a href="{{route('employees.edit',['id'=>$employee->id])}}" class="edit-modal btn btn-warning btn-sm">
             	 <i class="glyphicon glyphicon-pencil"></i>
           		 </a>

               <button class="btn  btn-sm btn-danger" data-toggle="modal"
            data-target="#deleteModel{{$employee->id}}">
        <i class="fas fa-trash"></i>
        حذف
    </button>
    <div id="deleteModel{{$employee->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">تأكيد عملية الحذف</h4>
                </div>
                <form method="POST"
                      action="{!!route('employees.destroy',$employee->id)!!}">
                         {{ csrf_field() }}

                         {{method_field('DELETE')}}

                    <div class="modal-body">
                        <p>هل أنت متأكد من الحذف ؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">حذف</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            إغلاق
                        </button>
                    </div>
                </form>
            </div>
          </td>
            </tr>
   		   @endforeach
        </tbody>
</table>
</div>
</div>
@endsection