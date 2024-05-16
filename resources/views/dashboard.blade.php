<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<x-app-layout>
{{--    <div class="card w-75 mx-auto my-5">--}}
{{--        <div class="card-body">--}}
{{--            <div class="container mt-5">--}}
{{--                <form id="examForm" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group card-title">--}}
{{--                        <label for="examSelect">Exam Name:</label>--}}
{{--                        <select class="form-control" id="examSelect" name="exam">--}}
{{--                            <option value="" selected disabled>Select an exam</option>--}}
{{--                            @foreach($exams as $exam)--}}
{{--                                <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-primary">Get Questions</button>--}}
{{--                </form>--}}
{{--                <div id="questions" class="mt-4"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="d-flex justify-content-around mt-4">
    @foreach($exams as $exam)
    <div class="card my-5 mx-5" style="width: 8.5rem;" >
        <div class="card-body">

            <h5 class="card-title text-center">{{ $exam->exam_name }}</h5>
            <a href="{{ route('exam.questions', ['id' => $exam->id]) }}" class="card-link btn btn-success text-center">Questions</a>

        </div>
    </div>
    @endforeach
    </div>
</x-app-layout>
