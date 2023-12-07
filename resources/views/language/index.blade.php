@extends('layouts.master')
@section('main-section')

<div class="table-responsive">
    <h1>{{__('site.maintain_lang')}}</h1>
    <div class="mb-3 mt-3 text-end"><a class="btn btn-primary" href="{{route('languages.create')}}">{{__('site.lang.add')}}</a></div>
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <h2>{{__('site.lang.list')}}</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>{{__('site.name')}}</th>
                <th>{{__('site.code')}}</th>
                <th>{{__('site.status')}}</th>
                <th>{{__('site.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lang as $row)
                
            <tr class="">
                <td>{{$row->name}}</td>
                <td>{{$row->code}}</td>
                <td>{{$row->status ? trans('site.active') : trans('site.inactive')}}</td>
                <td>
                    <a href="{{route('languages.edit', $row->id)}}" class="btn btn-primary {{session('locale') == $row->code ? 'disabled' : ''}}" >{{__('site.edit')}}</a></td>
            </tr>
            @empty
                <tr>
                    <td colspan=4>{{__('site.not_found')}}</td>
                </tr>
            @endforelse
           
        </tbody>
    </table>
</div>
@endsection