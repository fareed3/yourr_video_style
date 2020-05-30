@extends('back-end.layout.app')


@section('title')

 Add {{$TableName}}

@endsection


@section('content')

@component('back-end.layout.nav',['nav_title'=>"Add $TableName"])

@endcomponent

<div class="panel-header panel-header-sm">
</div>


@component("back-end.shared.create",["TableName"=>$TableName])

        <form action="{{route("$RouteName.store")}}" method="post" enctype="multipart/form-data">
            
            
            @include("back-end.$RouteName.form")
            <div align="right">
            <button  type="submit" class="btn btn-primary btn-round">
                <b>Add {{$TableName}}</b>
           </button>
            </div>
        </form>
 @endcomponent          
    
@endsection

