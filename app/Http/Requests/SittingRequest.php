<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \App\Models\Sitting;

class SittingRequest extends FormRequest
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
            'title' => ['required','string','min:3','max:255'],
            'description' => ['required','string','max:4024'],
            'facebook' => ['max:255'],
            'github' => ['max:255'],
            'instagram' => ['max:255'],
            'linkedin' => ['max:255'],
            'twitter' => ['max:255'],
        ];
    }
    public function save()
    {
        $data = array_map(fn($value) => !empty($value) ? $value : "",$this->only(Sitting::data)); // I can use "except" but if anybody add input in form, the result will error
        array_map(fn($key,$value) => Sitting::where('key','=',$key)->update(['value'=>$value]),array_keys($data),array_values($data))
        ;
    }
}
