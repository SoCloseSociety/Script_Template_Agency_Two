@extends('layouts.dashboard')
{{-- title --}}
@section('title')
    {{ config('app.name') }} | Banners 
@endsection
{{-- Menu Active  --}}
@section('bannersIndex')
 active
@endsection
@section('activeBannersMenu')
active
@endsection

{{-- main content  --}}
@section('content')
    <section class="banner-main-section py-5 all-pages-input" id="main">
        <div class="row">
            <div class="col-12">
                <h2 class="dash-ad-title m-0 mb-3">Admin Dashboard | <span class="dash-span-title"> Banners List</span></h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List of all the Banners</h4>
                                    @if (session('success'))
                                    <br>
                                         <div class="alert alert-success m-0">{{ session('success') }}</div>
                                    @endif
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive--custom">
                                                <table id="data_table" class="table table-bordered dataTable no-footer "    
                                                    role="grid" aria-describedby="data_table_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" rowspan="1" colspan="1"
                                                                style="width: 19.5156px;">Sl.</th>
                                                            <th class="sorting" rowspan="1" colspan="1"
                                                                style="width: 88.1406px;">Title</th>
                                                            <th class="sorting" rowspan="1" colspan="1"
                                                                style="width: 117.562px;">Short Description</th>
                                                            <th class="sorting" rowspan="1" colspan="1"
                                                                style="width: 141px;">Image</th>
                                                            <th class="sorting" rowspan="1" colspan="1"
                                                                style="width: 59.3906px;">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i= 1;   
                                                        @endphp
                                                        @foreach ($banners as $item)
                                                        <tr role="row">
                                                            <td> {{ $i }}</td>
                                                            <td>
                                                                <span class=""> {{ $item->title }} </span>
                                                            </td>
                                                            <td>
                                                                <span class=""> {{ substr($item->short_description, 0, 30) }}</span>
                                                            </td>
                                                             
                                                            <td>
                                                                <img src="{{ asset('uploads/banners')}}/{{ $item->image }}" width="150"
                                                                    alt="Banner">
                                                            </td>
                                                            <td>
                                                                <div class="navbar">
                                                                    <a href="#" id="navDropDownLink" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-more-vertical">
                                                                            <circle cx="12" cy="12" r="1"></circle>
                                                                            <circle cx="12" cy="5" r="1"></circle>
                                                                            <circle cx="12" cy="19" r="1"></circle>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu drp-menu"
                                                                        aria-labelledby="navDropDownLink">
                                                                        <a class="dropdown-item" href="{{ route('banners.show', $item->id) }}">
                                                                            <i class="far fa-eye"></i>
                                                                            <span>Show</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="{{ route('banners.edit', $item->id) }}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="14" height="14" viewBox="0 0 24 24"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit-2 mr-50">
                                                                                <path
                                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                </path>
                                                                            </svg>
                                                                            <span>Edit</span>
                                                                        </a>
                                                                        <form class="dropdown-item" action="{{ route('banners.destroy', $item->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                                            <button type="submit" class="btn text-dark p-0 m-0" style=" box-shadow:none; background:none">Delete</button>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                        @endforeach
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
