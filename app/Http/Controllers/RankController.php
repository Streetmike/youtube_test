<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.12.17
 * Time: 16:44
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Madcoda\Youtube\Youtube;

class RankController extends Controller
{
    private $client;
    private $youtube;

    private $result = [];

    function __construct(Request $request)
    {
        parent::__construct($request);

        //GuzzleClient
        $this->client = new Client();

        //GoogleAPIClient
        $this->youtube = new Youtube(['key' => config('youtube.key')]);
    }

    public function index()
    {
        //Получение списка стран
        $response = $this->client->request('GET', 'https://restcountries.eu/rest/v2/all');
        $countries = json_decode((string) $response->getBody());

        return view('youtube')->withCountries($countries);
    }

    public function handle()
    {
        //Валидация входящих данных
        $data = $this->request->input();
        $v = \Validator::make($data, [
            'url' => 'required',
            'keywords' => 'required',
        ]);

        if($v->fails()) {
            return back()->withErrors($v->errors());
        }

        //Парсинг урла
        $videoId = $this->youtube->parseVIdFromURL($data['url']);

        $video = $this->youtube->getVideoInfo($videoId);
        $this->result['views'] = $video->statistics->viewCount;

        $params = array(
            'q' => $data['keywords'],
            'part' => 'snippet',
            'maxResults' => 20,
            'regionCode' => $data['country'],
        );

        $search = $this->youtube->searchAdvanced($params, true);

        foreach ($search['results'] as $key => $item) {
            if ($item->id->kind == 'youtube#video' && $item->id->videoId == $videoId) {
                $this->result['video'] = $search['results'][$key];
                $this->result['place'] = $key + 1;
            }
        }

        if ($this->result == []) {
            while ($this->result == []){
                $params = array(
                    'q' => $data['keywords'],
                    'part' => 'snippet',
                    'maxResults' => 20,
                    'regionCode' => $data['country'],
                    'pageToken' => $search['info']['nextPageToken']
                );

                $search = $this->youtube->searchAdvanced($params, true);

                if ($search['results'] == false) break;

                foreach ($search['results'] as $key => $item) {

                    if ($item->id->kind == 'youtube#video' && $item->id->videoId == $videoId) {
                        $this->result['video'] = $search['results'][$key];
                        $this->result['place'] = $key + 1;
                    }
                }
            }
        }

        dd($this->result);
    }


}