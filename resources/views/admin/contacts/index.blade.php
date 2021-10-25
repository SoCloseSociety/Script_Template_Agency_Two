@extends('layouts.dashboard')

{{-- title --}}
@section('title')
    {{ config('app.name') }} | Contacts  
@endsection

{{-- menu active --}}
@section('contactsIndex')
    active
@endsection

{{-- breadcrumb  --}}
@section('breadcrumbs')
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Admin Dashboard</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="">Contact</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

{{-- content --}}
@section('content')
<div class="row justify-content-center" id="table-bordered">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List of All Contact</h4>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card-body">
                <p class="card-text"> 
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name </th>                       
                                    <th>Email </th>
                                    <th>Message </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i= 1;   
                                @endphp
                                @foreach ($contact as $item)
                                <tr>
                                    <td>
                                        {{ $i }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                   
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->message }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <form class="dropdown-item" action="{{ route('contacts.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                    <button type="submit" class="btn p-0 m-0">Delete</button>
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
                </p>
            </div>
        </div>
    </div>
</div>
@endsection