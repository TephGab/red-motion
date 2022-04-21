<template>
     <!-- Main content -->
    <section class="content mt-1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Counter</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
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
                     {{ acs.totalCompleted }}
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
                     {{ acs.totalRestarted }}
                 </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calculator"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total</span>
                <span class="info-box-number">
                    {{ acs.totalAcs }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clone"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Duplicate</span>
                <span class="info-box-number">0</span>
              </div>
            
            </div>
          
          </div> -->
          <!-- /.col -->
                <!-- Info box end -->
                  <div class="col-md-12">
                       <div>
                           <create-counter @asc-add="refreshAcs" :user-id=this.userId :use-edit-mode=this.useEditMode></create-counter>
                       </div>
                    <div v-if="!acs">
                       <div>No data</div>
                    </div>
                   <div v-else>
                        <div v-for="(ac, index) in acs" :key="index">
                      <div> {{ ac.completedAc }} </div>
                      <div> {{ ac.restartedAc }} </div>
                    </div>
                   </div>
                    <!-- <counter-create/> -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
               <!-- <div class="row">
                 <div class="col-md-12">
                   <button class="btn btn-primary btn-block">Count & classify</button>
                 </div>
               </div> -->
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</template>

<script>
    export default {
        props: ['userId'],
        data() {
        return {
            acs: null,
            useEditMode: false,
        };
        },
        methods:{
              acFormater(acs){
                let allAcs = acs;
                let removeWords = allAcs.toString().replace(/"|[|]/gi, " ");
                let removeSpaces = removeWords.toString().replace(/\s+|/gi, '');
                return removeSpaces;
            },
            refreshAcs(acs){
                this.acs = acs.data
            }
        },
        created() {
        axios
            .get("/api/counter")
            .then((response) => {
                this.acs = response.data;
                this.acs ? this.useEditMode = true : this.useEditMode = false;
                console.log(this.id+'le fcking id');
                });
        },

        mounted() {
            console.log('CounterCreate mounted.')
        }
    }
</script>
