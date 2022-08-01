<template>
  <div>
    <!-- ======= Hero Section ======= -->
    <section id="hero">
      <div class="hero-container w-50" data-aos="fade-up" data-aos-delay="150">
        <h1>KENNY DORVILUS</h1>
        <h2>Coach, motivateur, mentor, enseignant de la parole de Dieu, voix prophétique pour les nations, revivaliste
          et Ecrivain</h2>
        <div class="d-flex">
          <router-link :to="{ name: 'books' }" class="btn-get-started scrollto">Voir livre 
          <i class='fas fa-book-open ml-1'></i></router-link>
          <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
        </div>
        <div class="social-links separator mt-3" style="font-size: 2.5rem">
        <div class="line"></div>
            <a href="https://www.twitter.com/KenProphete" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/dorvilus.kenny" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/propheticsnapper_kenny" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
            <!-- <a href="#" class="google-plus m-2"><i class="bx bxl-skype"></i></a> -->
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          <div class="line"></div>
        </div>
      </div>
    </section>
    <!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" ref="about" class="about">
      <div class="container" data-aos="fade-up">

        <!-- <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-emoji-smile"></i>
                  <span data-purecounter-start="0" data-purecounter-end="125" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Project</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-journal-richtext"></i>
                  <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Ouvrage</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-clock"></i>
                  <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Année d'experience</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-award"></i>
                  <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Honneur et Merite</p>
                </div>
              </div>

            </div>
          </div>
        </div> -->

        <div class="row" id="about">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a> -->
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>Qui est Kenny?.</h3>
            <p class="fst-italic">
              Le Prophète Kenny est originaire du département de nord-ouest plus particulièrement de l’île de La Tortue.
              Benjamin d’une famille de cinq enfants. Il a fait des études de théologie au Royaume Haïti Collège
              Biblique (RHCB) et de génie informatique à l’Université INUKA. Kenny DORVILUS sert sa communauté et le
              Royaume de Dieu à bien des égards il est : coach, motivateur, mentor, enseignant de la parole de Dieu,
              voix prophétique pour les nations et revivaliste. Il est aussi auteur de plusieurs ouvrages dont :
              <br />
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> 300 citations de sagesse</li>
              <li><i class="bx bx-check-double"></i> 95 Révélations sur le mystère de la prière en Esprit </li>
              <li><i class="bx bx-check-double"></i> Haïti une nouvelle génération une nouvelle vague du réveil</li>
              <li><i class="bx bx-check-double"></i> 7 vérités irréfutables de la foi </li>
              <li><i class="bx bx-check-double"></i> Comment conserver et faire grandir son onction </li>
            </ul>
            <p>
              C’est un patriote dans l’âme. Et par-dessus tout un Chrétien soupirant et combattant encore jusqu’au
              retour son Seigneur Jésus-Christ.
              Il est le fondateur de DK FONDATION et également membre de la mission BARUC.
            </p>
            <router-link class="btn btn-block w-100" :to="{ name: 'about' }"
              style="border: 1px solid orange; color: #ffffff"> En savoir plus sur Kenny </router-link>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <!-- <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <i class="ri-gps-line"></i>
              <h4 class="d-none d-lg-block">Modi sit est dela pireda nest</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <i class="ri-body-scan-line"></i>
              <h4 class="d-none d-lg-block">Unde praesenti mara setra le</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
              <i class="ri-sun-line"></i>
              <h4 class="d-none d-lg-block">Pariatur explica nitro dela</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
              <i class="ri-store-line"></i>
              <h4 class="d-none d-lg-block">Nostrum qui dile node</h4>
            </a>
          </li>
        </ul> -->

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" style="color: #585A5C">
                <h3 style="color: orange">Mission Baruc et DK FONDATION</h3>
                <p class="fst-italic">
                  DK FONDATION est une fondation fondée par Kenny Dorvilus, située sur l’île
                  de la tortue Nord-Ouest d’Haïti, elle a pour but d’aider les enfants démunis
                  dans l’île. Par rapport à la situation actuelle du pays, l’avenir du pays
                  repose sur les enfants. Pour que les enfants puissent assumer cette charge,
                  il faudrait qu’une chose, l’éducation tout comme Nelson Mandela a dit :
                  l’éducation est l’arme la plus puissante qu’on puisse utiliser pour changer
                  le monde.
                </p>

                <p>
                  donc DK FONDATION met l’accent sur l’éducation parce qu’il pense
                  qu’avec ce dernier, la société pourra s’améliorer. En dépit de tous les
                  phénomènes qui se passent en Haïti, le banditisme, le kidnapping, il y a une
                  catégorie de personnes qui croit qu’Haïti peut franchir une autre porte,
                  c’est en cette raison que Kenny Dorvilus s’est donné lui-même et avec le
                  peu qu’il a pour qu’il coopère dans le progrès social et éducatif d’Haïti.
                </p>
                <router-link class="btn btn-block w-100" :to="{ name: 'dkfondation' }"
                  style="border: 1px solid orange; color: #ffffff"> En savoir plus </router-link>
                <!-- <h3>Mission BARUC</h3>
         
                <ul>
                  <li><i class="ri-check-double-line"></i> C'est quoi la mission Baruc.</li>
                <p>La Mission BARUC est une plateforme 100% virtuelle, une maison d’édition chrétienne
                     constitué de plusieurs bien-aimés frères et sœurs pour l’émergence du royaume de Dieu 
                     a travers de l’écriture ointe.
                 </p>
                  <li><i class="ri-check-double-line"></i> Objectif</li> 
                 <p>
                     Dans le livre de Jérémie 36 :4 qui est notre texte de base la bible dit ceci : Jérémie appela 
                      Baruc, fils de Nérija; et Baruc écrivit dans un livre, sous la dictée de Jérémie, toutes les 
                      paroles que l'Eternel avait dites à Jérémie. Comme Baruc avait la mission de mettre en 
                      écrit tout ce que Dieu a dit au prophète Jérémie sur sa dicté. Nous avons aussi ce même 
                      objectif, celui de promouvoir le royaume de Dieu par l’écriture, et aussi de mettre en écrit
                      tout ce que Dieu a communiqué a tous ceux qui veulent écrire un livre. Nous sommes là 
                      pour les aider à faire sortir les livres qui sommeillent en eux. Voilà pourquoi cette 
                      entreprise porte le nom de Baruc. Car nous croyons que tous ceux qui veulent faire un 
                      impact, organisent des conférences, des croisades, des mouvements prophétiques etc. 
                      Mais tous ceux qui veulent laisser un héritage, écrivent des livres
                 </p>
               </ul> -->
                <!-- <li><i class="ri-check-double-line"></i>SERVICES OFFERTS :</li>
                 <p>
                  1. Consultation : L’éditeur consultera le client afin de l’aider à bien canaliser ses 
                      idées pour une meilleure exposé de sa narration s’il est dans l’incapacité. 
                      2. Tâches Editoriales : Correction portant au niveau de la grammaire, utilisation des 
                      mots d’orthographe, ponctuation, structure de la phrase ,édition stylistique, 
                      édition de développement (clarification du sens polissage du langage), édition 
                      ligne par ligne pour plus de fluidité et de clarté tout en conservant la voix et le 
                      style de l'auteur suggestions d'édition, l'amélioration de la vue d'ensemble, 
                      aspects du livre tels que le développement des personnages et de l'intrigue, 
                      histoire de fond, écriture supplémentaire nécessaire pour améliorer les parties 
                      narratives du livre, réarrangement possible de sections ou de chapitres au besoin, 
                      suppressions de sections redondantes ou qui pourrait nuire à l'histoire.

                      3. Portée du Processus d'Edition
                      L'éditeur éditera le manuscrit comme décrit dans la section des tâches éditoriales 
                      ci-dessus et l'enverra à l'auteur pour approbation. L’éditeur enverra deux 
                      versions, en montrant toutes les marques d'édition en utilisant les changements 
                      de piste dans Microsoft Word et une version propre avec les modifications 
                      incorporées cela se fera à chaque quart d'étape du livre. L'auteur apportera toutes 
                      les révisions nécessaires dans la version propre du manuscrit et répondra à toutes 
                      les questions de l'éditeur et renverra le manuscrit à l'éditeur. L’éditeur 
                      incorporera ces modifications ou corrections dans le manuscrit et effectuera une 
                      seconde édition légère
                      L’éditeur préparera un PDF de base pour l'auteur à envoyer à ses lecteurs bêta. Si 
                      les lecteurs bêta signalent de vraies erreurs dans le manuscrit, l'éditeur les 
                      corrigera tout en effectuant une relecture finale.
                      Mission Baruc
                      4. Conception de la couverture : L’éditeur doit fournir une conception de couverture 
                      professionnelle et originale pour le livre. L’éditeur sera responsable de la mise en 
                      forme de la couverture de l'ebook et des couvertures imprimées (du recto au dos 
                      ) si l'auteur choisit à tout moment de résilier ce contrat d'édition, la conception de 
                      couverture unique créée par Mission Baruc ne peut pas être utilisée pour republier 
                      le livre avec un autre éditeur.
                      5. ISBN
                      L'éditeur obtiendra et attribuera un ISBN unique pour chaque édition du livre 
                      répertorié dans cet accord d'édition. Mention plus bas dans les règlements a ce sujet.
                      6. Publications : L’éditeur publiera l´ouvrage sur des plateformes standards et 
                      sécurisés. L´ouvrage sera exclusivement sur le marché que par les règles régis des 
                      droits d´auteurs.
                      7. Promotion : L’ouvrage sera promouvoir pendant un mois afin d´aider l´auteur à
                      atteindre le plus de lecteurs possibles.
                      N.B le contenu littéraire de l´ouvrage joue un rôle de 40% dans la promotion du 
                      livre, ce qui veut dire que 40% de promotion sera sur la charge de ce que l´auteur 
                      exposera dans sa narration. Le design et la tache éditoriale seront les 60% que 
                      Baruc aura à couvrir.
                 </p> -->


              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/baruc.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Features Section -->




    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Quelque livvres</h2>
          <p>Les plus Telechargés</p>
        </div>

        <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Tout</li>
              <li data-filter=".filter-app">Sotériologie</li>
              <li data-filter=".filter-card">Prophetique</li>
              <li data-filter=".filter-web">autre</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app" v-for="book in books.slice(0, 3)" :key="book.id">
            <div class="card" style="background: #0D0D0D;">
              <img :src="'assets/img/books/' + book.cover" class="card-img-top" alt="cover" />
              <!-- <img src="{{ asset('assets/img/books/'+book.cover}}" class="card-img-top" alt="..."> -->
              <div class="card-body">
                <span class="small text-muted date_plulication"><i class="fas fa-clock"></i> Publie le 20 juin 2020
                </span>
                <h6 class="card-title"><a href="" v-text="book.title"></a></h6>
                <p class="card-text" style="font-size: 13px; font-weight: normal">{{ readMore(book.description) }}</p>
                <button class="btn btn-warning btn-sm" @click="showBook(book.id)">Lire la suite</button>
              </div>
            </div>
          </div>

        </div>
        <router-link class="btn btn-block w-100" :to="{ name: 'books' }"
          style="border: 1px solid orange; color: #ffffff"> Voir tout les livres </router-link>
      </div>
      <show-book v-bind:bookToShow="bookToShow"></show-book>
    </section>
    <!-- ======= End Portfolio Section ======= -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" ref="contact" class="contact">
      <div class="container" data-aos="fade-up" style="background: #0D0D0D; padding: 15px;">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Nous Contacter</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Notre adresse</h3>
                  <p>Hainamosa, calle interior 5ta SANTO DOMINGO Este , RD</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Envoyez-nous un mail</h3>
                  <p>dorvilus@gmail.com<br>kenny@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Appelez-nous</h3>
                  <p>+1 849 607 7601<br>+509 4471 0749</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyez message</button></div>
            </form>
          </div>
        </div>

      </div>
    </section>
    <!-- End Contact Section -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      books: {},
      bookToShow: '',
      myModal: ''
    }
  },
  methods: {
    readMore(data) {
      return data.substring(0, 110) + '...';
    },
    showBook(id) {
      axios.get('api/books/' + id)
        .then((response) => {
          this.bookToShow = response.data;
        })
        .catch((error) => console.log(error));

      this.myModal = new bootstrap.Modal(document.getElementById('showBookModal'), {
        backdrop: true
      });
      this.myModal.show()
    },
    closeAddBookModal() {
      this.myModal.hide()
    },
  },
  created() {
    axios.get('api/books')
      .then((response) => {
        this.books = response.data.data;
      })
      .catch((error) => console.log(error));
  },
  mounted() {
    console.log("Index mounted.");
  },
};
</script>