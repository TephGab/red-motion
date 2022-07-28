<template>
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" @click="showAddBookModal">
                Ajouter
            </button>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="addBookModal" tabindex="-1"
                aria-labelledby="addBookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBookModalLabel">New book</h5>
                            <button type="button" class="btn-close" aria-label="Close" @click="closeAddBookModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <label for="cover" class="form-label">Cover</label>
                                            <input type="file" class="form-control" id="cover">
                                        </div>
                                        <!-- <div id="cover" class="form-text">We'll never share your email with anyone else.</div> -->
                                    </div>
                                    <div class="col-md-8">

                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" v-model="title">

                                        <label for="title" class="form-label">Description</label>
                                        <textarea class="form-control" col="5" v-model="description"></textarea>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeAddBookModal">Close</button>
                            <button type="button" class="btn btn-primary" @click="addBook">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</template>

<script>
export default {
    data() {
        return {
            title: '',
            description: '',
            cover: null,
            books: '',
            myModal: ''
        }
    },
    methods: {
        showAddBookModal() {
            this.myModal = new bootstrap.Modal(document.getElementById('addBookModal'), {
                backdrop: true
            });
            this.myModal.show()
        },
        closeAddBookModal() {
            this.myModal.hide()
        },
        addBook(){
            const data = new FormData()
            data.append("title", this.title)
            data.append("description", this.description)
            axios.post('api/books/', data)
            .then((response) => {
                this.$emit('book-added', response)
                this.closeAddBookModal()
                })
            .catch((error) => console.log(error));
        },
    },
    mounted() {
        console.log("Create Book Admin mounted.");
    },
};
</script>