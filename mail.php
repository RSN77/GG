<?php

// На какую почту слать заявки
$to = 'sapiga-sergey@yandex.ru';
// Тема письма
$subject = 'ЗАЯВКА с сайта getguard.ru';


// name полей, которые отправлять на почту
$array = [
    'clothes',
    'address',
    'type',
	'gender',	
    'start_date',
    'start_time',
    'end_date',
    'end_time',
    'info',
    'Name',
    'Phone',
    'Email',
];


// Переводы name для письма
$translate = [
    'clothes' => 'Форма одежды',
    'address'  => 'Адрес',
    'start_date' => 'Начало смены (дата)',
    'start_time' => 'Начало смены (время)',
    'end_date' => 'Конец смены (дата)',
    'end_time' => 'Конец смены (время)',
    'info' => 'Доп. информация',
    'Name' => 'ФИО',
    'Phone' => 'Телефон',
    'type' => 'Тип охраны',
	'gender' => 'Пол',
    'Email' => 'Email',
];

$message = "";
foreach ($_REQUEST as $key => $value){

    if(in_array($key, $array))
        $message.=$translate[$key].': '.$value.PHP_EOL;
}

if(mail($to, $subject, $message)){

    echo json_encode(['STATUS' => 'OK']);

}