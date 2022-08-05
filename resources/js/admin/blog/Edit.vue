<template>
    <div class="row">
        <div class="col-md-12">
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="editPostModal" tabindex="-1"
                aria-labelledby="editPostModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                            <button type="button" class="btn-close" aria-label="Close"
                                @click="closeAddPostModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="row" enctype="multipart/form-data">
                                    <div class="col-md-4">
                                        <div>
                                            <label for="mainimage" class="form-label">Image principale</label>
                                            <div v-if="mainimagePreview">
                                                <img :src="mainimagePreview" class="img-responsive"
                                                    style="width: 100%" />
                                            </div>
                                            <div v-else>
                                                <img :src="'assets/img/blog/' + postToEdit.mainimage"
                                                    class="img-responsive" style="width: 100%" />
                                            </div>
                                            <input type="file" class="form-control" @change="imageSelected">
                                        </div>
                                        <!-- <div id="mainimage" class="form-text">We'll never share your email with anyone else.</div> -->
                                    </div>
                                    <div class="col-md-8">

                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" v-model="postToEdit.title">

                                        <label for="title" class="form-label">postcontent</label>
                                        <textarea class="form-control" v-model="postToEdit.postcontent"></textarea>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeAddPostModal">Close</button>
                            <button type="button" class="btn btn-primary" @click="updatePost">Modifier</button>
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
    props: ['postToEdit', 'myModal'],
    data() {
        return {
            mainimage: null,
            mainimagePreview: ''
        }
    },
    methods: {
        imageSelected(e) {
            this.mainimage = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.mainimage);
            reader.onload = e => {
                this.mainimagePreview = e.target.result;
            };
        },

        updatePost() {
            axios.patch('api/blog/' + this.postToEdit.id, { title: this.postToEdit.title, postcontent: this.postToEdit.postcontent, mainimage: this.mainimage })
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
                    this.myModal.hide();
                })
                .catch((error) => console.log(error));
        },
    },
    mounted() {
        console.log("Edit Post Admin mounted.");
    },
};
</script>