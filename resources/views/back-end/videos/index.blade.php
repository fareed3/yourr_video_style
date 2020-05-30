@extends('back-end.layout.app')

@section('title')

{{$TableName}}

@endsection




@section('content')

@component('back-end.layout.nav',['nav_title'=>$TableName])

@endcomponent

<div class="panel-header panel-header-sm">
      </div>

 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">{{$TableName}} Table</h4>
                
                <div align='right' style="margin-bottom: 10px ">
                    <a href="{{route("$RouteName.create")}}" class="btn btn-primary btn-round">
                        <b> Add {{$TableName}}</b>
                    </a>
              </div>
                
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    
                      <th>
                        Id
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        publish
                      </th>
                       <th>
                        category
                      </th>
                       <th>
                        User
                      </th>
                       <th>
                        Control
                      </th>   
                    </thead>
                    <tbody> 
                        
                    @foreach($users as $user)
                    
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        @if($user->publish==1)
                         
                            <td>published</td>
                        @else
                            <td>hidden</td>
                       @endif
                       
                    <td>{{$user->cat->name}}</td>                        
                      
                    <td>{{$user->user->name}}</td> 
                       
                        <td class='row'>
                            
                            
                            @include('back-end.shared.buttons.edit')
                            
                            @include('back-end.shared.buttons.destroy')
                          
                        </td>
                    </tr>                    
                    @endforeach
            
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        
        </div>
      </div>

@endsection

