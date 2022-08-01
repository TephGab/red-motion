<template>
    <div class="row">
        <div class="col-md-12">
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="showBookModal" tabindex="-1"
                aria-labelledby="showBookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background: #0D0D0D">
                        <div class="modal-header text-center" style="display: flex; justify-content: center; align-items: center; color: #C68101; text-align: center;">
                            <div></div>
                            <h5 class="modal-title" id="showBookModalLabel" style="border: 1px solid red;">{{ bookToShow.title }}</h5>
                            <button type="button" class="btn-close" aria-label="Close"
                                @click="closeAddBookModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="row">
                                    <div class="col-md-5">
                                        <div>
                                            <div>
                                                <img :src="'assets/img/books/' + bookToShow.cover"
                                                    class="img-responsive" style="width: 100%" />
                                            </div>
                                        </div>
                                        <!-- <div id="cover" class="form-text">We'll never share your email with anyone else.</div> -->
                                    </div>
                                    <div class="col-md-7" style="color: #D1D5DB">
                                       <div>
                                        {{ bookToShow.description }}
                                       </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeAddBookModal">Close</button>
                            <!-- <button type="button" class="btn btn-primary" @click="updateBook">Modifier</button> -->
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
    props: ['bookToShow'],
    mounted() {
        console.log("ShowBook component mounted.");
    },
};
</script>