<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PractiseController extends Controller
{
//    public function add(){
//        $data = [
//            [
//                'name' => 'John Doe',
//                'email' => 'johndoe@example.com',
//                'age' => 25,
//                'city' => 1
//            ],
//            [
//                'name' => 'Jane Smith',
//                'email' => 'janesmith@example.com',
//                'age' => 30,
//                'city' => 2
//            ],
//            [
//                'name' => 'Bob Johnson',
//                'email' => 'bobjohnson@example.com',
//                'age' => 22,
//                'city' => 1
//            ],
//            [
//                'name' => 'Alice Williams',
//                'email' => 'alicewilliams@example.com',
//                'age' => 28,
//                'city' => 3
//            ],
//            [
//                'name' => 'Chris Evans',
//                'email' => 'chrisevans@example.com',
//                'age' => 26,
//                'city' => 2
//            ],
//            [
//                'name' => 'Diana Prince',
//                'email' => 'dianaprince@example.com',
//                'age' => 27,
//                'city' => 4
//            ],
//            [
//                'name' => 'Bruce Wayne',
//                'email' => 'brucewayne@example.com',
//                'age' => 35,
//                'city' => 3
//            ],
//            [
//                'name' => 'Clark Kent',
//                'email' => 'clarkkent@example.com',
//                'age' => 29,
//                'city' => 1
//            ],
//            [
//                'name' => 'Barry Allen',
//                'email' => 'barryallen@example.com',
//                'age' => 24,
//                'city' => 2
//            ],
//            [
//                'name' => 'Hal Jordan',
//                'email' => 'haljordan@example.com',
//                'age' => 32,
//                'city' => 4
//            ]
//        ];
//        $result=DB::table('students')->insert($data);
//        return view('practise', compact('result'));
//    }

//    public function add(){
//        $data = [
//            [
//                'city_name' => 'Cumilla',
//            ],
//            [
//                'city_name' => 'Dhaka',
//
//            ],
//            [
//                'city_name' => 'Chittagong',
//            ],
//            [
//                'city_name' => 'Sylhet',
//            ]
//        ];
//        $result=DB::table('cities')->insert($data);
//        return view('practise', compact('result'));
//    }
public function index(){
    $results = DB::table('students')
        ->leftJoin('cities', 'students.city', '=', 'cities.id')
//        ->select(DB::raw('count(*) as student_count'), 'age')
//        ->groupBy('age')
//        ->select('students.*', 'cities.city_name')
//        ->where('cities.city_name','=', 'Cumilla')
//        ->simplePaginate(4);
    ->get();
    return ($results);

//    return view('practise', compact('results'));
}
}
