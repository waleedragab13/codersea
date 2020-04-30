@extends('admin.index')

@section('content')

    <div class="company-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $company['name'] }}</h2>
                 <h2 class="text-4xl font-semibold">{{ $company['email'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400">
                </div>
            <a href="{{$company['website']}}"  target="_blank"><p class="text-gray-300 mt-8font-semibold" >
                Company Website
            </p></a>
            </div>
        </div>
    </div>

    <div class="company-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Company Logo</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                        <div class="mt-8">
                            <a href="">
                                <img src="{{ asset('storage/'.$company->logo) }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="parasite">
                            </a>
                            <div class="mt-2 text-sm mt-1">
                                <a href="#" class="text-lg mt-2 hover:text-gray:300"></a>
                                <div class="flex items-center text-gray-400">
                                    <span></span>
                                </div>
                            </div>
                        </div>
            </div>
    </div>
</div>

@endsection