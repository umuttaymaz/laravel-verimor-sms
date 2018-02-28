<?php
/**
 * Created by PhpStorm.
 * User: umuttaymaz
 * Date: 28.02.2018
 * Time: 23:42
 */

namespace UmutTaymaz\VerimorSMSAPI;


class Verimor
{

    /**
     * @var string
     */
    protected $header;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var mixed
     */
    protected $recipients;


    /**
     * Verimor constructor.
     */
    public function __construct()
    {
        $this->header = 'Kreator';
        $this->message = '';
    }

    /**
     * @param $header
     * @return $this
     */
    public function header($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * @param $message
     * @param $callback
     * @return mixed|string
     */
    public function send($message, $callback)
    {
        $this->message = $message;

        call_user_func($callback, $this->to($callback));

        $response = $this->sendToVerimor();

        return $response;
    }

    /**
     * @param $numbers
     * @return $this
     */
    public function to($numbers)
    {
        $this->recipients = is_array($numbers) ? implode(',', $numbers) : $numbers;

        return $this;
    }

    /**
     * @return mixed|string
     */
    protected function sendToVerimor()
    {
        $messageData = [
            "username" => env('VERIMOR_USERNAME'),
            "password" => env('VERIMOR_PASSWORD'),
            "source_addr" => $this->header,
            "custom_id" => uniqid(),
            "messages" => array(
                array(
                    "msg" => $this->message,
                    "dest" => $this->recipients
                )
            )
        ];

        $ch = curl_init('http://sms.verimor.com.tr/v2/send.json');

        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            CURLOPT_POSTFIELDS => json_encode($messageData),
        ));

        $http_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code != 200) {
            return "$http_code $http_response\n";
        }

        return $http_response;
    }


}