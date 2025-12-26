<template>
  <div class="timeline-item" :class="`timeline-item--${position}`">
    <div class="timeline-dot" :class="`timeline-dot--${position}`"></div>
    <div class="timeline-card">
      <div class="timeline-arrow" :class="`timeline-arrow--${position}`"></div>
      <div class="timeline-header">
        <div class="timeline-info">
          <div class="flex-1">
            <h3 class="timeline-title">{{ title }}</h3>
            <p class="timeline-subtitle">
              <span class="timeline-subtitle__prompt">$</span>
              {{ subtitle }}
            </p>
          </div>
          <div class="timeline-date">
            {{ dateRange }}
          </div>
        </div>
        <div class="timeline-badge">
          <span v-if="type === 'experience'" class="timeline-badge__icon--exp"
            >💼</span
          >
          <span v-else class="timeline-badge__icon--edu">🎓</span>
          {{
            type === "experience"
              ? trans({ en: "Experience", es: "Experiencia" })
              : trans({ en: "Education", es: "Educación" })
          }}
        </div>
      </div>
      <p v-if="description" class="timeline-description">
        {{ description }}
      </p>
      <div v-if="tags && tags.length" class="timeline-tags">
        <span v-for="tag in tags" :key="tag" class="timeline-tag">
          <span class="timeline-tag__icon">›</span>
          {{ tag }}
        </span>
      </div>
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";
import { useLocale } from "@/Composables/useLocale";

const { trans } = useLocale();

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  subtitle: {
    type: String,
    required: true,
  },
  startDate: {
    type: String,
    required: true,
  },
  endDate: {
    type: String,
    default: null,
  },
  description: {
    type: String,
    default: null,
  },
  tags: {
    type: Array,
    default: () => [],
  },
  position: {
    type: String,
    default: "left",
    validator: (value) => ["left", "right"].includes(value),
  },
  type: {
    type: String,
    default: "experience",
    validator: (value) => ["experience", "education"].includes(value),
  },
});

const dateRange = computed(() => {
  const end = props.endDate || trans({ en: "Present", es: "Presente" });
  return `${props.startDate} - ${end}`;
});
</script>