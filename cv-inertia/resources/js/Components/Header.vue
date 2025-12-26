<template>
  <header class="cv-header">
    <div class="cv-header__grid-bg">
      <div class="cv-header__grid"></div>
    </div>

    <!-- Language Toggle -->
    <div class="cv-header__language">
      <LanguageToggle />
    </div>

    <div class="cv-header__container">
      <div class="cv-header__content">
        <!-- Prompt -->
        <div class="cv-header__prompt">
          <span class="cv-header__prompt-symbol">$</span>
          <span class="cv-header__prompt-text">whoami</span>
        </div>

        <!-- Title -->
        <h1 class="cv-header__title">
          {{ person.name }}
        </h1>

        <!-- Headline -->
        <div class="cv-header__headline">
          <span class="cv-header__headline-icon">›</span>
          <p class="cv-header__headline-text">
            {{ trans(person.headline) }}
          </p>
        </div>

        <!-- Summary -->
        <p class="cv-header__summary">
          {{ trans(person.summary) }}
        </p>

        <!-- Contact Info -->
        <div class="cv-header__contacts">
          <a :href="`mailto:${person.email}`" class="contact-link">
            <EnvelopeIcon class="contact-link__icon" />
            {{ person.email }}
          </a>
          <div class="contact-link">
            <PhoneIcon class="contact-link__icon" />
            {{ person.phone }}
          </div>
          <div class="contact-link">
            <MapPinIcon class="contact-link__icon" />
            {{ person.location }}
          </div>
        </div>

        <!-- Social Links -->
        <div class="cv-header__socials">
          <a
            v-if="person.github_url"
            :href="person.github_url"
            target="_blank"
            class="social-btn social-btn--github"
          >
            <GithubIcon class="social-btn__icon" />
            <span>GitHub</span>
          </a>
          <a
            v-if="person.linkedin_url"
            :href="person.linkedin_url"
            target="_blank"
            class="social-btn social-btn--linkedin"
          >
            <LinkedinIcon class="social-btn__icon" />
            <span>LinkedIn</span>
          </a>
          <a
            v-if="person.pdf_url"
            :href="person.pdf_url"
            target="_blank"
            class="social-btn social-btn--download"
          >
            <ArrowDownTrayIcon class="social-btn__icon" />
            <span>{{ trans({ en: "Download CV", es: "Descargar CV" }) }}</span>
          </a>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import {
  EnvelopeIcon,
  PhoneIcon,
  MapPinIcon,
  ArrowDownTrayIcon,
} from "@heroicons/vue/24/outline";
import GithubIcon from "@/Components/Icons/GithubIcon.vue";
import LinkedinIcon from "@/Components/Icons/LinkedinIcon.vue";
import LanguageToggle from "@/Components/LanguageToggle.vue";
import { useLocale } from "@/Composables/useLocale";

const { trans } = useLocale();

defineProps({
  person: {
    type: Object,
    required: true,
  },
});
</script>