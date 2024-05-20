@extends('layouts.masterLayout')
@section('content')
    <div class="card w-75 mx-auto mt-3">
        <div class="card-header ">
            <h3>Welcome to our Query Practise!<a href="" class="btn btn-primary float-end">Add Student</a></h3>
        </div>
    </div>
    <div class="mt-5">
        <table class="table w-75 mx-auto table-border border-primary">
            <thead class="table-dark fs-4 text-center align-middle ">
            <tr class="">
                <td>Name</td>
                <td>Email</td>
                <td>Age</td>
                <td>City</td>
{{--                <td>Gender</td>--}}
{{--                <td>Division</td>--}}
{{--                <td>District</td>--}}
{{--                <td>Birthdate</td>--}}
{{--                <td>Image Path</td>--}}
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody class="text-center ">
        @foreach($results as $result)
            <tr>
                <td> {{$result->name}}</td>
                <td> {{$result->email}} </td>
                <td> {{$result->age}} </td>
                <td> {{$result->city_name}} </td>
                <td> <a href="" class="btn btn-primary">edit</a> </td>
                <td> <form action="" method="post">
                        <button type="submit" name="" class="btn btn-danger" value=" "> Delete</button>
                    </form>
                </td>
{{--                <td> <form action="code.php" method="post">--}}
{{--                        <button type="submit" name="delete_student" class="btn btn-danger" value=" <?= $row->id; ?> "> Delete</button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
<div class="w-50 float-end"> {{$results->links()}}</div>

@endsection
