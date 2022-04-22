<template>
    <div>
        <button type="button" class="btn btn-primary" @click="editModal" data-backdrop="static">
            <i class="fa fa-plus"></i> add more access codes
        </button>

       <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="acsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Updating acs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                        <textarea class="form-control" id="accessCodes" rows="6" v-model="accessCode"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
            }
        },

    methods: {
         
        updateAcs(){
            axios
                .patch("/api/counter/"+this.idToUpdate, { acs: this.accessCode})
                .then((response) => {
                    $("#acsModal").modal("hide");
                })
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
        },
  },

  mounted() {
    console.log(this.idToUpdate);
    console.log("CounterEdit mounted.");
  },
};
</script>