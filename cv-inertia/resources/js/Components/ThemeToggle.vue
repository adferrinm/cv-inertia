<template>
  <div class="theme-selector">
    <button
      @click="setTheme('dark')"
      class="theme-selector__button"
      :class="{ 'theme-selector__button--active': theme === 'dark' }"
    >
      <MoonIcon />
      <span class="theme-selector__text">Dark</span>
    </button>

    <button
      @click="setTheme('light')"
      class="theme-selector__button"
      :class="{ 'theme-selector__button--active': theme === 'light' }"
    >
      <SunIcon />
      <span class="theme-selector__text">Light</span>
    </button>
  </div>
</template>

<script setup>
import SunIcon from "@/Components/Icons/SunIcon.vue";
import MoonIcon from "@/Components/Icons/MoonIcon.vue";
import { useTheme } from "@/Composables/useTheme";

const { theme, setTheme } = useTheme();
</script>