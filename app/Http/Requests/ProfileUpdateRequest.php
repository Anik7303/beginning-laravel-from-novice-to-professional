<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // TODO: fix this
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'file', 'mimetypes:image/*'],
        ];
    }

    /**
     * Handle data restructing for update
     * @return mixed
     */
    public function handleRequest()
    {
        $profile_data = $this->validated();
        if ($this->hasFile('profile_picture')) {
            $file = $this->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = "profile_picture_{$this->user()->id}.{$extension}";
            // $filename = \Illuminate\Support\Facades\Storage::putFileAs('uploads', $file, $filename);
            $filename = $file->storeAs('uploads', $filename);
            $profile_data['profile_picture'] = $filename;
        }
        return $profile_data;
    }
}