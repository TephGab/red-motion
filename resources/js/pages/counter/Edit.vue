<template>
    <div>
        <button type="button" class="btn btn-default btn-xs" data-backdrop="static" @click="editModal">
            <i class="fa fa-plus"></i> add more access codes
        </button>

       <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="acsModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="opacity: 0.9">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Updating acs</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                        <textarea class="form-control" id="accessCodes" rows="6" v-model="accessCode"></textarea>
                         <span v-if="errors.acs" class="text-warning text-italique  error">{{ errors.acs[0] }}</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="updateAcs">Update</button>
                </div>
            </div>
        </div>
        </div>
       <!-- Modal end -->
    </div>
</template>

<script>
export default {
    props: ['idToUpdate'],

      data() {
        return {
             accessCodes: "",
             accessCode: "",
             errors: [],
            }
        },

    methods: {
         
        updateAcs(){
            axios
                .patch("/api/counter/"+this.idToUpdate, { acs: this.accessCode})
                .then((response) => {
                    this.$emit('acs-updated', response);
                    $("#acsModal").modal("hide");
                    console.log('acs has beeen updated successfuly');
                })
                 .catch(error => {
                        this.errors = error.response.data.errors;
                });
        },
     
        editModal() {
            axios
            .get('/api/counter/'+this.idToUpdate+'/edit')
            .then((response) => {
                let completedAcString = response.data.completedAc.toString();
                let restartedAcString = response.data.restartedAc.toString();
                this.accessCodes = completedAcString + restartedAcString;
                });
            $("#acsModal").modal("show");
            $("#acsModal").modal("handleUpdate");
            $("#acsModal").modal({"backdrop": "static"});
        },
  },

  mounted() {
    console.log(this.idToUpdate);
    console.log("CounterEdit mounted.");
  },
};
</script>