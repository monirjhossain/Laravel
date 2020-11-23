<div class="container">
    <h2>This is a about Page</h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus error officia, est iste laborum soluta architecto esse dolore fugit voluptatem!</p>
<p>{{$data}}</p>
<h3>The number of member is {{count($arr)}}</h3>
@php
    $serial = 1;
@endphp
@foreach ($arr as $division)

<p> {{$serial++}}. {{$division}} </p>

    
@endforeach
</div>