<?php

if (!function_exists('trans_field')) {
    /**
     * Translate a JSON field according to the current locale.
     */
    function trans_field($field, $locale = null)
    {
        $locale = $locale ?? session('locale', 'es');

        if (!is_array($field)) {
            return $field;
        }

        return $field[$locale] ?? $field['en'] ?? $field['es'] ?? '';
    }
}
