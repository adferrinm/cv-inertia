<template>
  <div class="cv-page">
    <Header :person="person" />
    <div class="cv-main">
      <div class="cv-main__grid">
        <div class="cv-main__content">
          <Timeline :items="sortedTimeline" />
          <Technologies :technologies="person.skills" />
        </div>
        <Sidebar :skills="person.skills" :stats="stats" />
      </div>
    </div>

    <Footer :name="person.name" />
  </div>
</template>

<script setup>
import { computed } from "vue";
import Header from "@/Components/Header.vue";
import Timeline from "@/Components/Timeline.vue";
import Sidebar from "@/Components/Sidebar.vue";
import Technologies from "@/Components/Technologies.vue";
import Footer from "@/Components/Footer.vue";
import { useLocale } from "@/Composables/useLocale";

const { trans, locale } = useLocale();

const props = defineProps({
  person: {
    type: Object,
    required: true,
  },
});

const sortedTimeline = computed(() => {
  const items = [];

  if (props.person?.experiences) {
    props.person.experiences.forEach((exp) => {
      items.push({
        id: exp.id,
        type: "experience",
        title: trans(exp.position),
        subtitle: exp.company,
        startDate: formatDate(exp.start_date),
        endDate: exp.end_date ? formatDate(exp.end_date) : null,
        description: trans(exp.description),
        tags: exp.skills?.map((s) => s.name) || [],
        sortDate: new Date(exp.start_date),
      });
    });
  }

  if (props.person?.education) {
    props.person.education.forEach((edu) => {
      items.push({
        id: edu.id,
        type: "education",
        title: trans(edu.degree),
        subtitle: `${edu.institution} • ${trans(edu.field)}`,
        startDate: formatDate(edu.start_date),
        endDate: formatDate(edu.end_date),
        description: trans(edu.description),
        tags: [],
        sortDate: new Date(edu.start_date),
      });
    });
  }

  return items.sort((a, b) => b.sortDate - a.sortDate);
});

const stats = computed(() => ({
  experiences: props.person?.experiences?.length || 0,
  skills: props.person?.skills?.length || 0,
  education: props.person?.education?.length || 0,
}));

const formatDate = (date) => {
  return new Date(date).toLocaleDateString(
    locale.value === "en" ? "en-US" : "es-ES",
    {
      year: "numeric",
      month: "short",
    }
  );
};
</script>