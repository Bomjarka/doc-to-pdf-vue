<template>
    <h1>Conversion Page</h1>
    <label for="file">Choose file: </label>
    <input type="file" id="file" v-on:change="uploadFile">
    <div v-if="vars.length > 0 && isFileUploaded === true">
        <br>
        <label for="vars">Available variables: </label>
        <input type="text" id="vars" v-model="vars" disabled>
        <br>
        <label for="template">Print your template: </label>
        <input type="text" id="template" v-model="template" placeholder="{&quot;var&quot;:&quot;value&quot;}">
    </div>
    <br>
    <button v-if="isFileUploaded" v-on:click="convertFile">Convert file</button>
</template>

<script>
import axios from 'axios'

axios.defaults.withCredentials = true

export default {
    data() {
        return {
            template: [],
            vars: [],
            isFileUploaded: false,
            file: null
        }
    },
    methods: {
        uploadFile: function () {
            let data = new FormData()
            let file = document.getElementById('file').files[0]
            data.append('file', file)
            this.file = file;
            axios.post('/api/get-vars', data).then(response => {
                this.vars = response.data
                this.isFileUploaded = true
            }).catch((error) => {
                alert(`Error ${error.message}`)
            })
        },
        convertFile: function () {
            axios.get('/api/convert', {
                params: {
                    'template': this.template,
                    'fileName': this.file.name
                },
                responseType: 'arraybuffer'
            }).then(response => {
                console.log(response.data)
                let blob = new Blob([response.data], {type: 'application/pdf'})
                let link = document.createElement('a')
                link.href = window.URL.createObjectURL(blob)
                link.download = 'test.pdf'
                link.click()
            }).catch((error) => {
                alert(`Error ${error.message}`)
            })
        }
    }
}

</script>
