<template>
    <div class="container">
        <div class="form">
            <label for="name">Введите имя</label>
            <input v-model="name" class="form-control" type="text" id="name" >
            <label for="phone">Введите телефон (Введите в виде xxx-xxx-xx-xx)</label>
            <input v-model="phone" class="form-control" type="text" id="phone" >
            <label for="appeal">Введите обращение</label>
            <input v-model="appeal" class="form-control" type="text" id="appeal" >
            <input class="btn btn-success" type="button" value="создать" @click="submit_function" >
        </div>
        <input type="button" value="скачать файл" @click="get_file">
        <div v-if="errors" class="container">
            <p class="text-danger">{{ errors }}</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                name : null,
                phone : null,
                appeal : null,
                response_form : null,
                errors : []
            }
        },
        updated() {
            //Во время обновления показать сообщение "Заявка добавлена"
            if(this.response_form != null) {
                alert(this.response_form);
            }
        },
        methods : {
            submit_function : function() {
                axios
                    //Отправляем post запрос с данными на маршрут /index
                    .post("/index",{
                        "name" : this.name,
                        "phone" : this.phone,
                        "appeal" : this.appeal
                    })
                    .then(response => {
                        this.response_form = response.data.data;
                        this.errors = response.data.error;
                    })
                    .catch(error => {
                        this.errors=error;
                        console.log(error);
                    })
            },
            get_file : function() {
                axios
                    .get('/getfile')
                    .then(response => {
                        this.errors=response.data.error;
                    })
                    .catch(error => {
                        this.errors=response.data.error;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
