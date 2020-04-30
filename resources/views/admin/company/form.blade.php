@extends('admin.index')
@section('content')


			@if($company->exists)
                <h3 class="box-title text-center">Edit company</h3>
			    <form method="post" action="{{route('companies.update',['id' => $company->id] ) }}" enctype="multipart/form-data">
			    	<input type="hidden" name="_method" value="put">
			@else
                <h3 class="box-title  text-center">Add company</h3>
			    <form method="post" action="{{route('companies.store')}}" enctype="multipart/form-data">
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
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                 <input id="name" type="text"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $company->name  }}" placeholder="Company Name" required="required" />

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                 <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $company->email  }}" placeholder="Company Email" required="required" />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-2 col-form-label text-md-right">{{ __('Website Link') }}</label>

                            <div class="col-md-8">
                                 <input id="website" type="text"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="website" value="{{ $company->website  }}" placeholder="Company Website" />

                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        @if($company->exists)
                        <div class="form-group row ">
                             <label class="col-md-2 control-label">Logo</label>
                            <div class="col-md-10 ls-group-input">
                        <input id="file-3" name="newlogo" type="file" enctype="multipart/form-data"
                               accept="image/gif, image/jpeg, image/png">
                            <img style="display:block;width:200px; height:120px"
                               src="{{ asset('storage/'.$company->logo) }}"/>
                        </div>
                     </div>
                    @else
                   <div class="form-group row">
		            <label class="col-md-2 control-label">Logo</label>
		            <div class="col-md-10 ls-group-input">
		                <input id="file-3" name="logo" type="file"  enctype="multipart/form-data"
		                       accept="image/gif, image/jpeg, image/png" required>
		            </div>
		        </div>
                @endif
            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-4 text-center">
                	<button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                    
                </div>
            </div>
        </form>
@endsection