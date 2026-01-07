<template>
  <section>
    <div class="cv-timeline__header">
      <div class="cv-timeline__icon-wrapper">
        <ClipboardDocumentListIcon class="cv-timeline__icon" />
        <span class="cv-timeline__prompt">$</span>
      </div>
      <h2 class="cv-timeline__title">Timeline</h2>
      <div class="cv-timeline__divider"></div>
    </div>

    <div class="cv-timeline__container">
      <div class="cv-timeline__line"></div>
      <div class="cv-timeline__line--mobile"></div>
      <div>
        <TimelineItem
          v-for="(item, index) in items"
          :key="`${item.type}-${item.id}`"
          :title="item.title"
          :subtitle="item.subtitle"
          :start-date="item.startDate"
          :end-date="item.endDate"
          :description="item.description"
          :tags="item.tags"
          :type="item.type"
          :position="index % 2 === 0 ? 'left' : 'right'"
        />
      </div>
    </div>
  </section>
</template>

<script setup>
import { ClipboardDocumentListIcon } from "@heroicons/vue/24/outline";
import TimelineItem from "@/Components/TimelineItem.vue";

defineProps({
  items: {
    type: Array,
    required: true,
  },
});
</script>