@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th scope="col">
                        City
                    </th>
                    <th scope="col">
                        Name
                    </th>
                    <th scope="col">
                        Email
                    </th>
                    <th scope="col">
                        Message
                    </th>
                    <th scope="col">
                        Date
                    </th>
                    </thead>
                    <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>
                                {{ $comment->city_id }}
                            </td>
                            <td>
                                {{ $comment->username }}
                            </td>
                            <td>
                                {{ $comment->email }}
                            </td>
                            <td>
                                {{ $comment->message }}
                            </td>
                            <td>
                                {{ $comment->created_at }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
