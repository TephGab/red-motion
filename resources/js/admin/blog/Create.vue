<template>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form @submit.prevent="addPost">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Titre </label>
                        <input type="text" class="form-control" id="titre"  placeholder="Titre" v-model="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" rows="5" v-model="blogtext"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
</template>

<script>
import { onMounted , reactive } from '@vue/runtime-core';
import useBlog from "../../services/blogservices";

export default {
    setup() {
         const form = reactive({
        title: "", 
        blogtext: "",
        img: "default.jpg",
        errors: []
        });
       
        const { posts, storeBlog } = useBlog();

        const addPost = async () =>{
            storeBlog({...form});
            // console.log({...form});
        }

        return{
            posts,
            addPost
        }
    },
}
</script>