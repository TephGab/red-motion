<template>
    <div>
           
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Mes livvres</h2>
          <!-- <p>Les plus Telechargés</p> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Tout</li>
              <li data-filter=".filter-app">Sotériologie</li>
              <li data-filter=".filter-card">Prophetique</li>
              <li data-filter=".filter-web">autre</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app" v-for="book in books" :key="book.id">
            <div class="card" style="background: #0D0D0D;">
             <img :src="'assets/img/books/'+book.cover" class="card-img-top" alt="cover" />
              <!-- <img src="{{ asset('assets/img/books/'+book.cover}}" class="card-img-top" alt="..."> -->
              <div class="card-body">
                 <span class="small text-muted date_plulication"><i class="fas fa-clock"></i> Publie le 20 juin 2020 </span>
                <h6 class="card-title"><a href="" v-text="book.title"></a></h6>
                <p class="card-text" style="font-size: 13px; font-weight: normal">{{ readMore(book.description)}}</p>
                <button class="btn btn-warning btn-sm">Lire la suite</button>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </section>
    <!-- ======= End Portfolio Section ======= -->
    </div>
</template>

<script>
export default {
      data() {
    return {
      books: ''
    }
  },
  methods:{
      readMore(data){
       return data.substring(0, 110) + '...';
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
        console.log("Books component mounted.");
    },
};
</script>