<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255', 'unique:posts,title'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'tag_ids'     => ['nullable', 'array'], // อนุญาตให้เป็นค่าว่างได้ (ถ้าไม่เลือก Tag เลย) และต้องเป็น Array
            'tag_ids.*'   => ['integer', 'exists:tags,id'], // ตัวเลขข้างใน Array ต้องมีอยู่จริงในตาราง tags
        ];
    }
}
