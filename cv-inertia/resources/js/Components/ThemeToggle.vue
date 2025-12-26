<template>
  <div class="theme-selector">
    <!-- <SunIcon class="theme-selector__icon" /> -->
    <button
      @click="setTheme('dark')"
      class="theme-selector__button"
      :class="{ 'theme-selector__button--active': theme === 'dark' }"
    >
      <MoonIcon class="theme-selector__button-icon" />
      <span class="theme-selector__text">Dark</span>
    </button>

    <button
      @click="setTheme('light')"
      class="theme-selector__button"
      :class="{ 'theme-selector__button--active': theme === 'light' }"
    >
      <SunIcon class="theme-selector__button-icon" />
      <span class="theme-selector__text">Light</span>
    </button>
  </div>
</template>

<script setup>
import { SunIcon, MoonIcon } from "@heroicons/vue/24/outline";
import { useTheme } from "@/Composables/useTheme";

const { theme, setTheme } = useTheme();
</script>