<template>
    <div>
        <button type="button" class="btn btn-primary" @click="newModal" data-backdrop="static">
            <i class="fa fa-plus"></i> Add access codes
        </button>

       <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="acsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Adding acs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                        <textarea class="form-control" id="accessCodes" rows="6" v-model="accessCodes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="storeAcs">Add</button>
                </div>
            </div>
        </div>
        </div>
       <!-- Modal end -->
    </div>
</template>

<script>
export default {
    props: ['userId'],
      data() {
        return {
            accessCodes: "",
        }
        },

    methods: {
        storeAcs() {
        axios
            .post("/api/counter", { acs: this.accessCodes, id: this.userId })
            .then((response) => { 
                console.log('acs created successfuly');
                 $("#acsModal").modal("hide");
                });
        },
        newModal() {
            $("#acsModal").modal("show");
            $("#acsModal").modal("handleUpdate");
            // $("#acsModal").data("bs.modal")._config.backdrop = "static";
        },
  },

  mounted() {
    console.log(this.userId);
    console.log("CounterCreate mounted.");
  },
};
</script>