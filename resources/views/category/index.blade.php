@extends('layouts.master')
@section('main-section')

<div class="table-responsive">
    <h1>{{__('site.maintain_cat')}}</h1>
    <div class="mb-3 mt-3 text-end"><a class="btn btn-primary" href="{{route('categories.create')}}">{{__('site.cat.add')}}</a></div>
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
 @endif
    <h2>{{__('site.cat.list')}}</h2>
    <table class="table table-bordered table-striped table-hover">
       
        <thead>
            <tr>
                <th>{{__('site.name')}}</th>
                <th>{{__('site.descr')}}</th>
                <th>{{__('site.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cat as $row)
            @if (count($row->cat_translation))
            <tr>
                <td>{{$row->cat_translation->value('name')}}</td>
                <td>{{$row->cat_translation->value('descr')}}</td>
                <td>
                    <a href="{{route('categories.edit', $row->id)}}" class="btn btn-primary" >{{__('site.edit')}}</a>
                </td>
            </tr>
            @endif
            @empty
                <tr>
                    <td colspan=3>{{__('site.not_found')}}</td>
                </tr>
            @endforelse
           
        </tbody>
    </table>
</div>
@endsection