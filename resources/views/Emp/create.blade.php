@extends('layouts.index')
@section('content')
<div class="panel panel-widget forms-panel">
    <div class="forms">
        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
                <h4>Basic Form :</h4>
            </div>
            <div class="form-body">
                <form action="{{route('Emp.store')}}" method="post">
                    @csrf
                    <div class="form-group"> 
                        <label for="exampleInputEmail1">Name</label> 
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleInputEmail1">Email address</label> 
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleInputPassword1">Password</label> 
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> 
                    </div> 
                   
                    
                    <button type="submit" class="btn btn-default w3ls-button">Submit</button> 
                </form> 
            </div>
        </div>
    </div>
</div>
@stop