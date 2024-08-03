@extends('admin.layout.master')
@section('admin_master')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css'>

<!--  -->
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<form method="post" action="{{ route('admin_users_add_api') }}">

    <div class="form-group mb-3">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username..." required />
    </div>

    <div class="form-group mb-3">
        <label>Password</label>
        <input type="text" class="form-control" name="password" placeholder="Password..." required />
    </div>

    <div class="form-group mb-3">
        <label>Login time</label>
        <input type="number" class="form-control" name="login_time" placeholder="Login time..." required />
    </div>

    <div class="form-group mb-3">
        <label>Expired date</label>
        <input type="number" class="form-control" name="expired" placeholder="Expired date..." required />
    </div>

    <div class="form-group mb-3">
        <label>User 18+??</label>
        <select name="user_adult" class="form-select">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Access details</label>
        <br>
        <select name="access_server[]" class="form-control selectpicker" multiple aria-label="Default select example" data-live-search="true">
            <option value="0">All</option>
            @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Slider Type</label>
        <select name="slider" class="form-select">
            <option value="Slider 1">Slider 1</option>
            <option value="Slider 2">Slider 2</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label>User can access products?</label>
        <select name="products_access" class="form-select">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Account Type</label>
        <select name="role" class="form-select">
            <option value="0">USERS</option>
            @if(admin_data(session() -> get('username'))['role'] == "1")
                <option value="2">RESELLER</option>
            @endif
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Note</label>
        <textarea class="form-control" style="height:150px" name="note"></textarea>
    </div>

    <input type="submit" value="CONFIRM" class="btn btn-success">

</form>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js'></script>
@endsection
