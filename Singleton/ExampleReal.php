<?php

/**
 * HTTP-клиент
 */
class HttpClient
{
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}

    private function __construct() {}

    /**
     * Отправка http-запроса
     * @param $options
     */
    public function request($options) {
        //code for http request
    }
}


/**
 * Работа с Телеграм API
 */
class TelegramApi
{
    public function send()
    {
        $options = [];
        HttpClient::getInstance()->request($options);
    }
}

/**
 * Работа с Google API
 */
class GoogleApi
{
    public function get()
    {
        $options = [];
        HttpClient::getInstance()->request($options);
    }
}
