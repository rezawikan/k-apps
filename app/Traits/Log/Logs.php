<?php

namespace App\Traits\Log;

trait Logs
{
    public static function createLog($page, $name, $email)
    {
        return $logs = (['page' => $page,
                  'type' => 'create',
                  'old_value' => null,
                  'new_value' => $name,
                  'delete_value' => null,
                  'email' => $email
                ]);
    }

    public static function updateLog($page, $old, $new, $email)
    {
        return $logs = (['page' => $page,
                  'type' => 'update',
                  'old_value' => $old,
                  'new_value' => $new,
                  'delete_value' => null,
                  'email' => $email
                ]);
    }

    public static function deleteLog($page, $delete, $email)
    {
        return $logs = (['page' => $page,
                  'type' => 'delete',
                  'old_value' => null,
                  'new_value' => null,
                  'delete_value' => $delete,
                  'email' => $email
                ]);
    }
}
