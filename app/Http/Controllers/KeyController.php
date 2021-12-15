<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\DB;
use Elasticsearch\ClientBuilder;
use Carbon\Carbon;

use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index() {
        $keyid = Auth::user()->tokenid;
        // dd($keyid);
        return $keyid;
    }

    public function keyresults(Request $request) {
        $client = ClientBuilder::create()->build();
        $currentUrl = url()->full();
        $current_date_time = Carbon::now()->toDateTimeString();
        $firsth = explode('search=', $currentUrl);
        $search = $firsth[1];
        $firstn = explode('id=', $currentUrl);
        // dd($firstn);
        $firstn1 = explode('&', $firstn[1]);
        $params = [
            'index' => 'product',
            'size' => (int)$firstn1[0],
            'explain' => true,
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $search,
                        'fuzziness' => 'AUTO',
                        'fields' => ['title^5', 'descritpion'],
                    ],
                    ],
            ]
        ];
        $results = $client->search($params);
        $count = $results['hits']['total']['value'];
        $final_json = [];
        $obj = [];
        $response = $results['hits']['hits'];
        $count = 0;
        foreach ($response as $p) {
            $count = $count + 1;
            $obj = [
                'ranking'=> $count,
                'title'=> $p['_source']['title'],
                'timestamp'=> $current_date_time 
            ];
            array_push($final_json,$obj);
        
        }
        return $final_json;        
    }
}
