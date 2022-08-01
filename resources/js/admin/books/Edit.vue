<template>
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="editBookModal" tabindex="-1"
                aria-labelledby="editBookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editBookModalLabel">Edit book</h5>
                            <button type="button" class="btn-close" aria-label="Close"
                                @click="closeAddBookModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="row" enctype="multipart/form-data">
                                    <div class="col-md-4">
                                        <div>
                                            <label for="cover" class="form-label">Cover</label>
                                            <div v-if="coverPreview">
                                                <img :src="coverPreview" class="img-responsive" style="width: 100%" />
                                            </div>
                                            <div v-else>
                                                <img :src="'assets/img/books/' + bookToEdit.cover"
                                                    class="img-responsive" style="width: 100%" />
                                            </div>
                                            <input type="file" class="form-control" @change="imageSelected">
                                        </div>
                                        <!-- <div id="cover" class="form-text">We'll never share your email with anyone else.</div> -->
                                    </div>
                                    <div class="col-md-8">

                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" v-model="bookToEdit.title">

                                        <label for="title" class="form-label">Description</label>
                                        <textarea class="form-control" v-model="bookToEdit.description"></textarea>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeAddBookModal">Close</button>
                            <button type="button" class="btn btn-primary" @click="updateBook">Modifier</button>
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
    props: ['bookToEdit'],
    data() {
        return {
            cover: null,
            coverPreview: ''
        }
    },
    methods: {
        imageSelected(e) {
            this.cover = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.cover);
            reader.onload = e => {
                this.coverPreview = e.target.result;
            };
        },

        updateBook() {
            axios.patch('api/books/' + this.bookToEdit.id, { title: this.bookToEdit.title, description: this.bookToEdit.description, cover: this.cover })
                .then((response) => {
                    this.$emit('book-updated', response);
                      this.$swal({
                text: 'Modifications effectué!',
                toast: true,
                position: 'top-right',
                icon: 'success',
                color: '#000',
                padding: '0',
                showConfirmButton: false,
                timer: 2500
                });
                })
                .catch((error) => console.log(error));
        },
    },
    mounted() {
        console.log("Edit Book Admin mounted.");
    },
};
</script>