<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'category_id' => ['required', 'exists:categories,id'],
            // 💡 อัปเดต: ตรวจสอบไม่ให้ซ้ำกับโพสต์อื่น ยกเว้นโพสต์ตัวเอง
            'title'       => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($this->post)],
            'description' => ['required', 'string', 'max:255'],
            'content'     => ['required', 'string'],

            // 💡 อัปเดต: อย่าลืมรับค่า tag_ids
            'tag_ids'     => ['nullable', 'array'],
            'tag_ids.*'   => ['integer', 'exists:tags,id'],
        ];
    }
}
