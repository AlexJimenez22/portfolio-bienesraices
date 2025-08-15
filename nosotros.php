<?php 

require "includes/app.php";

incluirTemplate('header');


?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="webp">
                    <source srcset="build/img/nosotros.jpg" type="jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
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
    </section>

<?php incluirTemplate('footer'); ?>