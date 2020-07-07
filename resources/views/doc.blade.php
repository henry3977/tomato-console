@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5 text-tomato">tomato API</h1>
            <h4>소개</h5>
            <p class="lead">
            주소 {{ env('APP_URL') }}/api
            </p>
            <h4>에러</h5>
            <p class="lead">
                status : 422
                <pre class="bg-dark text-tomato">                  
    {   
        "message": "Error message"
    }
                </pre>
            </p>


            <div class="card mt-5">
                <div class="card-header">
                    <h3>/to-terminals</h3>
                </div>

                <div class="card-body">
                    <span class="badge badge-primary">GET</span>
                    <p class="mt-2 card-text">
                        사창리 >>> 터미널 리스트
                        <h5>요청</h5>
                        <div class="alert alert-dark" role="alert">
                            <strong>{{ env('APP_URL') }}/api</strong>/to-terminals
                        </div>
                        <h5>응답</h5>
                        <pre class="bg-dark text-tomato">                  
    [
        {
            "id": 2,
            "name": "동서울"
        },
        {
            "id": 3,
            "name": "춘천"
        }
    ]
                        </pre>
                    </p>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    <h3>/schedules/{to}</h3>
                </div>

                <div class="card-body">
                    <span class="badge badge-primary">GET</span>
                    <p class="mt-2 card-text">
                        스케줄 리스트
                        <h5>요청</h5>
                        <div class="alert alert-dark" role="alert">
                            <strong>{{ env('APP_URL') }}/api</strong>/schedules/2
                        </div>
                        <h5>응답</h5>
                        <pre class="bg-dark text-tomato">                  
    [
        {
            "id": 1,
            "from": "사창리",
            "to": "동서울",
            "time": "06:30",
            "has_stop": true
        },
        {
            "id": 2,
            "from": "사창리",
            "to": "동서울",
            "time": "07:00",
            "has_stop": false
        },
        {
            "id": 3,
            "from": "사창리",
            "to": "동서울",
            "time": "07:20",
            "has_stop": false
        },
        {
            "id": 4,
            "from": "사창리",
            "to": "동서울",
            "time": "07:40",
            "has_stop": false
        },
        {
            "id": 5,
            "from": "사창리",
            "to": "동서울",
            "time": "07:55",
            "has_stop": false
        },
        {
            "id": 6,
            "from": "사창리",
            "to": "동서울",
            "time": "08:10",
            "has_stop": false
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
