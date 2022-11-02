<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return $author;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Author::create([
            "name"=>$request->name,
            "date_of_birth"=>$request->date_of_birth,
            "place_of_birth"=>$request->place_of_birth,
            "gender"=>$request->gender,
            "email"=>$request->email,
            "phone"=>$request->phone,
        ]);

        return response()->json([
            'succes' => 201,
            'message' => "Data Berhasil Dibuat",
            'data' => $table
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        if($author){
            return response()->json([
                'status' => 200,
                'data' => $author,
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'mesage' => "id" . $id . "Tidak Ditemukan",
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if($author){
            $author->name = $request->name ? $request->name : $author->name;
            $author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
            $author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
            $author->gender = $request->gender ? $request->gender : $author->gender;
            $author->email = $request->email ? $request->email : $author->email;
            $author->phone = $request->phone ? $request->phone : $author->phone;

            return response()->json([
                'status'=>200,
                'data'=>$author,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>"id".$id."Tidak Ditemukan"
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::where('id',$id)->first();
        if($author){
            $author->delete();
            return response()->json([
                'status'=>200,
                'data'=>$author,
                'message'=>"Data Berhasil Dihapus",
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>"id ".$id." Tidak Ditemukan"
            ]);
        }
    }
}
