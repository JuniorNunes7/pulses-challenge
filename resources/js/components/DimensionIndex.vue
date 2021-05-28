<template>
    <div>
        <table class="table table-responsive table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="row">Título</th>
                    <th scope="row">Opções</th>
                </tr>
            </thead>
            <tbody v-if="items.length > 0">
                <tr v-for="(item, i) in items" :key="i">
                    <td>{{ item.title }}</td>
                    <td>
                        <a :href="`/dimensions/${item.id}/edit`" class="btn btn-sm btn-success">Editar</a>
                        <button class="btn btn-sm btn-danger" @click="remove(item)">Excluir</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <h3>Nenhum registro encontrado!</h3>
            </tbody>
        </table>

        <pagination :limit="2" :show-disabled="true" :data="paginationData" @pagination-change-page="changePage"></pagination>
    </div>
</template>

<script>
import pagination from 'laravel-vue-pagination'
import Swal from 'sweetalert2'

export default {
    components: { pagination },

    data () {
        return {
            items: [],
            paginationData: {},
            page: 1
        }
    },

    watch: {
        page () {
            this.getItems()
        }
    },

    created () {    
        this.getItems();
    },

    methods: {
        async getItems () {
            const page = this.page;
            const response = await axios.get('/dimensions/search', {params: {page}});
            this.items = response.data.data;
            this.paginationData = response.data;
        },

        changePage (page) {
            this.page = page;
        },

        remove (item) {
            Swal.fire({
                title: '',
                text: `Tem certeza que deseja remover a dimensão: '${item.title}'?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d0211c',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.delete(`/dimensions/${item.id}`).then((response) => {
                        this.items = this.items.filter((it) => it.id !== item.id);
                    }).catch((error) => {
                        const errorMsg = _.get(error, 'response.data.message', 'Erro ao remover a dimensão.');
                    });
                }
            });
        }
    }
}
</script>