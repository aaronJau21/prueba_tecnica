<?php

namespace App\Enum\Task;

enum TaskEnum: string
{
  case PENDIENTE = 'pendiente';
  case PROGRESO = 'progreso';
  case COMPLETADO = 'completado';
}
