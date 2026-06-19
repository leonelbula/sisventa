<?php

namespace App\Support;


class Flash
{
    public static function created(string $module): string
    {
        return "{$module} creada correctamente.";
    }

    public static function updated(string $module): string
    {
        return "{$module} actualizada correctamente.";
    }

    public static function deleted(string $module): string
    {
        return "{$module} eliminada correctamente.";
    }

    public static function error(): string
    {
        return 'Ha ocurrido un error inesperado.';
    }
    public static function unauthorized(): string
    {
        return 'No tienes permiso para realizar esta acción.';
    }
}