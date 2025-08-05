<?php 

namespace App\Services;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class PostValidationServices
{
    public function validate(array $data)
    {
         $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'is_published' => 'boolean',
         ];
         $validated = Validator::make($data, $rules);

        if ($validated->fails()) {
            throw new ValidationException($validated);
        }

         return $validated->validated();
    }
}