<template>
    <div class="row">
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" @click="showAddPostModal">
                Add new post
            </button>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="addPostModal" tabindex="-1"
                aria-labelledby="addPostModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPostModalLabel">New post</h5>
                            <button type="button" class="btn-close" aria-label="Close" @click="closeAddPostModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="row" enctype="multipart/form-data">
                                    <div class="col-md-4">
                                        <div>
                                            <label for="mainimage" class="form-label">Image Principale</label>
                                           <div v-show="mainimagePreview">
                                            <img :src="mainimagePreview" class="img-responsive" style="width: 100%" />
                                           </div>
                                            <input type="file" class="form-control" @change="imageSelected">
                                        </div>
                                        <!-- <div id="mainimage" class="form-text">We'll never share your email with anyone else.</div> -->
                                    </div>
                                    <div class="col-md-8">

                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" class="form-control" id="title" v-model="title">

                                        <label for="title" class="form-label">Contenu</label>
                                        <textarea class="form-control" col="5" v-model="postcontent"></textarea>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeAddPostModal">Close</button>
                            <button type="button" class="btn btn-primary" @click="addPost">ajouter post</button>
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
import VueSweetalert2 from 'vue-sweetalert2';
export default {
    data() {
        return {
            title: '',
            postcontent: '',
            posts: {},
            mainimage: '',
            mainimagePreview: '',
            myModal: ''
        }
    },
    methods: {
        showAddPostModal() {
            this.myModal = new bootstrap.Modal(document.getElementById('addPostModal'), {
                backdrop: true
            });
            this.myModal.show()
        },
        closeAddPostModal() {
            this.myModal.hide()
        },
           imageSelected(e){
            this.mainimage = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.mainimage);
            reader.onload = e => {
            this.mainimagePreview = e.target.result;
               };
        },

        addPost(){
            const data = new FormData()
            data.append("title", this.title)
            data.append("postcontent", this.postcontent)
            data.append("mainimage", this.mainimage)
            
            axios.post('api/blog', data)
            .then((response) => {
                this.$emit('post-added', response);
                this.myModal.hide();
                 this.$swal({
                text: 'Nouveau post enregistré!',
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
        console.log("Create post Admin mounted.");
    },
};
</script>