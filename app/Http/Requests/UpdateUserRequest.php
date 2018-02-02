<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * User must have one `ADMIN_ROLES` or the `edit-users` permission.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();

        return  $user->isAdmin() || $user->hasPermission('edit-users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . $this->user->id,
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'avatar' => 'image|nullable',
        ];
    }
}
