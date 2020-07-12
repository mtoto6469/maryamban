<?php
/* @var $panel yii\debug\panels\RequestPanel */

use yii\bootstrap\Tabs;

echo '<h3>Request</h3>';

$items = [];

$parametersContent = $this->render('table', [
    'caption' => 'Routing',
    'values' => [
        'Route' => $panel->data['route'],
        'Action' => $panel->data['action'],
        'Parameters' => $panel->data['actionParams'],
    ],
]);

if (isset($panel->data['GET'])) {
    $parametersContent .= $this->render('table', ['caption' => '$_GET', 'values' => $panel->data['GET']]);
}

if (isset($panel->data['POST'])) {
    $parametersContent .= $this->render('table', ['caption' => '$_POST', 'values' => $panel->data['POST']]);
}

if (isset($panel->data['FILES'])) {
    $parametersContent .= $this->render('table', ['caption' => '$_FILES', 'values' => $panel->data['FILES']]);
}

if (isset($panel->data['COOKIE'])) {
    $parametersContent .= $this->render('table', ['caption' => '$_COOKIE', 'values' => $panel->data['COOKIE']]);
}

$parametersContent .= $this->render('table', ['caption' => 'Request Body', 'values' => $panel->data['requestBody']]);

$items[] = [
    'label' => 'Parameters',
    'content' => $parametersContent,
    'active' => true,
];

$items[] = [
    'label' => 'Headers',
    'content' => $this->render('table', ['caption' => 'Request Headers', 'values' => $panel->data['requestHeaders']])
        . $this->render('table', ['caption' => 'Response Headers', 'values' => $panel->data['responseHeaders']]),
];

if (isset($panel->data['SESSION'], $panel->data['flashes'])) {
    $items[] = [
        'label' => 'Session',
        'content' => $this->render('table', ['caption' => '$_SESSION', 'values' => $panel->data['SESSION']])
            . $this->render('table', ['caption' => 'Flashes', 'values' => $panel->data['flashes']]),
    ];
}

if (isset($panel->data['SERVER'])) {
    $items[] = [
        'label' => '$_SERVER',
        'content' => $this->render('table', ['caption' => '$_SERVER', 'values' => $panel->data['SERVER']]),
    ];
}

echo Tabs::widget([
    'items' => $items,
]);