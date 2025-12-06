<template>
  <div class="cv-page">
    <!-- Header -->
    <header class="cv-header">
      <!-- Subtle grid background -->
      <div class="cv-header__grid-bg">
        <div class="cv-header__grid"></div>
      </div>

      <div class="cv-header__container">
        <div class="cv-header__content">
          <!-- Typing effect style title -->
          <div class="cv-header__prompt">
            <span class="cv-header__prompt-symbol">$</span>
            <span class="cv-header__prompt-text">whoami</span>
          </div>

          <h1 class="cv-header__title">
            {{ person.name }}
          </h1>

          <div class="cv-header__headline">
            <span class="cv-header__headline-icon">›</span>
            <p class="cv-header__headline-text">
              {{ person.headline }}
            </p>
          </div>

          <p class="cv-header__summary">
            {{ person.summary }}
          </p>

          <!-- Contact Info -->
          <div class="cv-header__contacts">
            <a :href="`mailto:${person.email}`" class="contact-link">
              <svg
                class="contact-link__icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              {{ person.email }}
            </a>
            <div class="contact-link">
              <svg
                class="contact-link__icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                />
              </svg>
              {{ person.phone }}
            </div>
            <div class="contact-link">
              <svg
                class="contact-link__icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                />
              </svg>
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
              <svg
                class="social-btn__icon"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                />
              </svg>
              <span>GitHub</span>
            </a>
            <a
              v-if="person.linkedin_url"
              :href="person.linkedin_url"
              target="_blank"
              class="social-btn social-btn--linkedin"
            >
              <svg
                class="social-btn__icon"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                />
              </svg>
              <span>LinkedIn</span>
            </a>
            <a
              v-if="person.pdf_url"
              :href="person.pdf_url"
              target="_blank"
              class="social-btn social-btn--download"
            >
              <svg
                class="social-btn__icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
              </svg>
              <span>Download CV</span>
            </a>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="cv-main">
      <div class="cv-main__grid">
        <!-- Timeline Column (Zigzag) -->
        <div class="cv-main__timeline">
          <section>
            <!-- Section Header -->
            <div class="cv-timeline__header">
              <div class="cv-timeline__icon-wrapper">
                <svg
                  class="cv-timeline__icon"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                  />
                </svg>
                <span class="cv-timeline__prompt">$</span>
              </div>
              <h2 class="cv-timeline__title">Timeline</h2>
              <div class="cv-timeline__divider"></div>
            </div>

            <!-- Timeline Container with center line -->
            <div class="cv-timeline__container">
              <!-- Center vertical line (desktop only) -->
              <div class="cv-timeline__line"></div>

              <!-- Mobile vertical line -->
              <div class="cv-timeline__line--mobile"></div>

              <!-- Timeline Items (merged and sorted) -->
              <div>
                <TimelineItem
                  v-for="(item, index) in sortedTimeline"
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
        </div>

        <!-- Sidebar: Skills (Sticky) -->
        <aside class="cv-main__sidebar">
          <div class="cv-sidebar">
            <!-- Skills Section -->
            <section v-if="person.skills?.length" class="cv-skills">
              <div class="cv-skills__header">
                <span class="cv-skills__icon">⚡</span>
                <h2 class="cv-skills__title">Skills</h2>
              </div>

              <!-- Skills grouped by category -->
              <div class="cv-skills__categories">
                <div v-for="category in skillCategories" :key="category">
                  <h3 class="cv-skills__category-title">
                    <span class="cv-skills__category-icon">›</span>
                    {{ category }}
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

            <!-- Stats Card -->
            <div class="cv-stats">
              <h3 class="cv-stats__header">
                <svg
                  class="cv-stats__icon"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                  />
                </svg>
                Summary
              </h3>
              <div class="cv-stats__list">
                <div class="cv-stats__item">
                  <span class="cv-stats__label">Experience</span>
                  <span class="cv-stats__value">{{
                    person.experiences?.length || 0
                  }}</span>
                </div>
                <div class="cv-stats__item">
                  <span class="cv-stats__label">Skills</span>
                  <span class="cv-stats__value">{{
                    person.skills?.length || 0
                  }}</span>
                </div>
                <div class="cv-stats__item">
                  <span class="cv-stats__label">Education</span>
                  <span class="cv-stats__value">{{
                    person.education?.length || 0
                  }}</span>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>

    <!-- Footer -->
    <footer class="cv-footer">
      <div class="cv-footer__container">
        <div class="cv-footer__content">
          <div class="cv-footer__left">
            <p class="cv-footer__built">
              <span class="cv-footer__prompt">$</span>
              <span>Built with</span>
              <span class="cv-footer__heart">❤️</span>
            </p>
            <p class="cv-footer__stack">
              <span class="cv-footer__tech cv-footer__tech--laravel"
                >Laravel</span
              >
              <span class="cv-footer__separator">+</span>
              <span class="cv-footer__tech cv-footer__tech--inertia"
                >Inertia.js</span
              >
              <span class="cv-footer__separator">+</span>
              <span class="cv-footer__tech cv-footer__tech--vue">Vue 3</span>
            </p>
          </div>
          <p class="cv-footer__copyright">
            © {{ new Date().getFullYear() }} {{ person.name }}
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { computed } from "vue";
import TimelineItem from "@/Components/TimelineItem.vue";
import SkillBadge from "@/Components/SkillBadge.vue";

const props = defineProps({
  person: Object,
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

// Get unique skill categories
const skillCategories = computed(() => {
  if (!props.person?.skills) return [];
  return [...new Set(props.person.skills.map((s) => s.category))];
});

// Get skills by category
const getSkillsByCategory = (category) => {
  return props.person.skills.filter((s) => s.category === category);
};

// Format date helper
const formatDate = (date) => {
  return new Date(date).toLocaleDateString("es-ES", {
    year: "numeric",
    month: "short",
  });
};
</script>