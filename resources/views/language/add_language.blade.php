@extends('layouts.master');
@section('main-section')
@if (isset($edit->id))
  <h1>{{__('site.lang.update')}}</h1>
@else
<h1>{{__('site.lang.add')}}</h1>
@endif
@if (isset($edit->id))
    <form class="form1" action="{{route('languages.update', $edit->id)}}" method="post">
        @method('PUT')
@else
    <form class="form1" action="{{route('languages.store')}}" method="post">
@endif
    @if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">{{__('site.lang.name')}}</label>
      <input type="text"
        class="form-control" name="name" id="name" placeholder="{{__('site.lang.placeholder_name')}}" value="{{old('name', isset($edit->id) ? $edit->name : '')}}">
        <div class="text-danger">@error('name') {{$message}}@enderror</div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{__('site.lang.code')}}</label>
        <input type="text"
          class="form-control" name="code" id="code" placeholder="{{__('site.lang.placeholder_code')}}" value="{{old('code', isset($edit->id) ? $edit->code : '')}}">
          <div class="text-danger">@error('code') {{$message}}@enderror</div>
      </div>
      <div class="mb-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{isset($edit->id) ? ($edit->status ? 'checked' : '') : ''}}>
            <label class="form-check-label" for="inlineRadio1">{{__('site.active')}}</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{isset($edit->id) ? ($edit->status ? '' : 'checked') : ''}}>
            <label class="form-check-label" for="inlineRadio2">{{__('site.inactive')}}</label>
          </div>
          <div class="text-danger">@error('status') {{$message}}@enderror</div>
    </div>
      <input type="submit" class="btn btn-primary" value="{{__('site.submit')}}">
      <a href="{{route('languages.index')}}" class="btn btn-danger">{{__('site.cancel')}}</a>
</form>
@endsection