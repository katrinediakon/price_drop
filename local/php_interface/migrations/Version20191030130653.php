<?php

namespace Sprint\Migration;


class Version20191030130653 extends Version
{
    protected $description = "";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Event()->saveEventType('FEEDBACK_FORM', array (
  'LID' => 'ru',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Отправка сообщения через форму обратной связи',
  'DESCRIPTION' => '#AUTHOR# - Автор сообщения
#AUTHOR_EMAIL# - Email автора сообщения
#TEXT# - Текст сообщения
#EMAIL_FROM# - Email отправителя письма
#EMAIL_TO# - Email получателя письма',
  'SORT' => '7',
));
        $helper->Event()->saveEventType('FEEDBACK_FORM', array (
  'LID' => 'en',
  'EVENT_TYPE' => 'email',
  'NAME' => 'Sending a message using a feedback form',
  'DESCRIPTION' => '#AUTHOR# - Message author
#AUTHOR_EMAIL# - Author\'s e-mail address
#TEXT# - Message text
#EMAIL_FROM# - Sender\'s e-mail address
#EMAIL_TO# - Recipient\'s e-mail address',
  'SORT' => '7',
));
        $helper->Event()->saveEventMessage('FEEDBACK_FORM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Сообщение из формы обратной связи',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Вам было отправлено сообщение через форму обратной связи

Автор: #AUTHOR#
E-mail автора: #AUTHOR_EMAIL#

Текст сообщения:
#TEXT#

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => NULL,
  'REPLY_TO' => NULL,
  'CC' => NULL,
  'IN_REPLY_TO' => NULL,
  'PRIORITY' => NULL,
  'FIELD1_NAME' => NULL,
  'FIELD1_VALUE' => NULL,
  'FIELD2_NAME' => NULL,
  'FIELD2_VALUE' => NULL,
  'SITE_TEMPLATE_ID' => NULL,
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ FEEDBACK_FORM ] Отправка сообщения через форму обратной связи',
));
        $helper->Event()->saveEventMessage('FEEDBACK_FORM', array (
  'LID' => 
  array (
    0 => 's1',
  ),
  'ACTIVE' => 'Y',
  'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
  'EMAIL_TO' => '#EMAIL_TO#',
  'SUBJECT' => '#SITE_NAME#: Сообщение из формы обратной связи',
  'MESSAGE' => 'Информационное сообщение сайта #SITE_NAME#
------------------------------------------

Вам было отправлено сообщение через форму обратной связи

Автор: #AUTHOR#
E-mail автора: #AUTHOR_EMAIL#

Текст сообщения:
#TEXT#

Сообщение сгенерировано автоматически.',
  'BODY_TYPE' => 'text',
  'BCC' => '',
  'REPLY_TO' => '',
  'CC' => '',
  'IN_REPLY_TO' => '',
  'PRIORITY' => '',
  'FIELD1_NAME' => '',
  'FIELD1_VALUE' => '',
  'FIELD2_NAME' => '',
  'FIELD2_VALUE' => '',
  'SITE_TEMPLATE_ID' => '',
  'ADDITIONAL_FIELD' => 
  array (
  ),
  'LANGUAGE_ID' => 'ru',
  'EVENT_TYPE' => '[ FEEDBACK_FORM ] Отправка сообщения через форму обратной связи',
));
    }

    public function down()
    {
        //your code ...
    }
}
