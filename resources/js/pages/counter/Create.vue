<template>
    <div class="container">
              
                    <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Add Access codes
                        </button> -->
                         <button type="button" class="btn btn-primary" @click="editmode ? editModal() : newModal()" data-backdrop="static">
                            <i class="fa fa-plus"></i> Add access codes
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="acsModal" tabindex="-1" aria-labelledby="acsModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <textarea class="form-control" rows="5" v-model="acs"></textarea>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" @click="editmode ? updateAcs() : addAcs()"> {{ editmode ? "Update" : "Add" }}</button>
                            </div>
                            </div>
                        </div>
                        </div>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'useEditMode'],
        data() {
        return {
            acs: "",
            editmode: this.useEditMode
        };
        },

        methods:{
            storeAcs(){
                console.log(this.userId);
                axios
                .post("/api/counter",{acs: this.acs, id: this.userId })
                .then((response) => (this.$emit('acs-added', response)));
            },
            updateAcs(){

            },
            newModal() {
               // this.editmode = false;
                $("#acsModal").modal("show");
                $("#acsModal").modal("handleUpdate");
                $("#acsModal").data("bs.modal")._config.backdrop = "static";
             },
            editModal() {
               // this.editmode = true;
                $("#acsModal").modal("show");
                $("#acsModal").modal("handleUpdate");
                $("#acsModal").data("bs.modal")._config.backdrop = "static";
            },
        },

        mounted() {
              console.log(this.userId);
            console.log('CounterIndex mounted.')
        }
    }
</script>
