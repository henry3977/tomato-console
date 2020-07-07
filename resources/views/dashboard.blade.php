@extends('layouts.app')

@section('content')
<div class="container-fluid">
  
    <terminals 
        :terms="{{ $terminals }}"></terminals>   
       
</div>
@endsection
