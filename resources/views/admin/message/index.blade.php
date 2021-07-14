@extends('layouts.admin')
@section('content')
    <style>
        .search-custom p{
            padding-left: 30px;
            text-align: center;
            font-weight: bold;
        }
        .search-custom{
            padding-left: 0;
            margin-left: 0;
            border-left: none;
        }

    </style>

    <div class="row">
        <div class="col-sm-12 col-lg-12 col-xl-12">

            <div class="search-custom">
                <p class="text-success">All Message</p>
            </div>
            <div class="flex-class"></div>
        </div>

        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="body-content">

                <table class="table table-hover">
                    <thead class="thead-custom">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message Details</th>
                        <th scope="col">Action</th>
                        <th scope="col">Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <th scope="row">{{  $loop->iteration  }}</th>
                            <td>{{$message->name}}</td>
                            <td>{{$message->address}}</td>
                            <td>{{$message->contact}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{ Str::limit($message->description, 50)}}</td>
                            <td>
                                <a href="{{route('message.show', $message)}}" class="text-success"> <i class="fas fa-eye"></i></a>
                           </td><td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\MessageController@destroy', $message]]) !!}
                                @csrf
                                <button CLASS="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            <div class="pagination-custom">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
@endsection
