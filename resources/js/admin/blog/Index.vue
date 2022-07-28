<template>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <router-link class="btn btn-success" :to="{ name: 'blogadm.create'}"> New post </router-link>
                <!-- <button class="btn btn-success"> New post </button> -->

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
                    <div v-for="post in posts" :key="post.id">
                      {{ post.title }}
                    </div>
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
import { onMounted } from '@vue/runtime-core';
import useBlog from "../../services/blogservices";

export default {
    setup() {
        const { posts, getBlogPosts } = useBlog();

        onMounted(getBlogPosts);

        return{
            posts
        }
    },
}
</script>