<?php

namespace NPDashboard\Logger;

use function Clue\StreamFilter\fun;
use NPDashboard\Logger\Nplog;

class Logger
{
    /**
     * @return string
     */
    public static function getName()
    {
        return authenticated()->username.': ';
    }

    /**
     * @return array
     */
    public static function actions()
    {
        return [
            'login' => function ($parameters) {
                return 'fez login';
            },
            'edit_days' => function ($parameters) {
                return "{$parameters['type']} {$parameters['days']} dias {$parameters['days_type']} ao usuario {$parameters['customer']} ID:({$parameters['id']} - Motivo: {$parameters['reason']})";
            },
            'store' => function ($parameters) {
                return "Criou um {$parameters['type']} - ID {$parameters['id']}.";
            },
            'edit' => function ($parameters) {
                return "Editou um {$parameters['type']} - ID {$parameters['id']}.";
            },
            'delete'=> function ($parameters) {
                return "Deletou um {$parameters['type']} - ID {$parameters['id']}.";
            },
            'sendMail' => function ($parameters) {
                return "Enviou um {$parameters['type']} - Email {$parameters['email']}.";
            },
            'updateReseller' => function ($parameters) {
                return "{$parameters['type']} o Status de Revendedor do Cliente. ID {$parameters['id']}.";
            },
            'updateOrder' => function ($parameters) {
                return "Alterou a Ordem do {$parameters['type']}, para o número {$parameters['value']}. ID {$parameters['id']}.";
            },
            'updateStatus' => function ($parameters) {
                return "Atualizou o {$parameters['value_type']} do {$parameters['type']}. ID {$parameters['id']}.";
            },
            'createQuote' => function ($parameters) {
                return "Criou uma {$parameters['value_type']} em uma {$parameters['type']}. ID {$parameters['id']}.";
            }
        ];
    }

    /**
     * @param $action
     * @param array $parameters
     */
    public static function log($action, array $parameters = [])
    {
        $actions = self::actions();
        if(key_exists($action, $actions)) {
            Nplog::create([
                'message' => self::getName().$actions[$action]($parameters)
            ]);
        }
    }
}