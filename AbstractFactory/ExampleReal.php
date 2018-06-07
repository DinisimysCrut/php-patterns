<?php
/**
 * Пример  реализации паттерна Абстрактная фабрика (живой пример)
 * АБСТРАКТНАЯ ФАБРИКА - ProductFactoryAbstract
 */


/**
 * Медиа-файлы
 */
abstract class Media
{

    /**
     * @var string Путь для хранения на локале
     */
    protected $path;

    /**
     * @var string Имя файла
     */
    protected $name;

    /**
     * Возвращает строку - контент медиа-файла
     * @return string
     */
    abstract public function getFile():string;

    /**
     * Устанавливает имя медиа-файла
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Возвращает имя медиа-файла
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Возвращает путь к хранению медиа-файлов
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
}

/**
 * Атрибуты
 */
abstract class Attribute
{
    /**
     * @var string Значение атрибута
     */
    protected $value;

    /**
     * Возвращает значение атрибута
     * @return string
     */
    public function getValue():string
    {
        return $this->value;
    }

    /**
     * Устанавливает значение атрибута
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }
}

/**
 * Медиа-файлы Простого продукта
 */
class MediaSimpleProduct extends Media
{
    protected $path = 'simple';

    public function getFile():string
    {
        return file_get_contents($this->getPath() . $this->getName());
    }

}

/**
 * Атрибуты Простого продукта
 */
class AttributeSimpleProduct extends Attribute
{

}

/**
 * Медиа-файлы Настраиваемого продукта
 */
class MediaConfigurableProduct extends Media
{

    public function getFile():string
    {
        // get file from service
        return 'content';
    }
}

/**
 * Атрибуты Настраиваемого продукта
 */

class AttributeConfigurableProduct extends Attribute
{

}

/**
 * Абстрактная фабрика для Продуктов
 */
abstract class ProductFactoryAbstract
{
    /**
     * Создание экземпляра Медиа-файла для продукта
     * @return Media
     */
    abstract public function createMedia():Media;

    /**
     * Создание экземпляра Атрибута для продукта
     * @return Attribute
     */
    abstract public function createAttribute():Attribute;

}


/**
 * Простой продукт
 */
class SimpleProduct extends ProductFactoryAbstract
{
    public function createAttribute():Attribute
    {
        return new AttributeSimpleProduct();
    }

    public function createMedia():Media
    {
        return new MediaSimpleProduct();
    }
}

/**
 * Настраиваемый продукт
 */
class ConfigurableProduct extends ProductFactoryAbstract
{
    public function createAttribute():Attribute
    {
        return new AttributeConfigurableProduct();
    }

    public function createMedia():Media
    {
        return new MediaConfigurableProduct();
    }
}

//Объект простого продукта
$simpleProduct = new SimpleProduct();

//Объект атрибута для простого продукта
$attributeSimpleProduct = $simpleProduct->createAttribute();

//Объект настраиваемого продутка
$configurableProduct = new ConfigurableProduct();

//Объект атрибута настраиваемого продукта
$attributeConfigurableProduct = $configurableProduct->createAttribute();