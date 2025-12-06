<template>
  <div class="skill-badge">
    <!-- Icon from Simple Icons -->
    <img
      v-if="icon"
      :src="`https://cdn.simpleicons.org/${icon}/${iconColor}`"
      :alt="name"
      class="skill-badge__icon"
    />

    <!-- Tech Icon Placeholder (if no icon) -->
    <span v-else class="skill-badge__placeholder">⚡</span>

    <!-- Skill Name -->
    <span class="skill-badge__name">{{ name }}</span>

    <!-- Optional Level Stars -->
    <span v-if="showLevel && level" class="skill-badge__stars">
      {{ "★".repeat(level) }}{{ "☆".repeat(5 - level) }}
    </span>

    <!-- Subtle glow on hover -->
    <span class="skill-badge__glow"></span>
  </div>
</template>

<script setup>
defineProps({
  name: {
    type: String,
    required: true,
  },
  icon: {
    type: String,
    default: null,
  },
  iconColor: {
    type: String,
    default: "10b981",
  },
  level: {
    type: Number,
    default: null,
    validator: (value) => value === null || (value >= 1 && value <= 5),
  },
  showLevel: {
    type: Boolean,
    default: false,
  },
});
</script>