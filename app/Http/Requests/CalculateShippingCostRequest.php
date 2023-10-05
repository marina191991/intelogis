<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array $partners
 * @property string $sourceKladr
 * @property string $targetKladr
 * @property float $weight
 */
class CalculateShippingCostRequest extends FormRequest
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
            'partners' => ['array', 'required'],
            'partners.*' => ['string'],
            'sourceKladr' => ['string', 'required'],
            'targetKladr' => ['string', 'required'],
            'weight' => ['numeric', 'required'],
        ];
    }
}
