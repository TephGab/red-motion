<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <!-- <button class="btn btn-success"> Add post </button> -->
          <add-post @post-added="refresh"></add-post>

          <input class="form-control mt-1" type="text" @keyup="search" placeholder="Search.." v-model="q">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table" style="width:100%">
                <thead class="thead-dark text-center">
                  <tr>
                    <th scope="col" style="width:5%">#</th>
                    <th scope="col" style="width:15%">Image Pricinpale</th>
                    <th scope="col" style="width:35%">Titre</th>
                    <th scope="col" style="width:35%">Contenu</th>
                    <th scope="col" style="width:10%">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="post in posts.data" :key="post.id" style="text-align: left">
                    <th scope="row" style="width:5%">{{ post.id }}</th>
                    <td style="width:15%"><img :src="'assets/img/blog/' + post.mainimage" class="img-responsive"
                        style="width: 100%" /></td>
                    <td style="width:35%; color: #FFC55C; font-weight: bold;">{{ post.title }}</td>
                    <td style="width:35%">{{ post.postcontent }}</td>
                    <td style="width:10%;">
                      <button type="button" class="btn" data-bs-toggle="modal" @click="showEditPostModal(post.id)"
                        title="Modifier">
                        <i class="fas fa-edit text-success"></i>
                      </button>
                      <button type="button" class="btn" @click="deletePost(post.id)" title="Supprimer">
                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                      </button>
                    </td>
                    <edit-post v-bind:postToEdit="postToEdit" v-bind:myModal="myModal" @post-updated="refresh"></edit-post>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
      </div>
      <Pagination :data="posts" @pagination-change-page="getResults" />
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</template>

<script>
export default {
  data() {
    return {
      posts: {},
      postToEdit: '',
      myModal: '',
      q: null
    }
  },
  methods: {
    showEditPostModal(id) {
      axios.get('api/blog/' + id)
        .then((response) => {
          this.postToEdit = response.data;
          console.log(response.data);
        })
        .catch((error) => console.log(error));

      this.myModal = new bootstrap.Modal(document.getElementById('editPostModal'), {
        backdrop: true
      });

      this.myModal.show()
    },

    closeAddPostModal() {
      this.myModal.hide()
    },

    refresh(posts) {
      axios.get('api/blog')
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => console.log(error));
    },

    deletePost(id) {
      this.$swal({
        title: 'Etes vous sure de vouloir supprimer?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui!'
      }).then((result) => {
        if (result.isConfirmed) {
          var fac;
          axios.delete('api/blog/' + id)
            .then((response) => {
              this.refresh(fac);
            })
            .catch((error) => console.log(error));
          this.$swal('Supprimé!','Post supprimé.','success')
        }
      })
    },

    search() {
      axios.get('api/blog/' + this.q)
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => console.log(error));
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
        console.log(this.posts);
      })
      .catch((error) => console.log(error));
  },

  mounted() {
    console.log("Blog Admin mounted.");
  },
};
</script>