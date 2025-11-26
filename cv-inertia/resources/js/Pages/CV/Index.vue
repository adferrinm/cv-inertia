<template>
  <div
    class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800"
  >
    <!-- Header -->
    <header class="py-20 px-6 text-center">
      <h1
        class="text-5xl md:text-7xl font-bold text-slate-900 dark:text-white mb-4"
      >
        {{ person.name }}
      </h1>
      <p class="text-2xl md:text-3xl text-slate-600 dark:text-slate-400 mb-6">
        {{ person.headline }}
      </p>
      <p
        class="text-lg text-slate-500 dark:text-slate-300 max-w-2xl mx-auto mb-8"
      >
        {{ person.summary }}
      </p>

      <!-- Contact Info -->
      <div
        class="flex flex-col md:flex-row gap-4 justify-center items-center mb-8"
      >
        <span class="text-slate-600 dark:text-slate-400"
          >📧 {{ person.email }}</span
        >
        <span class="text-slate-600 dark:text-slate-400"
          >📱 {{ person.phone }}</span
        >
        <span class="text-slate-600 dark:text-slate-400"
          >📍 {{ person.location }}</span
        >
      </div>

      <!-- Links -->
      <div class="flex gap-4 justify-center">
        <a
          v-if="person.github_url"
          :href="person.github_url"
          target="_blank"
          class="px-6 py-3 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-lg hover:opacity-80 transition"
        >
          GitHub
        </a>
        <a
          v-if="person.linkedin_url"
          :href="person.linkedin_url"
          target="_blank"
          class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
        >
          LinkedIn
        </a>
        <a
          v-if="person.pdf_url"
          :href="person.pdf_url"
          target="_blank"
          class="px-6 py-3 border-2 border-slate-900 dark:border-white text-slate-900 dark:text-white rounded-lg hover:bg-slate-900 hover:text-white dark:hover:bg-white dark:hover:text-slate-900 transition"
        >
          Ver CV Completo
        </a>
      </div>
    </header>

    <!-- Experiences -->
    <section class="py-12 px-6 bg-white dark:bg-slate-800">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-8">
          Experiencia Profesional
        </h2>

        <div
          v-for="exp in person.experiences"
          :key="exp.id"
          class="mb-8 p-6 bg-slate-50 dark:bg-slate-700 rounded-xl shadow-md"
        >
          <div
            class="flex flex-col md:flex-row md:justify-between md:items-start mb-2"
          >
            <div>
              <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                {{ exp.position }}
              </h3>
              <p class="text-blue-600 dark:text-blue-400 font-semibold">
                {{ exp.company }}
              </p>
            </div>
            <span
              class="mt-2 md:mt-0 px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm whitespace-nowrap"
            >
              {{ formatDate(exp.start_date) }} -
              {{ exp.end_date ? formatDate(exp.end_date) : "Presente" }}
            </span>
          </div>

          <p class="text-slate-600 dark:text-slate-300 mb-4">
            {{ exp.description }}
          </p>

          <!-- Skills -->
          <div
            v-if="exp.skills && exp.skills.length"
            class="flex flex-wrap gap-2"
          >
            <span
              v-for="skill in exp.skills"
              :key="skill.id"
              class="px-3 py-1 bg-slate-200 dark:bg-slate-600 text-slate-700 dark:text-slate-200 rounded-full text-sm font-medium"
            >
              {{ skill.name }}
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- Education -->
    <section class="py-12 px-6">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-8">
          Educación
        </h2>

        <div
          v-for="edu in person.education"
          :key="edu.id"
          class="p-6 bg-white dark:bg-slate-700 rounded-xl shadow-md mb-4"
        >
          <h3 class="text-xl font-bold text-slate-900 dark:text-white">
            {{ edu.degree }}
          </h3>
          <p class="text-blue-600 dark:text-blue-400 font-semibold">
            {{ edu.institution }} • {{ edu.field }}
          </p>
          <p class="text-slate-600 dark:text-slate-300">
            {{ edu.start_year }} - {{ edu.end_year }}
          </p>
          <p
            v-if="edu.description"
            class="text-slate-500 dark:text-slate-400 mt-2"
          >
            {{ edu.description }}
          </p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer
      class="py-8 px-6 bg-slate-900 dark:bg-slate-950 text-white text-center"
    >
      <p class="text-sm">
        Hecho con ❤️ por {{ person.name }} usando Laravel + Inertia.js + Vue 3
      </p>
      <p class="text-xs text-slate-400 mt-2">
        © {{ new Date().getFullYear() }}. Todos los derechos reservados.
      </p>
    </footer>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  person: Object,
});

const formatDate = (date) => {
  return new Date(date).toLocaleDateString("es-ES", {
    year: "numeric",
    month: "short",
  });
};
</script>