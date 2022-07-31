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
                                        <input type="text" class="form-control" id="title" v-model="bookToEdit.title">

                                        <label for="title" class="form-label">Description</label>
                                        <textarea class="form-control" col="5" v-model="bookToEdit.description"></textarea>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeAddBookModal">Close</button>
                            <button type="button" class="btn btn-primary" @click="updateBook">Ajouter</button>
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
    methods: {
        updateBook(){
            axios.patch('api/books/'+this.bookToEdit.id, {title:this.bookToEdit.title, description: this.bookToEdit.description })
            .then((response) => {
                this.$emit('book-updated', response)
                })
            .catch((error) => console.log(error));
        },
    },
    mounted() {
        console.log("Edit Book Admin mounted.");
    },
};
</script>