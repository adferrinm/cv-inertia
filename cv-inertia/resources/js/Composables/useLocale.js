import { ref } from 'vue';
import { translations } from '@/Translations';

const locale = ref(localStorage.getItem('locale') || 'es');

export function useLocale() {
    const setLocale = (newLocale) => {
        locale.value = newLocale;
        localStorage.setItem('locale', newLocale);
    };

    const trans = (field) => {
        if (!field) return '';
        if (typeof field === 'string') return field;
        if (typeof field === 'object') {
            return field[locale.value] || field['en'] || field['es'] || '';
        }
        return '';
    };

    // Traducción de claves estáticas
    const t = (key) => {
        const keys = key.split('.');
        let value = translations;

        for (const k of keys) {
            value = value[k];
            if (!value) return key;
        }

        return value[locale.value] || value['en'] || key;
    };

    const toggleLocale = () => {
        const newLocale = locale.value === 'en' ? 'es' : 'en';
        setLocale(newLocale);
    };

    return {
        locale,
        setLocale,
        trans,
        t,
        toggleLocale
    };
}