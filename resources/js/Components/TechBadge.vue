<template>
  <div class="tech-badge" :class="variantClass">
    <img
      v-if="icon && !imageError"
      :src="iconUrl"
      @error="handleImageError"
      :alt="name"
      class="tech-badge__icon"
      loading="lazy"
    />

    <span v-else class="tech-badge__placeholder">
      {{ name }}
    </span>

    <span class="tech-badge__name">{{ name }}</span>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
  icon: {
    type: String,
    default: null,
  },
  level: {
    type: Number,
    default: null,
  },
  variant: {
    type: String,
    default: "default",
    validator: (value) => ["default", "avoid"].includes(value),
  },
});

const imageError = ref(false);

const iconColor = computed(() => {
  switch (props.variant) {
    case "avoid":
      return "ef4444";
    default:
      return "10b981";
  }
});

const iconUrl = computed(
  () => `https://cdn.simpleicons.org/${props.icon}/${iconColor.value}`
);

const variantClass = computed(() => {
  return `tech-badge--${props.variant}`;
});

const handleImageError = () => {
  imageError.value = true;
  if (import.meta.env.DEV) {
    console.warn(
      `Icon not found in Simple Icons: ${props.icon} for ${props.name}`
    );
  }
};
</script>