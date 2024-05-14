@extends('layouts.masterLayout')
@section('content')
    <div>
        <h1 class="my-3 text-center"> Exam Question Bank</h1>
    <form method="post" action="{{route('admin.store')}}">
        @csrf
        <div class="d-flex flex-wrap justify-content-around align-items-center mb-3">
            <div class="mb-3 w-25 ms-4  ">  <label for="name" class="form-label">Exam Name</label>
                <input type="text" id="student_id" name="exam_name" class="form-control" required>
{{--                <select id="name" class="form-select" aria-label="Select Name">--}}
{{--                    <option value="name1">JSC</option>--}}
{{--                    <option value="name2">SSC</option>--}}
{{--                    <option value="name3">HSC</option>--}}
{{--                </select>--}}
            </div>
            <div class="d-flex flex-wrap">  <div class="mb-3 me-2">  <label for="startDate" class="col-form-label">Exam Start Date</label>
                    <div>
                        <input type="date" class="form-control" name="start_date" id="startDate" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="col-form-label">Exam End Date</label>
                    <div>
                        <input type="date" class="form-control" name="end_date"  id="endDate" required>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success ms-5" id="addRowBtn">Add More</button>
       <div class="w-75 mx-auto mt-5">
           <table class="table  table-bordered">
               <thead>
               <tr>
                   <th>Question Name</th>
                   <th>Option A</th>
                   <th>Option B</th>
                   <th>Option C</th>
                   <th>Option D</th>
                   <th>Answer</th>
               {{--                <th></th> </tr>--}}
               </thead>
               <tbody id="questionRows">
               </tbody>
           </table>
       </div>

        <button type="submit" class="btn btn-primary ms-5">Submit</button>
    </form>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#addRowBtn').click(function() {
                var newRow = $('<tr>');
                newRow.append($('<td><input type="text" class="form-control" name="question_name[]" required></td>'));
                newRow.append($('<td><input type="text" class="form-control" name="option_a[]" required></td>'));
                newRow.append($('<td><input type="text" class="form-control" name="option_b[]" required></td>'));
                newRow.append($('<td><input type="text" class="form-control" name="option_c[]" required></td>'));
                newRow.append($('<td><input type="text" class="form-control" name="option_d[]" required></td>'));
                newRow.append($('<td><select class="form-select" name="answer[]" required><option value="">Select Answer</option><option value="a">A</option><option value="b">B</option><option value="c">C</option><option value="d">D</option></select></td>'));
                // newRow.append($('<td><button type="button" class="btn btn-sm btn-danger removeRow">Remove</button></td>'));
                $('#questionRows').append(newRow);
            });

            // $('#questionRows').on('click', '.removeRow', function() {
            //     $(this).closest('tr').remove();
            // });
        });
    </script>
@endpush
