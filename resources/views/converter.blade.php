@extends('layouts.app')
@section('content')
   
   <a href="{{URL::to('/doc-to-pdf')}}">convert to pdf</a> 
     <form action="doc-to-pdf" method='POST' enctype="multipart/form-data">
        <input type="text" name="file_path" value='{{$filename}}'>
    <input type="submit"> </form>
@endsection