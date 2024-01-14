<?php

namespace App\Http\Requests;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AddWriterRequest extends FormRequest
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
            'email' => ["exists:users,email",\Illuminate\Validation\Rule::notIn([config('app.email_admin')])]
        ];
    }
    public function upRule():void
    {
        User::where('email','=',$this->get('email'))
            ->update([
                'rule_id' => Rule::where('name','=','writer')->firstOrFail()->id
            ]);
    }
}
