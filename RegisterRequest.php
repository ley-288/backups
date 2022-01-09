<?php

namespace App\Http\Requests\Frontend\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends FormRequest
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
            'g-recaptcha-response' => ['required_if:captcha_status,true', 'captcha'],
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'username' => ['string', 'max:191', Rule::unique('users')],
            'email' => ['required', 'string', 'email', 'max:191', Rule::unique('users')],
            'password' => ['required',
                           'string',
                           'min:6',
                           'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                           'confirmed'],
            'register_as' => ['required',Rule::in(['brand','influencer'])]
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ];
    }
}
