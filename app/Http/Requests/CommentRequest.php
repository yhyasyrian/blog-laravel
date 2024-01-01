<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => ['required','string','max:4024']
        ];
    }
    public function createComment(Post $post)
    {
        $post->comments()->create([
            'body' => $this->get('comment'),
            'user_id' => auth()->user()->id
        ]);
    }
}
