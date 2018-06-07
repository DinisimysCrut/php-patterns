<?php
/**
 * Пример реализации паттерна Фабричный метод (образный пример)
 * ФАБРИЧНЫЙ МЕТОД - getUnit()
 */

/**
 * Интерфейс для описания Казармы в общем
 */
interface Kazarma
{
    /**
     * Создает нового пехотинца в казарме
     * @return Unit
     */
    public function getUnit():Unit;
}


/**
 * Интерфейс для описания Пехотинца в общем
 */
interface Unit
{
    /**
     * Узнаем сколько хитпоинтов у пехотинца
     * @return int
     */
    public function getHP():int;
}


/**
 * Казарма для римлян
 */
class KazarmaRim implements Kazarma
{
    /**
     * Создаем римского поехотинца
     * @return Unit
     */
    public function getUnit():Unit
    {
        return new UnitRim();
    }
}

/**
 * Римский пехотинец
 */
class UnitRim implements Unit
{
    /**
     * У риской пехоти 100хп
     * @return int
     */
    public function getHP():int
    {
        return 100;
    }
}

/**
 * Казарма для египтян
 */
class KazarmaEgipet implements Kazarma
{
    /**
     * Созаем египетского пехотинца
     * @return Unit
     */
    public function getUnit():Unit
    {
        return new UnitEgipet();
    }
}


/**
 * Египетский пехотинец
 */
class UnitEgipet implements Unit
{
    /**
     * Египетский пехотинец имеет 150хп
     * @return int
     */
    public function getHP():int
    {
        return 150;
    }
}

//Создаем казарму для римлян
$kazarmaRim = new KazarmaRim();

//Создаем в казарме римского пехотинца
$unitRim = $kazarmaRim->getUnit();

//Создаем казарму для египтян
$kazarmaEgipet = new KazarmaEgipet();

//Создаем египетского пехотинца
$unitEgipet = $kazarmaEgipet->getUnit();
