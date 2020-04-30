@extends('admin.index')
@section('content')


			@if($employee->exists)
                <h3 class="box-title text-center">Edit Employee</h3>
			    <form method="post" action="{{route('employees.update',['id' => $employee->id] ) }}" enctype="multipart/form-data">
			    	<input type="hidden" name="_method" value="put">
			@else
                <h3 class="box-title  text-center">Add Employee</h3>
			    <form method="post" action="{{route('employees.store')}}" enctype="multipart/form-data">
                @endif
                 <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                 <input id="first_name" type="text"class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $employee->first_name  }}" placeholder="First Name" />

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                 <input id="last_name" type="text"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $employee->last_name  }}" placeholder="Last Name" />

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                 <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $employee->email  }}" placeholder="employee Email" />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-8">
                                 <input id="phone" type="text"class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $employee->phone  }}" placeholder="Phone" />

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="Space">Companies</label>
                            </div>
                            <div class="col-md-8">
                            <select class="form-control" name="company_id">
                                @if (count($companies) > 0)
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                       
            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-4 text-center">
                	<button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                    
                </div>
            </div>
        </form>
@endsection