<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Question</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <form method="post" action="{{ route('exam.response.store', ['id' => $id]) }}">
        @csrf
        @foreach($questions as $question)
    <div class="card my-4">
        <div class="card-body">
            <h5 class="card-title">{{ $question->question_name }}</h5>
            <div>
                @php
                    $options = ['A', 'B', 'C', 'D'];
                @endphp
                @foreach($options as $option)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option_{{ $question->id }}" id="option{{ $option }}" value="{{ strtolower($option) }}">
                        <label class="form-check-label" for="option{{ $option }}">
                            {{ $question->{'option_' . strtolower($option)} }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
{{--        <div class="my-3 text-center"> {{$questions->links('cursorPagination::bootstrap-5')}} </div>--}}
        <div class="my-3 text-center"> {{$questions->links()}}</div>
{{--        <div> Total pages: {{$questions->total()}}</div>--}}
{{--        <div> Current page: {{$questions->currentPage()}}</div>--}}
        <button type="submit" class="btn btn-success ">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
