@extends('layouts.master')
@section('title','Daftar User')
@section('content')

 <div class="section-body">
     <div class="row">
        <div class="col-4 col-md-4 col-lg-4">
            <h4> Daftar User </h4>
            
            @if ($message = Session::get('message'))
            <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
            </div>
            @endif 
            @stack('page-styles')
            <br>
            <table class="table table-responsive martop-sm table-striped table-bordered">
            <thead>
                <br>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
           
            </thead>
            <tbody>
            @php $i=1;@endphp

            @foreach ($user as $p)
            <tr>
            <td>{{ $i++ }}</td>
           
            <td>{{ $p->name}}</td>
            <td> {{ $p->email }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>

        </div>
        </div>
     </div>
     @endsection