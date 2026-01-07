<template>
  <footer class="cv-footer">
    <div class="cv-footer__container">
      <div class="cv-footer__content">
        <div class="cv-footer__left">
          <p class="cv-footer__built">
            <span class="cv-footer__prompt">$</span>
            <span>{{ t("builtWith") }}</span>
            <span class="cv-footer__heart">❤️</span>
          </p>
          <p class="cv-footer__stack">
            <span class="cv-footer__tech cv-footer__tech--laravel"
              >Laravel</span
            >
            <span class="cv-footer__separator">+</span>
            <span class="cv-footer__tech cv-footer__tech--inertia"
              >Inertia.js</span
            >
            <span class="cv-footer__separator">+</span>
            <span class="cv-footer__tech cv-footer__tech--vue">Vue 3</span>
          </p>
        </div>
        <p class="cv-footer__copyright">© {{ currentYear }} {{ name }}</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { computed } from "vue";
import { useLocale } from "@/Composables/useLocale";

const { t } = useLocale();

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
});

const currentYear = computed(() => new Date().getFullYear());
</script>