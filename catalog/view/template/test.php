<?php
include "../../../vendor/autoload.php";

$userInfo = array(
    0 => ['name'=>'Иван1',  'price' => 1123],
    0 => ['name'=>'Иван2',  'price' => 1223],
    0 => ['name'=>'Иван3',  'price' => 1233],
    0 => ['name'=>'Иван4',  'price' => 1234],
    0 => ['name'=>'Иван5',  'price' => 1235],
    0 => ['name'=>'Иван6',  'price' => 1236],
);

$word = new \PhpOffice\PhpWord\PhpWord();
$template = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');

$template->setValue('d_num', '777'); //номер договора
$template->setValue('d_date', '04.10.2014'); //дата договора
$template->setValue('last_name', 'Никоненко'); //фамилия
$template->setValue('name', 'Сергей');// имя
$template->setValue('surname', 'Васильевич');// отчество
$values = [
    ['userId' => 1, 'userName' => 'Batman', 'userAddress' => 'Gotham City'],
    ['userId' => 2, 'userName' => 'Superman', 'userAddress' => 'Metropolis'],
];

echo gettype($values);
$template->cloneRowAndSetValues('userId', $values);

$template->saveAs('new.docx');

?>
<a href="Template.docx">скачать</a>
