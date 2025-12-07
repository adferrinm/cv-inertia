<template>
  <div class="cv-page">
    <!-- Header -->
    <Header :person="person" />

    <!-- Main Content -->
    <div class="cv-main">
      <div class="cv-main__grid">
        <!-- Timeline Column -->
        <div class="cv-main__timeline">
          <Timeline :items="sortedTimeline" />
        </div>

        <!-- Sidebar Column -->
        <Sidebar :skills="person.skills" :stats="stats" />
      </div>
    </div>

    <!-- Footer -->
    <Footer :name="person.name" />
  </div>
</template>

<script setup>
import { computed } from "vue";
import Header from "@/Components/Header.vue";
import Timeline from "@/Components/Timeline.vue";
import Sidebar from "@/Components/Sidebar.vue";
import Footer from "@/Components/Footer.vue";

const props = defineProps({
  person: {
    type: Object,
    required: true,
  },
});

// Merge experiences and education into a single timeline, sorted by date
const sortedTimeline = computed(() => {
  const items = [];

  // Add experiences
  if (props.person?.experiences) {
    props.person.experiences.forEach((exp) => {
      items.push({
        id: exp.id,
        type: "experience",
        title: exp.position,
        subtitle: exp.company,
        startDate: formatDate(exp.start_date),
        endDate: exp.end_date ? formatDate(exp.end_date) : null,
        description: exp.description,
        tags: exp.skills?.map((s) => s.name) || [],
        sortDate: new Date(exp.start_date),
      });
    });
  }

  // Add education
  if (props.person?.education) {
    props.person.education.forEach((edu) => {
      items.push({
        id: edu.id,
        type: "education",
        title: edu.degree,
        subtitle: `${edu.institution} • ${edu.field}`,
        startDate: String(edu.start_year),
        endDate: String(edu.end_year),
        description: edu.description,
        tags: [],
        sortDate: new Date(edu.start_year, 0, 1),
      });
    });
  }

  // Sort by date (newest first)
  return items.sort((a, b) => b.sortDate - a.sortDate);
});

// Stats
const stats = computed(() => ({
  experiences: props.person?.experiences?.length || 0,
  skills: props.person?.skills?.length || 0,
  education: props.person?.education?.length || 0,
}));

// Format date helper
const formatDate = (date) => {
  return new Date(date).toLocaleDateString("es-ES", {
    year: "numeric",
    month: "short",
  });
};
</script>