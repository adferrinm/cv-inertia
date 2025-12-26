<template>
  <div class="language-selector">
    <LanguageIcon class="language-selector__globe" />
    <button
      @click="setLocale('es')"
      class="language-selector__button"
      :class="{ 'language-selector__button--active': locale === 'es' }"
    >
      <SpainFlag />
      <span class="language-selector__text">ES</span>
    </button>

    <button
      @click="setLocale('en')"
      class="language-selector__button"
      :class="{ 'language-selector__button--active': locale === 'en' }"
    >
      <UKFlag />
      <span class="language-selector__text">EN</span>
    </button>
  </div>
</template>

<script setup>
import { LanguageIcon } from "@heroicons/vue/24/outline";
import SpainFlag from "@/Components/Icons/SpainFlag.vue";
import UKFlag from "@/Components/Icons/UKFlag.vue";
import { useLocale } from "@/Composables/useLocale";

const { locale, setLocale } = useLocale();
</script>