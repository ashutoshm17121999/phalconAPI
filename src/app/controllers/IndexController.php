<?php

use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function indexAction()
    {
        $name = $this->request->getPost('item');
        $temp = explode(" ", $name);
        $item = implode("+", $temp);

        $url = "https://openlibrary.org/search.json?q=$item&mode=ebooks&has_fulltext=true";

        // Initialize a CURL session.
        $ch = curl_init($url);

        //grab URL and pass it to the variable.
        // curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        $this->view->data = $response['docs'];


        // echo '<pre>';
        // print_r($response);
        // echo '</pre>';
        // die;
    }

    public function bookdetailAction()
    {
        $id = $this->request->get('id');
        $image = $this->request->get('img');

        $url = "https://openlibrary.org/api/books?bibkeys=ISBN:" . $id . "&jscmd=details&format=json ";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);

        // echo '<pre>';
        // print_r($response['ISBN:'.$id.'']['details']);
        // echo '</pre>';
        // die;
        $this->view->img = $image;
        $this->view->data = $response['ISBN:' . $id . '']['details'];
        $this->view->google = $response['ISBN:' . $id . '']['details']['identifiers']['google'][0];
    }
    public function guzzleAction()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://reqres.in',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('DELETE', '/api/users/2');
  
        echo $response->getStatusCode();
        $body = $response->getBody();
        echo '<pre>';
        $arr_body = json_decode($body);
        print_r($arr_body);
        die();
    }
}
