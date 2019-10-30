<? // регистрируем обработчик
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyClass", "OnBeforeIBlockElementUpdateHandler"));
use Bitrix\Highloadblock as HL;
CModule::IncludeModule('highloadblock');
class MyClass
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if ($arFields["IBLOCK_ID"] == 2 ) {
            $arSelect = Array("ID", "NAME", "PROPERTY_PRICE");
            $arFilter = Array("ID"=>$arFields["ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
            while($ob = $res->GetNext())
            {
                if($ob["PROPERTY_PRICE_VALUE"]<=$arFields['PROPERTY_VALUES'][2][1]['VALUE']) {
                    return true;
                }
            }
            $hlblock_id = 1;

            $hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
            $entity = HL\HighloadBlockTable::compileEntity($hlblock);
            $entity_data_class = $entity->getDataClass();

            $rsData = $entity_data_class::getList(array(
                'order' => array('UF_USER'=>'ASC'),
                'select' => array('*'),
                'filter' => array('UF_PRODUCT'=> $arFields["ID"])
            ));
            while($el = $rsData->fetch()) {
                $arEventFields = array(
                    "AUTHOR" => $el["UF_USER"],
                    "AUTHOR_EMAIL" => $el["UF_USER"],
                    "TEXT" => "Цена товара изменилась",
                    "EMAIL_TO" =>  $el["UF_USER"]
                );

                CEvent::Send("FEEDBACK_FORM", 's1', $arEventFields);
                $entity_data_class::delete($el["ID"]);
            }

           // die("init.php");
        }
    }
}

?>