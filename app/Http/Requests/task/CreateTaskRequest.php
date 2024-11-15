<?php

namespace App\Http\Requests\task;

use App\Enum\Task\TaskEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateTaskRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'titulo' => ['required'],
      'descripcion' => ['required'],
      'fecha_vencimiento' => ['required'],
      'estado' => ['required', new Enum(TaskEnum::class)],
      'user_id' => ['required']
    ];
  }
}
