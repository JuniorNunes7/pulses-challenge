<template>
    <div class="row">
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

                <div class="form-group mt-2">
                    <label for="dimension_id" class="form-label">Dimensão</label>
                    <select class="form-select" v-model="item.dimension_id" name="dimension_id" :class="{'is-invalid': errors.dimension_id}">
                        <option value="">Selecione a dimensão...</option>
                        <option :value="dimension.id" v-for="(dimension, i) in dimensions" :key="i">
                            {{ dimension.title }}
                        </option>
                    </select>
                    <div class="invalid-feedback" v-if="errors.dimension_id">
                        {{ errors.dimension_id[0] }}
                    </div>
                </div>

                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" v-model="item.active" 
                        :value="1" id="active" name="active" checked>
                    <label class="form-check-label" for="active">Ativo</label>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    <a href="/questions" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['edit', 'editData', 'old', 'errors', 'dimensions'],

    data () {
        return {
            item: {
                dimension_id: '',
                title: ''
            },
            action: '/questions'
        }
    },

    created () {
        if (this.edit) {
            this.item = this.editData;
            this.action = `/questions/${this.item.id}`
        }

        if (this.old.title) {
            this.item.title = this.old.title;
        }

        if (this.old.dimension_id) {
            this.item.dimension_id = this.old.dimension_id;
        }
    },

    computed: {
        csrfToken () {
            return window.csrfToken;
        }
    }
}
</script>