<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 05.12.17
 * Time: 16:44
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Madcoda\Youtube\Youtube;

class RankController extends Controller
{
    private $youtube;

    private $result = [];

    function __construct(Request $request)
    {
        parent::__construct($request);

        //GoogleAPIClient
        $this->youtube = new Youtube(['key' => config('youtube.key')]);
    }


    //метод выводит индексную страницу
    public function index()
    {
        return view('youtube');
    }

    //Метод обработки даных
    public function handle()
    {
        //Валидация входящих данных
        $data = $this->request->input();
        $v = \Validator::make($data, [
            'url' => 'required|regex:/^(?:https:\/\/www.youtube\.com\/)watch[?]v=(.+)$/',
            'keywords' => 'required',
        ]);

        if($v->fails()) {
            return back()->withErrors($v->errors());
        }

        //Парсинг урла
        $videoId = $this->youtube->parseVIdFromURL($data['url']);

        //Запрос нинформации о видео
        $video = $this->youtube->getVideoInfo($videoId);

        //Запись промежуточных результатов
        $this->result['keywords'] = $data['keywords'];
        $this->result['country'] = $data['country'];
        $this->result['video'] = $video;

        //Параметры для запроса в Google
        $params = array(
            'q' => $data['keywords'],
            'part' => 'snippet',
            'maxResults' => 20,
            'regionCode' => $data['country'],
        );

        //Первоначальный поиск видео
        $search = $this->youtube->searchAdvanced($params, true);
        if ($search['results'] == false) {
            return back()->withMsg('Not found');
        }
        $this->checkArray($search, $videoId);

        //Цикл поверки допольнительных страниц поиска
        while ($this->result == []){

            //Доп параметр для проверки всех страниц поиска
            $params['pageToken'] = $search['info']['nextPageToken'];

            array_merge($search, $this->youtube->searchAdvanced($params, true));

            //проверка на наличие данных в поиске
            if ($search['results'] == false) break;

            $this->checkArray($search, $videoId);
        }

        return view('youtube')->withResult($this->result);
    }

    //Метод проверяет есть ли нужное видео в массиве
    private function checkArray($search, $videoId)
    {
        foreach ($search['results'] as $key => $item) {
            if ($item->id->kind == 'youtube#video' && $item->id->videoId == $videoId) {
                $this->result['place'] = $key + 1;
            }
        }
    }
}