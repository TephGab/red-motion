import { ref } from "vue";
import axios from "axios";

export default function useBooks(){
    const books = ref([]);

    const getBooks = async() => {
        let response = await axios.get('/api/books');
        books.value = response.data.data;
    }

    const storeBook = async(data) => {
        await axios.post('/api/books', data);
    }
    
    const readMore = (data) => {
       return data.substring(0, 110) + '...';
    }

    return{
        books,
        getBooks,
        storeBook,
        readMore
    }
}