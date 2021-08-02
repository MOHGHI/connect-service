@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="alert alert-success" id="success_msg" style="display: none;">
            Request added successfully
        </div>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Show request
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <br>

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Caller name</td>
                        <td>{{$request->caller}}</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Caller Phone</td>
                        <td>{{$request->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Caller City</td>
                        <td>{{$request->city->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Caller Address</td>
                        <td>{{$request->address->address}}</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Caller Operator</td>
                        <td>{{$request->operator->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Caller Offer</td>
                        <td>{{$request->offer->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Caller reason</td>
                        <td>{{$request->reason->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Caller comment</td>
                        <td>{{$request->comment}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop


