<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <!-- <button class="btn btn-success"> Add book </button> -->
          <add-book @book-added="refresh"></add-book>

          <!-- <div class="card-tools">
             
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-wrench"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="#" class="dropdown-item">Another action</a>
                <a href="#" class="dropdown-item">Something else here</a>
                <a class="dropdown-divider"></a>
                <a href="#" class="dropdown-item">Separated link</a>
              </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div> -->
          <input class="form-control mt-1" type="text" @keyup="search" placeholder="Search.." v-model="q">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="book in books" :key="book.id">
                    <th scope="row">{{ book.id }}</th>
                    <td>{{ book.title }}</td>
                    <td>{{ book.description }}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        @click="showEditBookModal(book.id)">
                        Modifier
                      </button>
                      <button type="button" class="btn btn-danger"
                        @click="deleteBook(book.id)">
                        Supprimer
                      </button>
                    </td>
                    <edit-book v-bind:bookToEdit="bookToEdit" @book-updated="refresh"></edit-book>
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
      books: '',
      bookToEdit: '',
      q: null
    }
  },
  methods: {
    showEditBookModal(id) {
      axios.get('api/books/' + id)
        .then((response) => {
          this.bookToEdit = response.data;
        })
        .catch((error) => console.log(error));

      this.myModal = new bootstrap.Modal(document.getElementById('editBookModal'), {
        backdrop: true
      });

      this.myModal.show()
    },

    closeAddBookModal() {
      this.myModal.hide()
    },

    refresh(books) {
      axios.get('api/books')
        .then((response) => {
          this.books = response.data.data;
        })
        .catch((error) => console.log(error));
      this.closeAddBookModal();
    },

    deleteBook(id){
      var fac;
        axios.delete('api/books/' + id)
        .then((response) => {
          this.refresh(fac);
        })
        .catch((error) => console.log(error));
    },
    search(){
       axios.get('api/books/' + this.q)
        .then((response) => {
          this.books = response.data;
        })
        .catch((error) => console.log(error));
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
    console.log("Books Admin mounted.");
  },
};
</script>