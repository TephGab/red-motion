<template>
   <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div v-if="editMode">
                  <edit-counter class="card-title" @acs-updated="refreshUpdatedAcs" :id-to-update=idToUpdate></edit-counter>
                </div>
                <div v-else>
                  <create-counter class="card-title" @acs-added="refreshAcs" :user-id=userId></create-counter>
                </div>
                <div v-show="acs.acs" class="card-title ml-3" @click="copy">
                  <button class="btn btn-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" :title="tooltipTitle">
                     <i class="fas fa-copy"></i> {{ copyText }}</button>
                </div>
                <div class="card-tools">
                  <!-- Search -->
                  <!-- <div class="d-md-inline-block">
                    <button class="btn btn-sm ml-1 p-0 searchButton" data-widget="navbar-search" href="#" role="button">
                      <i class="fas fa-search"></i>
                    </button>
                    <div class="navbar-search-block">
                      <form class="form-inline">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                          <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div> -->
                  <!-- End Search -->
                  <div v-show="acs.acs" class="btn btn-tool text-danger deleteButton" @click="deleteAc">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </div>
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
 import Swal from 'sweetalert2'
export default {
     props: ['userId'],
      data() {
        return {
            acs: {},
            editMode: false,
            idToUpdate: '',
            tooltipTitle: 'Copy',
            copyText: 'Copy',
      };
      },

      methods:{
        deleteAc(){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
                 axios
            axios.delete('/api/counter/' + this.idToUpdate)
            .then((response) => {
              axios
              .get("/api/counter")
              .then((response) => {
                  this.acs = response.data;
                  this.acs.acs ? this.editMode = true : this.editMode = false;
                  this.idToUpdate = this.acs.acs.id;
                  });
                  console.log('deleted Succesfuly');
                  location.reload();
                  Swal.fire('Deleted!', 'Ac-counter has been reset.','success')
                  });
            }
          })
        },

         refreshAcs(acs){
            axios.get("/api/counter")
            .then((response) => {
                this.acs = response.data;
                this.acs.acs ? this.editMode = true : this.editMode = false;
                this.idToUpdate = this.acs.acs.id;
                this.copyText = 'Copy';
                });
        },
       
       refreshUpdatedAcs(acs){
             axios
            .get("/api/counter")
            .then((response) => {
                this.acs = response.data;
                this.acs.acs ? this.editMode = true : this.editMode = false;
                this.idToUpdate = this.acs.acs.id;
                this.copyText = 'Copy';
              });
        },

          copy() {
            try {
              navigator.clipboard.writeText(this.acs.acs.completedAc + this.acs.acs.restartedAc);
              this.copyText = 'Copied!';
              this.tooltipTitle = 'Copied!';
            } catch (e) {
              throw e
            }
          }
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