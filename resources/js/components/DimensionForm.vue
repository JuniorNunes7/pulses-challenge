<template>
    <div class="row mt-5">
        <div class="col-lg-6 col">
            <form :action="action" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="_token" :value="csrfToken">
                <input type="hidden" name="_method" value="PUT" v-if="edit">

                <div class="form-group">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" :class="{'is-invalid': errors.title}" 
                        name="title" placeholder="Escreva o título aqui..." v-model="item.title">
                    <div class="invalid-feedback" v-if="errors.title">
                        {{ errors.title[0] }}
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    <a href="/dimensions" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['edit', 'editData', 'old', 'errors'],

    data () {
        return {
            item: {
                title: ''
            },
            action: '/dimensions'
        }
    },

    created () {
        if (this.edit) {
            this.item = this.editData;
            this.action = `/dimensions/${this.item.id}`
        }

        if (this.old.title) {
            this.item.title = this.old.title;
        }
    },

    computed: {
        csrfToken () {
            return window.csrfToken;
        }
    }
}
</script>