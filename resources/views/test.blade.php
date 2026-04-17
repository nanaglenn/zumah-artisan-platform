@extends('layouts.app')

@section('content')
    <div style="width: auto; height: 150px">
        <span>I should be a pop up</span>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            showAlert("success", "message");
        });
    </script>
@endsection