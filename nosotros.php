<?php 
  require 'includes/app.php';

  incluirTemplate('header'); 
?>
    <main class="contenedor seccion">
        <h1 class="titulo-nosotros">Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp" />
                <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
                <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros" />
            </picture>
            <div class="texto-nosotros">
                <span>25 Años de Experiencia</span>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores cupiditate similique ex ab minima laudantium nam suscipit ut! Molestias ducimus incidunt quaerat, delectus quas repellat odio rem corporis possimus quisquam?
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo dolorem minima nulla est adipisci nostrum molestias dignissimos aliquid enim eaque id reiciendis, praesentium nam esse deleniti. Iure nulla veniam ipsa.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse consectetur quisquam quod nostrum? Ipsam exercitationem inventore fuga?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio rem velit vel mollitia pariatur nostrum laborum neque voluptatum, dolorum dolor quis. Ipsam error cumque distinctio accusantium laborum impedit nihil nobis. Illo id optio et recusandae doloribus ratione dolorem cupiditate, necessitatibus.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
  
        <div class="iconos-nosotros">
          <div class="icono">
            <img
              src="build/img/icono1.svg"
              alt="icono seguridad"
              loading="lazy"
            />
            <h3>Seguridad</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid,
              voluptatem aperiam debitis nulla architecto illum veritatis
              reiciendis illo cupiditate magnam dolorem? Obcaecati eos assumenda
              quaerat tempore! Adipisci laboriosam cumque molestias.
            </p>
          </div>
          <div class="icono">
            <img loading="lazy" src="build/img/icono2.svg" alt="icono precio" />
            <h3>Precio</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid,
              voluptatem aperiam debitis nulla architecto illum veritatis
              reiciendis illo cupiditate magnam dolorem? Obcaecati eos assumenda
              quaerat tempore! Adipisci laboriosam cumque molestias.
            </p>
          </div>
          <div class="icono">
            <img loading="lazy" src="build/img/icono3.svg" alt="icono tiempo" />
            <h3>A tiempo</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid,
              voluptatem aperiam debitis nulla architecto illum veritatis
              reiciendis illo cupiditate magnam dolorem? Obcaecati eos assumenda
              quaerat tempore! Adipisci laboriosam cumque molestias.
            </p>
          </div>
        </div>
    </section>

        <?php incluirTemplate('footer')?>