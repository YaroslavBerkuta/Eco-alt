<?php
/*Template name: objects*/
get_header();

?>

    <main>
        <section>
            <div class="container">
                <div class="section__title">
                    <h2 class="title">Об'єкти</h2>
                </div>
                <div class="filter__catalog">
                    <div class="filter__flex">
                        <?php
                        $args = array(
                            //'post_type' => 'portfolio',
                            'taxonomy' => 'objects',
                            //'name '=>'objects'
                        );
                        $objects = get_terms($args);
                        //заповнити
                           // print_r($objects);
                        foreach ($objects as $object){ ?>
                            <div class="filter__item" data-filter-category="<?php echo $object->name;?>">
                                <button><?php echo $object->name; ?></button>
                            </div>
                       <?php  }
                        ?>


                    </div>
                </div>
                <div class="object__flex">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'portfolio',
                            //'suppress_filters' => true,
                        );

                        $posts = get_posts($args);
                        $terms=get_the_taxonomies();
                        foreach ($posts as $post) {
                            $objects=get_the_terms(get_the_ID(),'objects');
                            setup_postdata($post); ?>
                            <div class="object__item" data-category="<?php foreach ($objects as $object){
                                echo $object->name;
                            }?>">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""/>
                            </div>
                        <?php }
                        wp_reset_postdata();
                        ?>


                    </div>
                    <div class="object__controls">
                        <div class="object-button-prev">
                            <svg
                                    width="11"
                                    height="20"
                                    viewBox="0 0 11 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                        d="M2.33336 19.3333C2.02182 19.3339 1.71991 19.2254 1.48003 19.0267C1.34502 18.9147 1.23341 18.7773 1.15161 18.6221C1.06981 18.467 1.01941 18.2973 1.00331 18.1226C0.987211 17.948 1.00572 17.7719 1.05778 17.6044C1.10984 17.437 1.19442 17.2814 1.30669 17.1467L7.28003 10L1.52003 2.84C1.40927 2.70362 1.32656 2.54669 1.27666 2.37824C1.22675 2.20979 1.21062 2.03313 1.22921 1.85843C1.24779 1.68372 1.30072 1.51441 1.38495 1.36023C1.46919 1.20605 1.58306 1.07003 1.72003 0.960002C1.85798 0.83862 2.01954 0.747063 2.19455 0.691078C2.36957 0.635093 2.55427 0.615888 2.73706 0.634667C2.91985 0.653447 3.09679 0.709807 3.25676 0.800209C3.41674 0.890612 3.5563 1.01311 3.66669 1.16L10.1067 9.16C10.3028 9.39858 10.41 9.69784 10.41 10.0067C10.41 10.3155 10.3028 10.6148 10.1067 10.8533L3.44003 18.8533C3.30627 19.0147 3.13636 19.1422 2.94408 19.2256C2.7518 19.309 2.54257 19.3459 2.33336 19.3333Z"
                                        fill="#00A759"
                                />
                            </svg>
                        </div>
                        <div class="object-pagination"></div>
                        <div class="object-button-next">
                            <svg
                                    width="11"
                                    height="20"
                                    viewBox="0 0 11 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                        d="M2.33336 19.3333C2.02182 19.3339 1.71991 19.2254 1.48003 19.0267C1.34502 18.9147 1.23341 18.7773 1.15161 18.6221C1.06981 18.467 1.01941 18.2973 1.00331 18.1226C0.987211 17.948 1.00572 17.7719 1.05778 17.6044C1.10984 17.437 1.19442 17.2814 1.30669 17.1467L7.28003 10L1.52003 2.84C1.40927 2.70362 1.32656 2.54669 1.27666 2.37824C1.22675 2.20979 1.21062 2.03313 1.22921 1.85843C1.24779 1.68372 1.30072 1.51441 1.38495 1.36023C1.46919 1.20605 1.58306 1.07003 1.72003 0.960002C1.85798 0.83862 2.01954 0.747063 2.19455 0.691078C2.36957 0.635093 2.55427 0.615888 2.73706 0.634667C2.91985 0.653447 3.09679 0.709807 3.25676 0.800209C3.41674 0.890612 3.5563 1.01311 3.66669 1.16L10.1067 9.16C10.3028 9.39858 10.41 9.69784 10.41 10.0067C10.41 10.3155 10.3028 10.6148 10.1067 10.8533L3.44003 18.8533C3.30627 19.0147 3.13636 19.1422 2.94408 19.2256C2.7518 19.309 2.54257 19.3459 2.33336 19.3333Z"
                                        fill="#00A759"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
add_action('init', 'create_taxonomy');
get_footer();
