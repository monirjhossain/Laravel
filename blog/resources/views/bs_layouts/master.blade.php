@include('bs_layouts.header')

<div class="jumbotron">
  <div class="container text-center">
    <h1>@yield('page-title')</h1>      
    <p>Some text that represents "Me"...</p>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  @yield('content')
</div><br>
<br><br>
@include('bs_layouts.footer')