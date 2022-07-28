<template>
  <form @submit.prevent="addBook">
  <div class="form-group">
    <label for="exampleInputEmail1">Titre</label>
    <input type="text" class="form-control" v-model="form.title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" v-model="form.description"></textarea>
  </div>
   <div class="custom-file">
    <input type="file" class="custom-file-input" v-on:change="onChange">
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</template>

<script>
import { onMounted, reactive } from 'vue';
import useBooks from "../../services/bookservices";

export default {

    setup() {
       const form = reactive({
        title: "",
        description: "",
        cover: ""
       });

    const { storeBook } = useBooks();

       const addBook = async () =>{
        console.log({...form})
        //await storeBook({...form});
       }

        return{
            form,
            addBook
        }
    },
}
</script>