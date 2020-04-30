@extends('admin.index')

@section('content')
<div class="row">
	<div class="pull-left">
            <a class="btn btn-success" href="{{ route('companies.create')}}">Add Company</a>
    </div> 
  <div class="table table-responsive">
<table id="table" class="display table table-bordered" style="width:100%">
        <thead>
                <th>Name</th>
                <th>website</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($companies as $company)
            <tr> 
                <td>{{$company->name}}</td>
                <td>{{$company->website}}</td>
                <td>{{$company->email}}</td>
                <td><img style="display:block;width:50px; height:50px"
                               src="{{ asset('storage/'.$company->logo) }}"/></td>
                <td>
	            <a href="{{route('companies.show',['id'=>$company->id])}}" class="show-modal btn btn-info btn-sm">
	            	<i class="fa fa-eye"></i>
	            </a>
	            <a href="{{route('companies.edit',['id'=>$company->id])}}" class="edit-modal btn btn-warning btn-sm">
             	 <i class="glyphicon glyphicon-pencil"></i>
           		 </a>

               <button class="btn  btn-sm btn-danger" data-toggle="modal"
            data-target="#deleteModel{{$company->id}}">
        <i class="fas fa-trash"></i>
        حذف
    </button>
    <div id="deleteModel{{$company->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">تأكيد عملية الحذف</h4>
                </div>
                <form method="POST"
                      action="{!!route('companies.destroy',$company->id)!!}">
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
 {{$companies->links()}}
</div>
</div>
@endsection