<?php

use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function indexAction()
    {
       
        $location = $this->request->getPost('location');

        if ($location) {


            $temp = str_replace('', '+', $location);

            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q=' . $temp . '&aqi=no',
                // You can set any number of default request options.
                // 'timeout'  => 2.0,
            ]);
            $response = $client->request('GET');

            echo $response->getStatusCode();
            $body = $response->getBody();
            echo '<pre>';
            $arr_body = json_decode($body);
            $this->view->data = $arr_body;
        }
    }
    public function exploreAction()
    {
        $name = $this->request->getPost('hidden');

        if ($name) {


            $temp = str_replace('', '+', $name);

            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q=' . $temp . '&aqi=no',
                // You can set any number of default request options.
                // 'timeout'  => 2.0,
            ]);
            $response = $client->request('GET');

            echo $response->getStatusCode();
            $body = $response->getBody();
            echo '<pre>';
            $arr_body = json_decode($body);
            $this->view->data = $arr_body;
        }
    }
    public function forecastAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        // $btn = $this->request->getPost('name');
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&days=5&aqi=no&alerts=no
            ',
            // You can set any number of default request options.
            // 'timeout'  => 2.0,
        ]);
        $response = $client->request('GET');

        echo $response->getStatusCode();
        $body = $response->getBody();
        echo '<pre>';
        $arr_body = json_decode($body);
        $this->view->data = $arr_body;
    }
    public function qualityAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q=' . $city . '&days=1&aqi=yes&alerts=no
            ',
            // You can set any number of default request options.
            // 'timeout'  => 2.0,
        ]);
        $response = $client->request('GET');

        echo $response->getStatusCode();
        $body = $response->getBody();
        echo '<pre>';
        $arr_body = json_decode($body);
        $this->view->data = $arr_body;
    }
    public function alertAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.weatherapi.com/v1/forecast.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&days=1&aqi=no&alerts=yes

            ',
        ]);
        $response = $client->request('GET');

        echo $response->getStatusCode();
        $body = $response->getBody();
        echo '<pre>';
        $arr_body = json_decode($body);
        $this->view->data = $arr_body;
    }
    public function historyAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client();
        $response = $client->request('GET', 'http://api.weatherapi.com/v1/history.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&dt=2010-01-01');

        echo $response->getStatusCode();
        $body = $response->getBody()->getContents();
        echo '<pre>';
        $arr_body = json_decode($body);
        // print_r($arr_body);
        // die;
        $this->view->data = $arr_body;
    }
    public function astronomyAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client();
        $response = $client->request('GET', 'http://api.weatherapi.com/v1/astronomy.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&dt=2022-04-07');

        echo $response->getStatusCode();
        $body = $response->getBody()->getContents();
        echo '<pre>';
        $arr_body = json_decode($body);
        // print_r($arr_body);
        // die;
        $this->view->data = $arr_body;
    }
    public function zoneAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client();
        $response = $client->request('GET', 'http://api.weatherapi.com/v1/timezone.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'');

        echo $response->getStatusCode();
        $body = $response->getBody()->getContents();
        echo '<pre>';
        $arr_body = json_decode($body);
        // print_r($arr_body);
        // die;
        $this->view->data = $arr_body;
    }
    public function sportAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client();
        $response = $client->request('GET', 'http://api.weatherapi.com/v1/sports.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'
        ');

        echo $response->getStatusCode();
        $body = $response->getBody()->getContents();
        echo '<pre>';
        $arr_body = json_decode($body);
        // print_r($arr_body);
        // die;
        $this->view->data = $arr_body;
    }
    public function currentAction()
    {
        $city = $this->request->getQuery('name');
        $this->view->city = $city;
        $client = new Client();
        $response = $client->request('GET', 'http://api.weatherapi.com/v1/current.json?key=0bab7dd1bacc418689b143833220304&q='.$city.'&aqi=no
        ');

        echo $response->getStatusCode();
        $body = $response->getBody()->getContents();
        echo '<pre>';
        $arr_body = json_decode($body);
        // print_r($arr_body->current);
        // die;
        $this->view->data = $arr_body;
    }
    

}
