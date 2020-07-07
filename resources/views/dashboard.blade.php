@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
  
        <terminals :terminals="{{ $terminals }}"></terminals>   
        <schedules :schedules="{data:1}"></schedules>   
       
    </div>
</div>
@endsection
