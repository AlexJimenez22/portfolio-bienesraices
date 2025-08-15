<?php 

require "includes/app.php";

incluirTemplate('header', $inicio = true);


?>


    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img loading="lazy" src="build/img/icono1.svg" alt="Icono seguridad">
                <h3>seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum eum dicta magnam veniam explicabo aut,
                    temporibus ex enim commodi minima dignissimos laudantium maiores, ipsa excepturi, ut quas inventore ipsum quia?</p>
            </div>
            <div class="icono">
                <img loading="lazy" src="build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum eum dicta magnam veniam explicabo aut,
                    temporibus ex enim commodi minima dignissimos laudantium maiores, ipsa excepturi, ut quas inventore ipsum quia?</p>
            </div>
            <div class="icono">
                <img loading="lazy" src="build/img/icono3.svg" alt="Icono A Tiempo">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum eum dicta magnam veniam explicabo aut,
                    temporibus ex enim commodi minima dignissimos laudantium maiores, ipsa excepturi, ut quas inventore ipsum quia?</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en venta</h2>

        <?php 
        $limite = 3; // Limite para que traiga la cantidad de resutlados
        // limite se declara aqui porque aqui es donde sec carga el archovo de anuncios
        include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tu sueños</h2>
        <p>LLena el formulario de contacto y un asesor se pondra en contacto contigo  a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            
            <article class="entrada-blog"> <!-- Cuando se usara una entrada de blog se usa article -->
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="webp">
                        <source srcset="build/img/blog1.jpg" type="jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y 
                            ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog"> <!-- Cuando se usara una entrada de blog se usa article -->
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="webp">
                        <source srcset="build/img/blog2.jpg" type="jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                        <p>
                            Maximiza el espacio para tu hogar con esta guia, aprende a combinar muebles y colores
                            para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote> <!-- Siempre que es un testimonial o una cita se usa la etiqueta blockquote -->
                    El personal se comporto de una excelemente forma, muy buena atención y la casa que me ofrecieron
                    cumple con todas mis expectativas.
                </blockquote>
                <p>- Alejandro Jiménez</p>
            </div>
        </section>
    </div>

<?php require 'includes/templates/footer.php'; ?>