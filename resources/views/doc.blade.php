@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5 text-tomato">tomato API</h1>
            <h4>소개</h5>
            <p class="lead">
            주소 http://34.64.171.19/api
            </p>

            <div class="card mt-5">
                <div class="card-header">
                    <h3>/from-terminals</h3>
                </div>

                <div class="card-body">
                    <span class="badge badge-primary">GET</span>
                    <p class="mt-2 card-text">
                        사창리 >>> 터미널 리스트
                        <h5>요청</h5>
                        <div class="alert alert-dark" role="alert">
                            <strong>http://34.64.171.19/api</strong>/from-terminals
                        </div>
                        <h5>응답</h5>
                        <pre class="bg-dark text-tomato">                  
    [
        {
            "name": "사창리"
        }    
    ]
                        </pre>
                    </p>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    <h3>/from-schedules/{to}</h3>
                </div>

                <div class="card-body">
                    <span class="badge badge-primary">GET</span>
                    <p class="mt-2 card-text">
                        스케줄 리스트
                        <h5>요청</h5>
                        <div class="alert alert-dark" role="alert">
                            <strong>http://34.64.171.19/api</strong>/from-schedules/1
                        </div>
                        <h5>응답</h5>
                        <pre class="bg-dark text-tomato">                  
    [
        {
            "id": 1,
            "to": "동서울",
            "time": "06:30",
        },
        {
            "id": 2,
            "to": "동서울",
            "time": "07:00",
        },
        {
            "id": 3,
            "to": "동서울",
            "time": "07:20",
        } 
    ]
                        </pre>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
