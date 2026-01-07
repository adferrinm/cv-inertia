<template>
  <section class="cv-technologies">
    <div class="cv-technologies__container">
      <div class="cv-technologies__header">
        <div class="cv-technologies__icon-wrapper">
          <CodeBracketIcon class="cv-technologies__icon" />
          <span class="cv-technologies__prompt">$</span>
        </div>
        <h2 class="cv-technologies__title">{{ t("technologies") }}</h2>
        <div class="cv-technologies__divider"></div>
      </div>

      <div class="cv-technologies__category">
        <h3
          class="cv-technologies__category-title cv-technologies__category-title--master"
        >
          <span class="cv-technologies__category-icon">⚡</span>
          {{ t("advancedMastery") }}
        </h3>
        <div class="cv-technologies__grid">
          <TechBadge
            v-for="tech in masterTechnologies"
            :key="tech.id"
            :name="tech.name"
            :icon="tech.logo_slug"
            :level="tech.level"
          />
        </div>
      </div>

      <div class="cv-technologies__category">
        <h3
          class="cv-technologies__category-title cv-technologies__category-title--working"
        >
          <span class="cv-technologies__category-icon">🚀</span>
          {{ t("wantToWorkWith") }}
        </h3>
        <div class="cv-technologies__grid">
          <TechBadge
            v-for="tech in workingTechnologies"
            :key="tech.id"
            :name="tech.name"
            :icon="tech.logo_slug"
            :level="tech.level"
          />
        </div>
      </div>

      <div class="cv-technologies__category">
        <h3
          class="cv-technologies__category-title cv-technologies__category-title--avoid"
        >
          <span class="cv-technologies__category-icon">⚠️</span>
          {{ t("preferNotToWorkWith") }}
        </h3>
        <div class="cv-technologies__grid">
          <TechBadge
            v-for="tech in avoidTechnologies"
            :key="tech.id"
            :name="tech.name"
            :icon="tech.logo_slug"
            :level="tech.level"
            variant="avoid"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed } from "vue";
import { CodeBracketIcon } from "@heroicons/vue/24/outline";
import TechBadge from "@/Components/TechBadge.vue";
import { useLocale } from "@/Composables/useLocale";

const { t } = useLocale();

const props = defineProps({
  technologies: {
    type: Array,
    default: () => [],
  },
});

const masterTechnologies = computed(() => {
  return props.technologies.filter(
    (tech) => tech.mastery_level === "expert" || tech.level >= 4
  );
});

const workingTechnologies = computed(() => {
  return props.technologies.filter(
    (tech) =>
      tech.mastery_level === "working" || (tech.level >= 2 && tech.level < 4)
  );
});

const avoidTechnologies = computed(() => {
  return props.technologies.filter(
    (tech) => tech.mastery_level === "avoid" || tech.level === 1
  );
});
</script>