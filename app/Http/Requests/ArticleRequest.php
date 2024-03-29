<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->article;
        return [
            'title' => 'required|unique:articles,title|max:255',
            'content' => 'required|unique:articles,content|min:50',
            'author' => 'required',
            'article_images' => 'required|mimes:jpeg,jpg,png|max:2048'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Title is required, At least fill a character',
            'title.unique'   => 'Title must unique, Take another title',
            'content.required' => 'Konten harus diisi',
            'article_images.required' => 'Gambar harus diiisi',
        ];
    }
}
