@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="alert alert-success" id="success_msg" style="display: none;">
            Request added successfully
        </div>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Add connection request
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <br>
                <form method="POST" id="requestForm" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="caller">Client Name</label>
                        <input type="text" class="form-control" name="caller"
                               placeholder="Client Name">
                        <small id="name_ar_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Client Phone</label>
                        <input type="text" class="form-control" name="phone"
                               placeholder="Client Phone">
                        <small id="name_ar_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="city">City Name</label>
                        <select name="city_id" id="city">
                            <option style="display:none">Select One</option>
                        @foreach( \App\City::get() as $city )
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <select name="address_id" id="address"></select>
                    </div>

                    <div class="form-group">
                        <label for="reason">Contact reason</label>
                        <select name="reason_id" id="reason">
                            @foreach( \App\ContactReason::get() as $reason )
                                <option value="{{ $reason->id }}">{{ $reason->reason }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <button id="skip" class="skip btn btn-danger">Cancel</button>
                        <button id="next1" class="btn btn-primary">Next</button>
                    </div>
                </form>

                <form method="POST" id="operatorForm" action="" style="display: none" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="operator">Operator Name</label>
                        <select name="operator_id" id="operator">
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group-btn" data-toggle="buttons" id="offer">
                        </div>

                    </div>

                    <div class="form-group">
                        <button id="skip" class="skip btn btn-danger">Cancel</button>
                        <button id="next2" class="btn btn-primary">Next</button>
                    </div>
                </form>

                <div id="infoForm" style="display: none">
                    <div class="form-group">
                        <h1>Done</h1>
                    </div>

                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Caller name</td>
{{--                            <td>{{$request->caller}}</td>--}}
                        </tr>
                        </tbody>
                    </table>


                </div>

                <form method="POST" id="cancelForm" action="" style="display: none" enctype="multipart/form-data">
                    <div class="form-group">
                        <h1>Cancel</h1>
                        <div class="form-group">
                            <label for="reason">Cancel reason</label>
                            <select name="reason_id" id="reason">
                                @foreach( \App\CancelReason::get() as $reason )
                                    <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <button id="cancelReason" class="btn btn-primary">Send Reason</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        @parent
        var formData = new FormData;
        var formData2 = new FormData;
        var operators = [];
        var request;
        $(function(){
            $('#city').change(function(){
                $("#address option").remove();
                $('#address').append($('<option style="display:none">Select One</option>'));
                var id = $(this).val();
                $.ajax({
                    url : '{{ route( 'loadCities' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        $.each( result['addresses'], function(k, v) {
                            $('#address').append($('<option>', {value:k, text:v}));
                        });
                        operators = result['operators']
                        $('#operator').append($('<option style="display:none">Select One</option>'));
                        $.each( result['operators'], function(k, v) {
                            $('#operator').append($('<option>', {value:k, text:v}));
                        });

                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            });
        });

        $(function(){
            $('#operator').change(function(){
                // $("#offer div").remove();
                $("#offer label").remove();
                $("#offer input").remove();
                $("#offer table").remove();

                var id = $(this).val();
                $.ajax({
                    url : '{{ route( 'loadOffers' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        $.each( result['offers'], function(k, v) {
                            $('#offer').append($('<label class="btn btn-primary">\n' +
                                '<input type="radio" name="offer_id" value="'+ v.id +'" id="'+ v.id +'" autocomplete="off">'+ v.name +'' +
                                '</label>'))
                            $('#offer').append($('<div class="form-group">\n' +
                                '                        <table id="t'+ v.id +'" class="table table-striped">\n' +
                                '                            <tbody>\n' +
                                '                            </tbody>\n' +
                                '                        </table>\n' +
                                '\n' +
                                '                    </div>'))

                            for (let i = 0; i < v.conditions.length; i++) {
                                $("#t" + v.id)
                                    .append($('<tr>')
                                        .append($('<td>', {value:(v.conditions[i].id), text:v.conditions[i].name}))
                                    );
                            }
                        });
                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            });
        });

        $(document).on('click', '#next1', function (e) {
            e.preventDefault();
            formData = new FormData($('#requestForm')[0]);
            $('#requestForm').hide()
            $('#operatorForm').show()
        });

        $(document).on('click', '#next2', function (e) {
            e.preventDefault();
            var poData = jQuery(document.forms['operatorForm']).serializeArray();
            for (var i=1; i<poData.length; i++)
                formData.append(poData[i].name, poData[i].value);
            $('#operatorForm').hide()
            $('#infoForm').show()
            console.log(formData);
            for (var p of formData) {
                let name = p[0];
                let value = p[1];

                console.log(name, value)
            }
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('addRequest')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    // if (data.status == true) {
                    //     $('#success_msg').show();
                    // }
                    $.ajax({
                        url:     '/show/' + data.id,
                        type:    'get',
                        data:    { id: data.id },
                        success: function(response) {
                            $('#success_msg').show();
                        }
                    });

                    $('#success_msg').show();


                }, error: function (reject) {
                    alert('error...');
                }
            });
        });

        $(document).on('click', '#skip', function (e) {
            e.preventDefault();
            $('#requestForm').hide()
            $('#operatorForm').hide()
            $('#cancelForm').show()
            formData = null;
        });

        $(document).on('click', '#cancelReason', function (e) {
            e.preventDefault();
            formData = new FormData($('#cancelForm')[0]);
            $('#requestForm').show()
        });
    </script>
@stop

