@extends('layouts.app')
@section('content')
 <section class="flex m-60">
    <div class="container shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] mx-auto">
       <a class="b-2" href="{{URL::to('Upload')}}"><img src="images/storeIcon.png" alt=""></a> 
    </div>

    <div class="container b-2 shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] mx-auto">
      <a href="/login">  <img src="images/storeIcon.png" alt=""></a>
    </div>

    <div class="container shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] mx-auto">
      <a href="/login"><img src="images/storeIcon.png" alt=""></a>  
    </div>
    <div class="container shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] mx-auto">
       <a href="/register"><img src="images/storeIconplus.png" alt=""></a> 
    </div>
</section>    

@endsection