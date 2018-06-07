<?php

/**
 * Пример  реализации паттерна Абстрактная фабрика (образный пример)
 * АБСТРАКТНАЯ ФАБРИКА - PageFactoryAbstract
 */


/**
 * Общий класс для элементов на странице
 */
abstract class ElementPage
{
    /**
     * @var string Полный HTML-код элемента
     */
    protected $html;

    /**
     * @var string Тег для элемента, который являеться корневым(родителем для всех отсальных)
     */
    protected $parentTag;

    /**
     * Получаем полный HTML-код
     * @return string
     */
    public function getHtml():string
    {
        return $this->html;
    }

    /**
     * Получаем тег корневого html-тега
     * @return string
     */
    public function getParentTag():string
    {
        return $this->parentTag;
    }
}

/**
 * Заголовок Главной страници
 */
class HeaderMain extends ElementPage
{
    protected $parentTag = 'div';
}

/**
 * Контент Главной страници
 */
class ContentMain extends ElementPage
{
    protected $parentTag = 'p';
}

/**
 * Футер Главной страници
 */
class FooterMain extends ElementPage
{
    protected $parentTag = 'span';
}

/**
 * Заголовок Навигации
 */
class HeaderMap extends ElementPage
{
    protected $parentTag = 'a';
}

/**
 * Контент Навигации
 */
class ContentMap extends ElementPage
{
    protected $parentTag = 'div';
}

/**
 * Футер Навигации
 */
class FooterMap extends ElementPage
{
    protected $parentTag = 'a';
}


/**
 * Абстрактная фабрика для создания Страниц
 */
abstract class PageFactoryAbstract
{
    abstract public function createHeader():ElementPage;
    abstract public function createContent():ElementPage;
    abstract public function createFooter():ElementPage;
}

/**
 * Фабрика для Главной страници
 */
class MainPageFactory extends PageFactoryAbstract
{
    public function createHeader():ElementPage
    {
        return new HeaderMain();
    }

    public function createContent():ElementPage
    {
        return new ContentMain();
    }

    public function createFooter():ElementPage
    {
        return new FooterMain();
    }
}

/**
 * Фабрика для Навигационной страници
 */
class MapPageFactory extends PageFactoryAbstract
{
    public function createHeader():ElementPage
    {
        return new HeaderMap();
    }

    public function createContent():ElementPage
    {
        return new ContentMap();
    }

    public function createFooter():ElementPage
    {
        return new FooterMap();
    }
}

//Объект фабрики Главная страница
$pageMain = new MainPageFactory();

//Создаем заголовок для Главной страници
$headerMain = $pageMain->createHeader();

//Объект фабрики Навигационная страница
$pageMap = new MapPageFactory();

//Создаем заголовок для Навигационной страници
$headerMap = $pageMap->createHeader();