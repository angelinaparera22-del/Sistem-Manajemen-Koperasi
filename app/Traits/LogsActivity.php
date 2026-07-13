<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            self::logAction($model, 'Created');
        });

        static::updated(function ($model) {
            self::logAction($model, 'Updated');
        });

        static::deleted(function ($model) {
            self::logAction($model, 'Deleted');
        });
    }

    protected static function logAction($model, $action)
    {
        $userId = Auth::check() ? Auth::id() : null;
        $ip = request()->ip();

        ActivityLog::create([
            'user_id' => $userId,
            'action' => $action . ' ' . class_basename($model),
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'details' => json_encode($model->getDirty()),
            'ip_address' => $ip,
        ]);
    }
}
