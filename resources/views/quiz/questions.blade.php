@extends('welcome')
@section('content')
    <div class="table-data mx-2 my-3">
        <h2 class="my-5 text-center">Questions</h2>
        <table class="table employee_table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Question</th>
                <th scope="col">Answer A</th>
                <th scope="col">Answer b</th>
                <th scope="col">Answer c</th>

            </tr>
            </thead>
            <tbody>
            @foreach($questions as $key=>$question)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$question->question}}</td>
                    <td>{{$question->answer_a}}</td>
                    <td>{{$question->answer_b}}</td>
                    <td>{{$question->answer_c}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
