@extends('welcome')
@section('content')

    <h2 class="my-2 text-center">Send Email</h2>
    <form class="mx-5 my-5" action="{{route('send.mail', $id)}}" method="post">
        @csrf
        <div class="form-group">
            <label>Email subject:</label>
            <input type="text" name="subject" class="form-control" aria-describedby="emailHelp" placeholder="Enter email subject...">
        </div>

        <div class="form-group">
            <label>Email body:</label>
            <textarea class="form-control" name="emailBody" cols="30" rows="10" placeholder="Write your Email here..."></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

@endsection
