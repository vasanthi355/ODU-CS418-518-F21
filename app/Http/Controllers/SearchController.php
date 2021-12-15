<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder; 
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = ClientBuilder::create()->build();

        $search = $request->input('search');
        $search = strip_tags($search);
        $esearch = strip_tags($search);
        if($search === '' || Str::length($search) === 0) {
            return redirect()->route('dashboard');
        }
        $params = [
            'index' => 'product',
            'explain' => true,
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $esearch,
                        'fuzziness' => 'AUTO',
                        'fields' => ['title^5', 'descritpion'],
                    ],
                    ],
                    'highlight' => [
                        "pre_tags" => ["<mark>"],
                        "post_tags" => ["</mark>"],
                        "fields" => [
                            "title" => new \stdClass(),
                            "description" => new \stdClass()
                        ],
                        'require_field_match' => false
                    ],
            ]
        ];
        $results = $client->search($params);
        $count = $results['hits']['total']['value'];
        // dd($count);
        $response = $results['hits']['hits'];
        // dd($response);
        return view('search.sample' ,compact('response','count','esearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}