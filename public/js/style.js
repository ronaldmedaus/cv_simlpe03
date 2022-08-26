/**
 * Resume/CV template created with Bootstrap 5 by @vmoratog and @jdnichollsc
 */
const resume = {
    firstName: "Alejandro",
    lastName: "Quesada",
    jobTitle: "Fullstack Developer",
    photo:
        "https://lh3.googleusercontent.com/-epyR6RX9PNc/Xx_LY7W_XEI/AAAAAAAAAVc/QW1Vrg-C86g3wGLoLszBsjLn05-b8R1gQCK8BGAsYHg/s512/2020-07-27.jpg",
    city: "Lima",
    postalCode: "15008",
    country: "Peru",
    phone: "+51 982396024",
    email: "wquesadatinco@gmail.com",
    education: [
        {
            school: "Instituto Tecnológico Tecsup",
            degree: "Bachiller",
            graduationDate: "2020",
            description: "Diseño de Software e Integración de Sistemas",
        },
    ],
    links: [
        {
            label: "GitHub",
            link: "https://github.com/tqaw19",
        },
        {
            label: "LinkedIn",
            link: "https://linkedin.com/in/alequesada/",
        },
        {
            label: "Portafolio Digital",
            link: "https://portfolio202x.vercel.app/",
        },
    ],
    skills: [
        "JavaScript",
        "TypeScript",
        "NodeJS",
        "ReactJS",
        "NextJS",
        "Strapi CMS",
        "CSS",
        "Sass",
        "MongoDB",
        "GraphQL",
        "PostgreSQL",
    ],
    languages: ["Inglés (Intermedio B2)", "Español"],
    professionalSummary: `Developer con más de 2 años de experiencia en el mundo del desarrollo web.\n Disciplinado, organizado, ético, aprendizaje continuo, pasión por la innovación, son algunas de mis características, siempre buscando soluciones digitales. He trabajado bajo metodologías ágiles y tradicionales como Scrum y rup. Encantado de pertencer a tu equipo y lograr nuestras metas.`,
    employmentHistory: [
        {
            jobTitle: "Fullstack Web Developer",
            startDate: "May 2021",
            endDate: "Jun 2021",
            employer: "Herlinda Soft.",
            city: "Las Vegas, Nevada",
            achievements: [
                "Me desempeñé en el rediseño de una famosa página de destino turístico CowBoyTrailRides en Las Vegas.",
                "Se trabajó bajo la conducción del desarrollador senior y utilzando herramientas como ReactJS(NextJS), queries de GraphQL dentro de StrapiCMS y la librería Ant Design.",
                "Se logró que el desarrollador senior tenga más tiempo para dedicar en la atención de nuestros clientes mediante entrevistas remotas y la mejora del backend de la aplicación.",
            ],
        },
        {
            jobTitle: "Analista de base de datos",
            startDate: "Ene 2020",
            endDate: "Feb 2020",
            employer: "Hypersystem",
            city: "lima",
            achievements: [
                `Trabajé en el desarrollo e implementación de geomapas en Arcgis para el estudio y extracción de material minero.`,
                `Lo trabajado ayudó a contribuir en la mejora del recabado de información y el estudio del lugar mediante el conjunto de alta precisión de mapas.`,
            ],
        },
        {
            jobTitle: "Asistente de coord. de Diseño",
            startDate: "Ago 2019",
            endDate: "Oct 2019",
            employer: "Tecsup Virtual",
            city: "Lima",
            achievements: [
                `Apoyo en la implementación de cursos semipresenciales de aprendizaje para los alumnos del Instituto Tecsup.`,
                `Creación de cursos interactivos dentro de la plataforma LMS CANVAS de gestión del aprendizaje utilizando etiquetas HTML semánticos y hojas de estilos.`,
            ],
        },
    ],
};

const formatResume = (r) => ({
    ...r,
    address: [
        r.country,
        r.city,
        r.postalCode
    ].filter(Boolean).join(', ')
})

new Vue({
    el: "#app",
    data: formatResume(resume)
});

/**
 * Wait for animatable-component to be loaded (Only for VanillaJS)
 **/
function animatableLoaded() {
    document.querySelector('body').classList.remove('d-none');
}
if (customElements) {
    customElements.whenDefined('animatable-component').then(animatableLoaded);
} else animatableLoaded();


