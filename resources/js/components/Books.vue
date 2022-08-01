<template>
  <div>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Mes livvres</h2>
          <!-- <p>Les plus Telechargés</p> -->
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
          <div class="col-lg-3 col-md-3 portfolio-item filter-app" v-for="book in books.data" :key="book.id">
            <div class="card" style="background: #0D0D0D;">
              <img :src="'assets/img/books/' + book.cover" class="card-img-top" alt="cover" />
              <div class="card-body">
                <span class="small text-muted date_plulication"><i class="fas fa-clock"></i>
                  {{ formatDate(book.created_at) }}
                </span>
                <h6 class="card-title"><a href="" v-text="book.title"></a></h6>
                <p class="card-text" style="font-size: 13px; font-weight: normal">{{ readMore(book.description) }}</p>
                <button class="btn btn-warning btn-sm" @click="showBook(book.id)">Lire la suite</button>
              </div>
            </div>
          </div>

        </div>
        <Pagination :data="books" @pagination-change-page="getResults" />
      </div>
      <show-book v-bind:bookToShow="bookToShow"></show-book>
    </section>
    <!-- ======= End Portfolio Section ======= -->
  </div>
</template>

<script>
import moment from 'moment';
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
    formatDate(date) {
      moment.locale('fr');
      return moment(date).format('D MMMM, YYYY')
    },
    getResults(page = 1) {
      axios.get('api/books?page=' + page)
        .then(response => {
          this.books = response.data;
        });
    },
  },
  created() {
    axios.get('api/books')
      .then((response) => {
        this.books = response.data;
      })
      .catch((error) => console.log(error));
  },
  mounted() {
    console.log("Books component mounted.");
  },
};
</script>