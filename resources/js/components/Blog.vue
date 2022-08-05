<template>
    <!-- ======= About Section ======= -->
    <section class="text-white mt-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-5 pt-3 pt-lg-0 content" v-for="post in posts.data" :key="post.id">
                    <div class="card" style="background: #0D0D0D">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img :src="'assets/img/blog/' + post.mainimage" 
                                class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body" style="color: #fff">
                         <p class="small text-muted" style="font-size: 11px;"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ formatDate(post.created_at) }}</p>
                            <h5 class="card-title font-weight-bold"><a>{{ post.title }}</a></h5>
                            <p class="font-weight-normal"  style="font-weight: normal; font-size: 13px; color: #D1D5DB">
                               {{ post.postcontent }}
                            </p>
                            <!-- <hr class="my-4" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
</template>

<script>
import moment from 'moment';
export default {
  data() {
    return {
      posts: {},
      postToShow: '',
      myModal: ''
    }
  },
  methods: {
    readMore(data) {
      return data.substring(0, 110) + '...';
    },
    showPost(id) {
      axios.get('api/posts/' + id)
        .then((response) => {
          this.postToShow = response.data;
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
      axios.get('api/blog?page=' + page)
        .then(response => {
          this.posts = response.data;
        });
    },
  },
  created() {
    axios.get('api/blog')
      .then((response) => {
        this.posts = response.data;
      })
      .catch((error) => console.log(error));
  },
  mounted() {
    console.log("Blog component mounted.");
  },
};
</script>