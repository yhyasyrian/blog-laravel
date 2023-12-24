<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoriesRequest extends FormRequest
{
    /**
     * @var array|string[] $data i use these names for insert into database
     */
    protected array $data = ['title','description'];
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
            'slug' => ['required','string','max:1024','unique:categories,slug'],
            'title' => ['required','string','max:1024'],
            'description' => ['required','string'],
            'img' => ['required','image','mimes:jpg,jpeg,png,webp'],
        ];
    }
    public function createCategory():void
    {
        $img = $this->file('img');
        $fileName = uniqid('categories-').'-'.$img->getClientOriginalName();
        // $img->storeAs('public/images',$fileName); # I will search about this way
        $img->move(public_path('images'),$fileName);
        $data = $this->only($this->data);
        $data['img'] = $fileName;
        $data['slug'] = Str::slug($this->get('slug'));
        Category::create($data);
    }
}
