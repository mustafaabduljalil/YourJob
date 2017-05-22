@extends('layouts.app')

@section('title')
  {{trans('messages.Quick Contact')}}
@endsection

@section('content')

<div class="container form">  
  <form id="contact" action="/contactUs" method="get">
  	{{csrf_field()}}
    <h3>{{trans('messages.Quick Contact')}}</h3>
    <h4>{{trans('messages.Contact us')}}</h4>
    <fieldset>
      <textarea placeholder="{{trans('messages.Quick Contact')}}...." name="msg" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">{{trans('navbar.Send')}}</button>
    </fieldset>
  </form>
 
  
</div>



@endsection