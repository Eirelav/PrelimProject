@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')

<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header><h3><center>My Profile</h3></center></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">

            @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
                </div>
            </section>
            @endif
                
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" id="last_name">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}" id="phone_number">
                </div>
                
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
    </div>
</section>
@endsection