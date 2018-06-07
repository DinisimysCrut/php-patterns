<?php
/**
 * Пример  реализации паттерна Фабричный метод (живой пример)
 * ФАБРИЧНЫЙ МЕТОД - getService()
 */


/**
 * Class SenderAbstract
 * Абстрактный класс для сервисов отправки сообщений
 */
abstract class SenderAbstract
{
    /**
     * Название сервиса
     * @var null
     */
    private $name = null;

    /**
     * Отправляем сообщение в сервис
     * @param string $to Получатель
     * @param string $text Текст сообщения
     * @return mixed
     */
    abstract public function sendMessage(string $to,string $text):mixed;

    /**
     * Получаем имя сервиса
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }
}

/**
 * Class TelegramSender
 * Сервис Телеграм
 */
class TelegramSender extends SenderAbstract
{

    /**
     * Имя сервиса Телеграм
     * @var string
     */
    private $name = 'telegram';

    public function sendMessage(string $to,string $text):mixed
    {
        $idMessage = 123;
        return $idMessage;
    }

}

/**
 * Class ViberSender
 * Сервис Вайбер
 */
class ViberSender extends SenderAbstract
{
    /**
     * Имя сервиса Вайбер
     * @var string
     */
    private $name = 'viber';

    public function sendMessage(string $to,string $text):mixed
    {
        $idMessage = 'uniq';
        return $idMessage;
    }
}

/**
 * Class SenderFactory
 * Фабрика для создания сервисов отправки сообщений
 */
class SenderFactory
{
    /**
     * Возвращаем экзепмляр класса для работы с определенным сервисом
     * Это и есть наш ФАБРИЧНЫЙ МЕТОД!
     * @param string $nameService Имя сервиса
     * @return SenderAbstract
     * @throws Exception
     */
    public function getService(string $nameService):SenderAbstract
    {
        switch ($nameService) {
            case 'telegram':
                return new TelegramSender();
            case 'viber':
                return new ViberSender();
            default:
                throw new Exception('Undefined name of service');
        }
    }
}

//Создаем объект фабрики для наший сервисов
$serviceFactory = new SenderFactory();

//Создаем объект сервиса Телеграм
$telegramSender = $serviceFactory->getService('telegram');

//Создаем объект сервиса Вайбер

$viberSender = $serviceFactory->getService('viber');

//Отправляем в Телеграм сообщение и получаем его ID
$idMessToTelegram = $telegramSender->sendMessage('123','hello');

//Отправляем в Вайбер сообщение и получаем его ID
$idMessToViber = $viberSender->sendMessage('123','hello');