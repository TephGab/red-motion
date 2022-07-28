import { ref } from "vue";
import axios from "axios";

export default function useBlogs(){
    const posts = ref([]);

    const getBlogPosts = async() => {
        let response = await axios.get('/api/blogadm');
        posts.value = response.data.data;
    }

    const storeBlog = async(data) => {
        await axios.post('/api/blogadm', data);
    }

    return{
        posts,
        getBlogPosts,
        storeBlog
    }
}