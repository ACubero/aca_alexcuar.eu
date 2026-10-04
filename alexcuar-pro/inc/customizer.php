<?php
/**
 * Customizer settings: every CV section of the front page is editable here.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

function alexcuar_pro_defaults(): array {
	return array(
		'hero_show'       => true,
		'hero_badge'      => 'Abierto a nuevos retos y colaboraciones',
		'hero_hello'      => 'Hola, soy',
		'hero_name'       => 'Alejandro Cubero',
		'hero_roles'      => "AI-First Developer\nDesarrollador de software ERP\nPythonista autodidacta\nCreador de contenido tecnológico",
		'hero_lead'       => 'Más de 30 años convirtiendo problemas de negocio en software. De los listados BASIC del Commodore 64 a la inteligencia artificial: aprendo, construyo y lo cuento.',
		'hero_avatar'     => '',
		'hero_chips'      => "30+ años de código\nERP · Cosmos\nPython · IA",
		'cv_url'          => '',
		'cv_text'         => 'Descargar CV',
		'contact_text'    => 'Hablemos',

		'stats'           => "30+|años programando\n20+|años en software ERP\n2001|mi primer portal web\n50+|repos públicos en GitHub",

		'about_title'     => 'Un programador de la vieja escuela con la mirada en el futuro',
		'about_text'      => "Empecé a programar de pequeño con un Commodore 64, transcribiendo los listados BASIC de la mítica revista Micromanía. Después llegaron el 286, el 386, el Pentium… y nunca dejé de aprender.\n\nHe pasado 10 años programando en SuperNova 4GL para el sector textil y más de 20 en Cosmos, manteniendo y evolucionando un ERP empresarial. Por mi cuenta he trabajado con Python, PHP y web, y hoy exploro la IA y el no-code para crear contenido y herramientas útiles.",
		'about_cards'     => "Visión de negocio | Tres décadas traduciendo procesos empresariales a software estable y mantenible. | briefcase\nAprendizaje continuo | Reciclaje constante: JavaScript, React, Python, IA. | sparkles\nComunicador | Blog, podcast y YouTube para compartir lo que aprendo. | mic",

		'experience'      => "2025 — Hoy | Automatización y agentes IA | n8n · Hermes Agent · Raspberry Pi · LLM local | Flujos n8n que convierten documentación técnica en material comercial con Gemini, y agentes IA autoalojados que se manejan desde Telegram y orquestan modelos en local.\n2024 — Hoy | AI-First Development | TypeScript · Python · PWA · Docker · IA | Aplicaciones web y herramientas propias construidas orquestando IA: JuegIA, una PWA de gestión de voluntarios, apps de productividad y accesibilidad, extensiones de Chrome y despliegues en VPS propio.\n20+ años | Desarrollador de software ERP | Kriter Software · Cosmos · Remoto | Mantenimiento y evolución de un ERP: lógica de negocio, rendimiento, soporte y migración de la aplicación de escritorio de 32 a 64 bits. Hoy incorporo IA al día a día del desarrollo sobre código legacy.\n10 años | Programador de aplicaciones de gestión | SuperNova 4GL · Sector textil | Desarrollo de aplicaciones de gestión a medida para una empresa textil.\n2001 | Desarrollo web | HTML · CSS · JavaScript | Lanzamiento de EMARESME, portal inmobiliario de la costa central de Barcelona.\nLos inicios | Programador autodidacta | Commodore 64 · BASIC | Primeros programas copiando listados de Micromanía. La curiosidad que lo empezó todo.",

		'skills'          => "Backend y ERP | Cosmos, SuperNova 4GL, SQL, Lógica de negocio, Rendimiento | code\nPython y automatización | Python, Flask, FastAPI, Supabase, Web scraping, APIs | terminal\nDesarrollo web | HTML, CSS, JavaScript, TypeScript, React, PWA, PHP, WordPress | globe\nIA y productividad | Claude Code, MCP, Prompt engineering, Agentes IA, n8n, RAG, Flowise, ChatGPT, Gemini, Copilot | sparkles\nInfraestructura | Linux, VPS, Docker, Portainer, Raspberry Pi, SSH, Git, GitHub | server\nContenido y comunidad | Blog, Podcast, YouTube, No-code, Divulgación | mic",

		'projects'        => "JuegIA | Asistente con IA que explica las reglas de cualquier juego de mesa al instante. | https://alexcuar.eu/juegia-ia-juegos-mesa-react/ | React, TypeScript, IA | https://github.com/acubero/juegia\nLimpieza con voluntarios | PWA para organizar los turnos de limpieza de un grupo de voluntarios: plannings, avisos y uso desde el móvil. | https://github.com/acubero/limpieza | PWA, Flask, JavaScript\nBusGijón | Webapp para moverse en autobús por Gijón: paradas cercanas por geolocalización, asistente IA para preguntar rutas y horarios, y letra grande para leer sin gafas. | https://www.linkedin.com/feed/update/urn:li:activity:7438955692293599232/ | JavaScript, Geolocalización, IA | https://github.com/acubero/busgijon\nPresbia | Herramienta de accesibilidad para leer con comodidad cuando aparece la presbicia. | https://github.com/acubero/Presbia | TypeScript, Accesibilidad\nFoco Vital | App PWA de productividad para centrar la energía en lo importante. | https://github.com/acubero/foco-vital | PWA, TypeScript, Productividad\nEfecto 18 | PWA 100 % offline y sin backend que pone en práctica el método «18 minutos»: persistencia en IndexedDB, estado reactivo en Vanilla JS y copia de seguridad en JSON. | https://www.linkedin.com/feed/update/urn:li:activity:7400461778154864640/ | PWA, IndexedDB, Vibe coding | https://github.com/acubero/efecto-18-pwa\nDe técnico a comercial con n8n | Flujo n8n que lee un PDF técnico, lo reescribe con Gemini como documento de marketing y lo envía por Gmail sin intervención manual. | https://www.linkedin.com/feed/update/urn:li:activity:7416118621166264320/ | n8n, Gemini, Docker, Automatización\nChiwaka y DarthVader | Dos agentes Hermes: uno en una Raspberry Pi manejado por Telegram que despierta el equipo de IA local y resume cada lunes la agenda de la Cámara de Comercio de Gijón; el otro, en la máquina de IA. | https://www.linkedin.com/feed/update/urn:li:activity:7455289403972820994/ | Agentes IA, Raspberry Pi, Telegram, LLM local\nExtensiones de Chrome | Pequeñas herramientas para el trabajo diario: render de etiquetas ZPL, parser de CSV, conversor px↔mm y pomodoro. | https://github.com/acubero/aca_zpl_render | JavaScript, Chrome\nCloud Lab y RAG | Retos de VPS, Docker, Portainer y Linux, más el despliegue de un sistema RAG con Flowise. | https://github.com/acubero/cloud-lab | Docker, Linux, RAG | https://github.com/acubero/flowise-rag-deploy\nPrograma Python con ChatGPT | Cómo una conversación con ChatGPT acabó en una herramienta Python que resolvió un problema real de trabajo. | https://alexcuar.eu/como-chatgpt-hizo-programa-python-que-me-ayudo/ | Python, ChatGPT\nPodcast «Aprendiendo con la IA» | Episodios sobre cómo la inteligencia artificial cambia la forma de aprender y trabajar. | https://anchor.fm/s/10b692c54/podcast/rss | Podcast, IA",

		'certifications'  => "Anthropic | Claude Code 101, Claude 101, AI Capabilities and Limitations, AI Fluency for Small Businesses, AI Fluency: Framework & Foundations | sparkles\nOpenAI | Agents and Workflows, AI Foundations | sparkles\nBIG school | Curso de IA 2026, Iniciación al desarrollo con IA, IA Workflows, Iniciación a la IA | code\nMIT · Google · Microsoft | Introducción a la IA generativa (MIT Professional Education), IA y productividad (Google), Ciberseguridad en el teletrabajo (Google), Prompting responsable (Microsoft & Founderz) | briefcase\nSantander Open Academy | Domina la IA con Gemini, Copilot en Microsoft 365, Fundamentos de ChatGPT, Cursor con Python | terminal\nOtras | Programación para todos: Python (edX), Fundamentos de Marketing Digital (Google) | globe",
		'testimonials'    => "Impresionante. Sabes que te admiro como profesional y es un placer presumir de trabajar a tu lado. | Joaquín Moreira Bernal | Business Consultant & Support Manager · Kriter Software\nDe un profesional de verdad no se podía esperar otra cosa. | Justo Martínez Álvarez | Responsable de Producto KRITER · IFN Software\nLa integración de IA con persistencia en el navegador es un gran avance para la productividad offline. Marca un camino hacia nuevas soluciones robustas. | Diana Villarreal Aldana | Consultora de Growth Marketing",

		'posts_title'     => 'Lo que estoy escribiendo',
		'cta_title'       => '¿Construimos algo juntos?',
		'cta_text'        => 'Si buscas un perfil con experiencia real en software empresarial y ganas de seguir aprendiendo, escríbeme.',

		'brand_initials'   => '',
		'brand_tagline'    => '',
		'footer_giant'     => '',
		'footer_copyright' => '',
		'footer_about'    => 'Desarrollador de software con más de 30 años de experiencia. Escribo sobre productividad, IA, Python y todo lo que aprendo por el camino.',
		'social_github'    => 'https://github.com/acubero',
		'social_linkedin'  => 'https://www.linkedin.com/in/alejandro-cubero-arrizabalaga',
		'social_x'         => 'https://twitter.com/acuberoa',
		'social_instagram' => 'https://www.instagram.com/acuberoa/',
		'social_youtube'   => '',
		'social_telegram'  => 'https://t.me/alexcuar',
		'social_email'     => 'alexcuar.eu@gmail.com',
		'show_rss'         => false,
		'show_author_box'  => true,
		'show_related'     => true,
	);
}

function alexcuar_pro_option( string $key ) {
	$defaults = alexcuar_pro_defaults();
	return get_theme_mod( $key, $defaults[ $key ] ?? '' );
}

function alexcuar_pro_sanitize_checkbox( $value ): bool {
	return (bool) $value;
}

function alexcuar_pro_sanitize_url_or_anchor( string $value ): string {
	$value = trim( $value );
	if ( '' === $value ) {
		return '';
	}
	if ( 0 === strpos( $value, '#' ) ) {
		return '#' . sanitize_title( substr( $value, 1 ) );
	}
	return esc_url_raw( $value );
}

function alexcuar_pro_customize_register( WP_Customize_Manager $wp_customize ): void {
	$defaults = alexcuar_pro_defaults();
	$format   = __( 'Una entrada por línea. Campos separados por «|».', 'alexcuar-pro' );

	$wp_customize->add_panel(
		'alexcuar_pro',
		array(
			'title'       => __( 'AlexCuar Pro · Portada CV', 'alexcuar-pro' ),
			'description' => __( 'Contenido de la portada tipo currículum.', 'alexcuar-pro' ),
			'priority'    => 30,
		)
	);

	$sections = array(
		'alexcuar_pro_hero'       => __( '1. Presentación', 'alexcuar-pro' ),
		'alexcuar_pro_about'      => __( '2. Cifras y sobre mí', 'alexcuar-pro' ),
		'alexcuar_pro_experience' => __( '3. Experiencia', 'alexcuar-pro' ),
		'alexcuar_pro_skills'     => __( '4. Habilidades', 'alexcuar-pro' ),
		'alexcuar_pro_projects'   => __( '5. Proyectos y blog', 'alexcuar-pro' ),
		'alexcuar_pro_contact'    => __( '6. Contacto y redes', 'alexcuar-pro' ),
		'alexcuar_pro_branding'   => __( 'Cabecera y pie', 'alexcuar-pro' ),
		'alexcuar_pro_layout'     => __( 'Artículos', 'alexcuar-pro' ),
	);
	foreach ( $sections as $id => $title ) {
		$wp_customize->add_section( $id, array( 'title' => $title, 'panel' => 'alexcuar_pro' ) );
	}

	$text     = 'sanitize_text_field';
	$textarea = 'sanitize_textarea_field';
	$check    = 'alexcuar_pro_sanitize_checkbox';

	$fields = array(
		'hero_show'        => array( 'alexcuar_pro_hero', 'checkbox', __( 'Mostrar portada CV (si no, se muestra el blog)', 'alexcuar-pro' ), $check ),
		'hero_badge'       => array( 'alexcuar_pro_hero', 'text', __( 'Etiqueta de disponibilidad (vacío = ocultar)', 'alexcuar-pro' ), $text ),
		'hero_hello'       => array( 'alexcuar_pro_hero', 'text', __( 'Saludo', 'alexcuar-pro' ), $text ),
		'hero_name'        => array( 'alexcuar_pro_hero', 'text', __( 'Nombre', 'alexcuar-pro' ), $text ),
		'hero_roles'       => array( 'alexcuar_pro_hero', 'textarea', __( 'Roles animados (uno por línea)', 'alexcuar-pro' ), $textarea ),
		'hero_lead'        => array( 'alexcuar_pro_hero', 'textarea', __( 'Presentación breve', 'alexcuar-pro' ), $textarea ),
		'hero_chips'       => array( 'alexcuar_pro_hero', 'textarea', __( 'Etiquetas flotantes junto a la foto (máx. 3, una por línea)', 'alexcuar-pro' ), $textarea ),
		'cv_url'           => array( 'alexcuar_pro_hero', 'url', __( 'URL del CV en PDF (vacío = ocultar botón)', 'alexcuar-pro' ), 'esc_url_raw' ),
		'cv_text'          => array( 'alexcuar_pro_hero', 'text', __( 'Texto botón CV', 'alexcuar-pro' ), $text ),
		'contact_text'     => array( 'alexcuar_pro_hero', 'text', __( 'Texto botón contacto', 'alexcuar-pro' ), $text ),
		'stats'            => array( 'alexcuar_pro_about', 'textarea', __( 'Cifras: valor | etiqueta', 'alexcuar-pro' ), $textarea ),
		'about_title'      => array( 'alexcuar_pro_about', 'text', __( 'Título sobre mí', 'alexcuar-pro' ), $text ),
		'about_text'       => array( 'alexcuar_pro_about', 'textarea', __( 'Texto sobre mí (línea en blanco = nuevo párrafo)', 'alexcuar-pro' ), $textarea ),
		'about_cards'      => array( 'alexcuar_pro_about', 'textarea', __( 'Puntos fuertes: título | texto | icono', 'alexcuar-pro' ), $textarea ),
		'experience'       => array( 'alexcuar_pro_experience', 'textarea', __( 'Periodo | puesto | empresa/tecnología | descripción', 'alexcuar-pro' ), $textarea ),
		'skills'           => array( 'alexcuar_pro_skills', 'textarea', __( 'Grupo | habilidades separadas por comas | icono', 'alexcuar-pro' ), $textarea ),
		'projects'         => array( 'alexcuar_pro_projects', 'textarea', __( 'Título | descripción | URL | etiquetas | repositorio (opcional)', 'alexcuar-pro' ), $textarea ),
		'certifications'   => array( 'alexcuar_pro_skills', 'textarea', __( 'Formación: emisor | cursos separados por comas | icono', 'alexcuar-pro' ), $textarea ),
		'testimonials'     => array( 'alexcuar_pro_projects', 'textarea', __( 'Testimonios: cita | autor | cargo', 'alexcuar-pro' ), $textarea ),
		'posts_title'      => array( 'alexcuar_pro_projects', 'text', __( 'Título sección blog', 'alexcuar-pro' ), $text ),
		'cta_title'        => array( 'alexcuar_pro_contact', 'text', __( 'Título contacto', 'alexcuar-pro' ), $text ),
		'cta_text'         => array( 'alexcuar_pro_contact', 'textarea', __( 'Texto contacto', 'alexcuar-pro' ), $textarea ),
		'social_email'     => array( 'alexcuar_pro_contact', 'email', __( 'Email', 'alexcuar-pro' ), 'sanitize_email' ),
		'social_linkedin'  => array( 'alexcuar_pro_contact', 'url', 'LinkedIn', 'esc_url_raw' ),
		'social_github'    => array( 'alexcuar_pro_contact', 'url', 'GitHub', 'esc_url_raw' ),
		'social_x'         => array( 'alexcuar_pro_contact', 'url', 'X / Twitter', 'esc_url_raw' ),
		'social_instagram' => array( 'alexcuar_pro_contact', 'url', 'Instagram', 'esc_url_raw' ),
		'social_youtube'   => array( 'alexcuar_pro_contact', 'url', 'YouTube', 'esc_url_raw' ),
		'social_telegram'  => array( 'alexcuar_pro_contact', 'url', 'Telegram', 'esc_url_raw' ),
		'show_rss'         => array( 'alexcuar_pro_contact', 'checkbox', __( 'Mostrar enlace RSS', 'alexcuar-pro' ), $check ),
		'show_author_box'  => array( 'alexcuar_pro_layout', 'checkbox', __( 'Caja de autor en artículos', 'alexcuar-pro' ), $check ),
		'show_related'     => array( 'alexcuar_pro_layout', 'checkbox', __( 'Artículos relacionados', 'alexcuar-pro' ), $check ),
		'brand_initials'   => array( 'alexcuar_pro_branding', 'text', __( 'Iniciales del logotipo si no hay imagen de logotipo (vacío = iniciales del nombre)', 'alexcuar-pro' ), $text ),
		'brand_tagline'    => array( 'alexcuar_pro_branding', 'text', __( 'Texto bajo el nombre del sitio en cabecera y pie (vacío = nombre). Logotipo y nombre: «Identidad del sitio».', 'alexcuar-pro' ), $text ),
		'footer_giant'     => array( 'alexcuar_pro_branding', 'text', __( 'Palabra gigante del pie (vacío = primer nombre)', 'alexcuar-pro' ), $text ),
		'footer_copyright' => array( 'alexcuar_pro_branding', 'text', __( 'Copyright del pie. {year} = año actual (vacío = «© año Nombre. Todos los derechos reservados.»)', 'alexcuar-pro' ), 'wp_kses_post' ),
		'footer_about'     => array( 'alexcuar_pro_branding', 'textarea', __( 'Texto del pie', 'alexcuar-pro' ), $textarea ),
	);

	$list_fields = array( 'stats', 'about_cards', 'experience', 'skills', 'projects', 'certifications', 'testimonials' );

	foreach ( $fields as $key => list( $section, $type, $label, $sanitize ) ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $sanitize,
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				'section'     => $section,
				'type'        => $type,
				'label'       => $label,
				'description' => in_array( $key, $list_fields, true ) ? $format . ' ' . __( 'Iconos: code, terminal, globe, sparkles, server, mic, briefcase.', 'alexcuar-pro' ) : '',
			)
		);
	}

	$wp_customize->add_setting(
		'hero_avatar',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'hero_avatar',
			array(
				'section'   => 'alexcuar_pro_hero',
				'label'     => __( 'Foto de perfil', 'alexcuar-pro' ),
				'mime_type' => 'image',
			)
		)
	);
}
add_action( 'customize_register', 'alexcuar_pro_customize_register' );
