<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePostRequest extends FormRequest
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
            'slug' => ['required','string','max:1024'],
            'title' => ['required','string','max:1024'],
            'description' => ['required','string'],
            'img' => ['required','image','mimes:jpg,jpeg,png,webp'],
            'body' => ['required']
        ];
    }
    public function update(int $id):void
    {
        $img = $this->file('img');
        $fileName = uniqid('posts-').'-'.$img->getClientOriginalName();
        // $img->storeAs('public/images',$fileName); # I will search about this way
        $img->move(public_path('images'),$fileName);
        $post = Post::where('id','=',$id)->firstOrFail();
        $post->seo()->update([
            'slug' => Str::slug($this->get('slug')),
            'description' => $this->get('description'),
            'image' => 'images/'.$fileName
        ]);
        $post->update([...$this->only(['category_id','title','body']),'user_id'=>auth()->user()->id]);
    }
}
