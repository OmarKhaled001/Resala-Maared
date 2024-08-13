@if ($errors->any())
<div class="alert alert-danger p-1" role="alert">{{$errors->first()}}</div>
@elseif (Session::has('message'))
<div class="alert alert-success p-1 " role="alert">{{ Session::get('message')}}</div>
@endif