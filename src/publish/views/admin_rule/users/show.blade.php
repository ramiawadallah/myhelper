@extends('layouts.admin')
@section('title') {{ trans('lang.users') }}  @endsection
@section('menu') {!! getBreadcrumbs('user',$user->id)->show !!}  @endsection
@section('content')

<div class="note note-info">
    <p>{!! $user->trans('info') !!}</p>
</div>
 
@endsection