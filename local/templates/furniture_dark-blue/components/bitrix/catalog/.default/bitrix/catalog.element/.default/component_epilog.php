<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Highloadblock as HL;
CModule::IncludeModule('highloadblock');
if($_POST["FOLOW"] && $_POST["EMAIL"])
{
    $hlblock_id = 1;
    $hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    $rsData = $entity_data_class::getList(array(
        'order' => array('UF_USER'=>'ASC'),
        'select' => array('*'),
        'filter' => array('UF_USER' => $_POST["EMAIL"], "UF_PRODUCT" => $_POST["FOLOW"])
    ));
    while($el = $rsData->fetch()){
        $GLOBALS['APPLICATION']->RestartBuffer();
        echo "Вы уже подписаны на данный товар";
        die();
    }

    $result = $entity_data_class::add(array(
        'UF_USER' => $_POST["EMAIL"],
        'UF_PRODUCT' => $_POST["FOLOW"],
    ));
    $GLOBALS['APPLICATION']->RestartBuffer();
    die();

}

