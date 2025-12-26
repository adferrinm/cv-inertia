<template>
  <aside class="cv-main__sidebar">
    <div class="cv-sidebar">
      <!-- <div class="cv-stats">
        <h3 class="cv-stats__header">
          <ClipboardDocumentCheckIcon class="cv-stats__icon" />
          {{ t("summary") }}
        </h3>
        <div class="cv-stats__list">
          <div class="cv-stats__item">
            <span class="cv-stats__label">{{ t("experience") }}</span>
            <span class="cv-stats__value">{{ stats.experiences }}</span>
          </div>
          <div class="cv-stats__item">
            <span class="cv-stats__label">{{ t("skills") }}</span>
            <span class="cv-stats__value">{{ stats.skills }}</span>
          </div>
          <div class="cv-stats__item">
            <span class="cv-stats__label">{{ t("education") }}</span>
            <span class="cv-stats__value">{{ stats.education }}</span>
          </div>
        </div>
      </div> -->

      <section v-if="skills?.length" class="cv-skills">
        <div class="cv-skills__header">
          <span class="cv-skills__icon">⚡</span>
          <h2 class="cv-skills__title">{{ t("skills") }}</h2>
        </div>

        <div class="cv-skills__categories">
          <div v-for="category in categories" :key="category">
            <h3 class="cv-skills__category-title">
              <span class="cv-skills__category-icon">›</span>
              {{ t(category.toLowerCase()) }}
            </h3>
            <div class="cv-skills__list">
              <SkillBadge
                v-for="skill in getSkillsByCategory(category)"
                :key="skill.id"
                :name="skill.name"
                :icon="skill.logo_slug"
                :level="skill.level"
                :show-level="false"
              />
            </div>
          </div>
        </div>
      </section>
    </div>
  </aside>
</template>

<script setup>
import { computed } from "vue";
import { ClipboardDocumentCheckIcon } from "@heroicons/vue/24/outline";
import SkillBadge from "@/Components/SkillBadge.vue";
import { useLocale } from "@/Composables/useLocale";

const { t } = useLocale();

const props = defineProps({
  skills: {
    type: Array,
    default: () => [],
  },
  stats: {
    type: Object,
    required: true,
  },
});

const filteredSkills = computed(() => {
  if (!props.skills) return [];
  return props.skills.filter((skill) => {
    const level = String(skill.level).toLowerCase();
    return level !== "avoid" && level !== "1" && level !== "2";
  });
});

const categories = computed(() => {
  if (!filteredSkills.value.length) return [];
  return [...new Set(filteredSkills.value.map((s) => s.category))];
});

const getSkillsByCategory = (category) => {
  return filteredSkills.value.filter((s) => s.category === category);
};
</script>