@extends('layouts.master');
@section('main-section')
@if (isset($edit->id))
  <h1>{{__('site.cat.update')}}</h1>
@else
  <h1>{{__('site.cat.add')}}</h1>
@endif
@if(isset($edit->id))
<form class="form1" action="{{route('categories.update', $edit->id)}}" method="post">
  @method('PUT')
@else
    <form class="form1" action="{{route('categories.store')}}" method="post">
@endif
    @if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">{{__('site.cat.error_msg')}}</div>
@endif
    @csrf
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      @foreach ($all_languages as $row )
      <li class="nav-item">
        <a class="nav-link {{$row->code == $active_lang ? 'active' : ''}}" data-bs-toggle="tab" href="#tab_{{$row->code}}">{{$row->name}}</a>
      </li>
      @endforeach
     
    </ul>

<!-- Tab panes -->
<div class="tab-content">
  @foreach ($all_languages as $row )
    <div class="tab-pane container {{$row->code == $active_lang ? 'active show' : ''}}" id="tab_{{$row->code}}">
      <div class="mb-3">
        <label for="" class="form-label">{{__('site.cat.name')}}</label>
        <input type="text"
          class="form-control" name="name[{{$row->code}}]" id="name" placeholder="{{__('site.cat.placeholder_name')}}" value="{{old('name.'.$row->code, (isset($edit_name) && !empty($edit_name[$row->code])) ? $edit_name[$row->code] : '')}}">
          <div class="text-danger"> @error('name.'.$row->code){{__('site.cat.name_required')}}@enderror</div>
      </div>
  
      <div class="mb-3">
          <label for="" class="form-label">{{__('site.cat.descr')}}</label>
          <input type="text"
            class="form-control" name="descr[{{$row->code}}]" id="code" placeholder="{{__('site.cat.placeholder_descr')}}" value="{{old('descr.'.$row->code, (isset($edit_descr) && !empty($edit_descr[$row->code])) ? $edit_descr[$row->code] : '')}}">
            <div class="text-danger"> @error('descr.'.$row->code){{__('site.cat.descr_required')}}@enderror</div>
        </div>

    </div>
  @endforeach
</div>    
      <input type="submit" class="btn btn-primary" value="{{__('site.submit')}}">
      <a href="{{route('categories.index')}}" class="btn btn-danger">{{__('site.cancel')}}</a>
</form>
@endsection