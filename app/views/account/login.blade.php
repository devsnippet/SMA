@extends('layouts.master')
@section('title')
    Login
@stop

@section('meta_description')
    Login
@stop

@section('content')
    <div class="container">
        <h3>Sign In</h3>
        <hr/>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="col-sm-4 col-md-2" class="control-label">Username</label>
                <div class="col-sm-4 col-md-6">
                    <input type="textbox" class="form-control" name="username" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 col-md-2" class="control-label">Password</label>
                <div class="col-sm-4 col-md-6">
                    <input type="password" class="form-control" name="password" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@stop