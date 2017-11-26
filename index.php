<?php
require_once ('functions.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени

// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = date ("d.m.Y", $task_deadline_ts);

// в эту переменную запишите кол-во дней до даты задачи
$days_until_deadline = ($task_deadline_ts - $current_ts) / 86400;

$projects = ["Все", "Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];
$tasks = [
    [
        'title' => 'Собеседование в IT компании',
        'deadline' => '01.06.2018',
        'category' => 'Работа',
        'status' => 'false',
    ],
    [
        'title' => 'Выполнить тестовове задание',
        'deadline' => '25.05.2018',
        'category' => 'Работа',
        'status' => 'false',
    ],
    [
        'title' => 'Сделать задание первого раздела',
        'deadline' => '21.04.2018',
        'category' => 'Учеба',
        'status' => 'true',
    ],
    [
        'title' => 'Встреча с другом',
        'deadline' => '22.04.2018',
        'category' => 'Входящие',
        'status' => 'false',
    ],
    [
        'title' => 'Купить корм для кота',
        'deadline' => '',
        'category' => 'Домашние дела',
        'status' => 'false',
    ],
    [
        'title' => 'Заказать пиццу',
        'deadline' => '',
        'category' => 'Домашние дела',
        'status' => 'false',
    ]
];

$page_content = includeTemplate('templates/index.php');
$layout_content = includeTemplate('templates/layout.php',
[
    'title' => 'Дела в порядке',
    'projects' => '$projects',
    'tasks' => '$tasks',
    'content' => '$page_content'
]
);

print $layout_content;
?>
