export const translations = {
    // Header
    downloadCV: {
        en: "Download CV",
        es: "Descargar CV",
    },

    // Timeline
    timeline: {
        en: "Timeline",
        es: "Línea de Tiempo",
    },
    experience: {
        en: "Experience",
        es: "Experiencia",
    },
    education: {
        en: "Education",
        es: "Educación",
    },
    present: {
        en: "Present",
        es: "Presente",
    },

    // Sidebar
    summary: {
        en: "Summary",
        es: "Resumen",
    },
    skills: {
        en: "Skills",
        es: "Habilidades",
    },

    // Technologies
    technologies: {
        en: "Tech & Tools",
        es: "Tecnologías y herramientas",
    },
    advancedMastery: {
        en: "Advanced Mastery",
        es: "Dominio Avanzado",
    },
    wantToWorkWith: {
        en: "Want to work with",
        es: "Quiero trabajar con",
    },
    preferNotToWorkWith: {
        en: "Prefer not to work with",
        es: "Prefiero no trabajar con",
    },

    // Categories
    languages: {
        en: "Languages",
        es: "Lenguajes",
    },
    backend: {
        en: "Backend",
        es: "Backend",
    },
    frontend: {
        en: "Frontend",
        es: "Frontend",
    },
    databases: {
        en: "Databases",
        es: "Bases de Datos",
    },
    cloud: {
        en: "Cloud",
        es: "Nube",
    },
    devops: {
        en: "DevOps",
        es: "DevOps",
    },
    tools: {
        en: "Tools",
        es: "Herramientas",
    },

    // Footer
    builtWith: {
        en: "Built with",
        es: "Desarrollado con",
    },
    and: {
        en: "and",
        es: "y",
    },
};

// Helper para obtener traducción por key
export function t(key, locale = "es") {
    const keys = key.split(".");
    let value = translations;

    for (const k of keys) {
        value = value[k];
        if (!value) return key;
    }

    return value[locale] || value["en"] || key;
}
