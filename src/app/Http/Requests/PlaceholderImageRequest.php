<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceholderImageRequest extends FormRequest
{
    /**
     * List of supported modifiers that don't require values.
     *
     * @var array<string>
     */
    private const array BOOLEAN_IMAGE_MODIFIERS = [
        'greyscale',
        'sepia',
        'spooky',
    ];

    protected function prepareForValidation(): void
    {
        // Merge dimensions
        $this->merge($this->route()?->parameters() ?? []);

        // Convert boolean modifier presence to true
        foreach (self::BOOLEAN_IMAGE_MODIFIERS as $modifier) {
            $this->merge([$modifier => $this->has($modifier)]);
        }

        // Add default blur value in case no value has been specified
        if ($this->has('blur') && $this->input('blur') === null) {
            $this->merge(['blur' => 15]);
        }

        if (! $this->has('height')) {
            $this->merge(['height' => $this->input('width')]);
        }
    }

    /** @return array<string, array<string>> */
    public function rules(): array
    {
        return [
            // Dimensions
            'width' => ['required', 'integer', 'between:1,5000'],
            'height' => ['required', 'integer', 'between:1,5000'],

            // Boolean modifiers
            'greyscale' => ['required', 'boolean'],
            'sepia' => ['required', 'boolean'],
            'spooky' => ['required', 'boolean'],

            // Blur modifier
            'blur' => ['sometimes', 'integer', 'between:0,100'],

            // Random parameter
            'random' => ['sometimes', 'nullable'],
        ];
    }

    public function shouldBypassCache(): bool
    {
        return $this->has('random');
    }

    /** @return array<'greyscale'|'sepia'|'spooky'|'blur', bool|int> */
    public function modifiers(): array
    {
        $modifiers = [];

        // Add boolean modifiers
        foreach (self::BOOLEAN_IMAGE_MODIFIERS as $modifier) {
            if ($this->validated($modifier)) {
                $modifiers[$modifier] = true;
            }
        }

        // Add blur if present
        if ($this->has('blur')) {
            $modifiers['blur'] = intval($this->validated('blur'));
        }

        return $modifiers;
    }
}
