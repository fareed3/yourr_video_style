
@php

function is_active($routename)
{
  return request()->segment(2)!=null && request()->segment(2)==$routename ? "active":"";
}

@endphp

<div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
      
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
           Your video style
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
         
          
          
          <li class="{{is_active('users')}}">
            <a href="http://127.0.0.1:8000/Dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          
          <li class="{{is_active('users')}}">
            <a href="http://127.0.0.1:8000/users">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profiles</p>
            </a>
          </li>
          
           
          <li class="{{is_active('categories')}}">
            <a href="http://127.0.0.1:8000/allcategory">
              <i class="now-ui-icons design_app"></i>
              <p>Category</p>
            </a>
          </li>
          
             
         
         
          
          
           
          
          
           <li class="{{is_active('videos')}}">
           <a href="{{route('videos.index')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Videos</p>
            </a>
          </li>
          
           
        </ul>
      </div>
    </div>