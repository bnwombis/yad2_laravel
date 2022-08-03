@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <label for="username">Enter username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username" class="form-control">

                    <label for="email">Enter email</label>
                    <input type="text" name="email" id="email" placeholder="Enter email" class="form-control">

                    <label for="message">Enter message</label>
                    <textarea name="message" id="message" placeholder="Enter message" cols="30" rows="10" class="form-control"></textarea>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
