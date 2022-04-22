<template>
   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div v-if="editMode">
                  <edit-counter class="card-title" :id-to-update=idToUpdate></edit-counter>
                </div>
                <div v-else>
                  <create-counter class="card-title" :user-id=userId></create-counter>
                </div>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <!-- info box start -->
                 <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed</span>
                <span class="info-box-number">
                     {{ acs.acs ? acs.acs.completedAc.length : '0' }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-undo"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Restarted</span>
                 <span class="info-box-number">
                     {{ acs.acs ? acs.acs.restartedAc.length : '0' }}
                 </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calculator"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total</span>
                <span class="info-box-number">
                   {{ acs.acs ? acs.acs.completedAc.length + acs.acs.restartedAc.length : '0' }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
                <!-- Info box end -->
                  <div class="col-md-12" v-for="(ac, index) in acs" :key="index">
                   <div>{{ ac.completedAc.toString() }}</div>
                   <div>{{ ac.restartedAc.toString() }}</div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
            
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
</template>

<script>

export default {
     props: ['userId'],
      data() {
        return {
            acs: {},
            editMode: false,
            idToUpdate: ''
      };
      },

      created() {
        axios
            .get("/api/counter")
            .then((response) => {
                this.acs = response.data;
                this.acs.acs ? this.editMode = true : this.editMode = false;
                this.idToUpdate = this.acs.acs.id;
                });
        },

        mounted() {
            console.log('CounterIndex mounted.')
        }
}
</script>