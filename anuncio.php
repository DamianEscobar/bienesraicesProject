<?php 
  require 'includes/funciones.php';

  incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>
            
            <div class="aux-precio-li">
                <p class="precio">$3,000,000</p>

                <ul class="iconos-caracteristicas">
                <li>
                    <img
                    loading="lazy"
                    src="build/img/icono_wc.svg"
                    alt="icono wc"
                    />
                    <p>3</p>
                </li>
                <li>
                    <img
                    loading="lazy"
                    src="build/img/icono_estacionamiento.svg"
                    alt="icono estacionamiento"
                    />
                    <p>3</p>
                </li>
                <li>
                    <img
                    loading="lazy"
                    src="build/img/icono_dormitorio.svg"
                    alt="icono dormitorio"
                    />
                    <p>4</p>
                </li>
                </ul>
            </div><!--.aux-precio-li-->

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, soluta id. Adipisci, officia? Nulla voluptas quibusdam optio aperiam dolores necessitatibus inventore? Repellendus at sit, repellat nemo consectetur deserunt aliquid quis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse in fugiat fugit beatae, id impedit facere soluta vel consequatur aliquid blanditiis obcaecati veniam doloribus voluptatum repellendus nam, harum recusandae architecto!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, corporis. Maiores temporibus deserunt asperiores corrupti voluptatum voluptates expedita mollitia cum, ratione aspernatur animi nesciunt ducimus dignissimos, omnis atque eos quo.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi facere quaerat, reiciendis optio in non. Voluptas perferendis similique magnam illum dolorum, cumque nesciunt non. Quibusdam temporibus harum libero nobis dignissimos!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni autem est repellat blanditiis aliquid maxime necessitatibus error quibusdam commodi aspernatur minus.
            </p>
        </div>
    </main>

    <?php incluirTemplate('footer')?>