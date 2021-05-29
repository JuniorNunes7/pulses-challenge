<template>
    <div>
        <div class="form-group col-lg-6 col row">
            <label for="dimension-filter" class="col col-2 col-form-label">Filtro</label>
            <div class="col">
                <select class="form-select" v-model="filters.selectedDimension" name="dimension-filter">
                    <option value="">Selecione a dimensão...</option>
                    <option :value="dimension.id" v-for="(dimension, i) in dimensions" :key="i">
                        {{ dimension.title }}
                    </option>
                </select>
            </div>
        </div>
        <div v-if="hasFilter">
            <span class="clear-filters" @click="clearFilters">Limpar filtros</span>
        </div>
        <table class="table table-responsive table-hover mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="row">Status</th>
                    <th scope="row">Dimensão</th>
                    <th scope="row">Título</th>
                    <th scope="row">Opções</th>
                </tr>
            </thead>
            <tbody v-if="items.length > 0">
                <tr v-for="(item, i) in items" :key="i">
                    <td>
                        <span v-if="item.active" class="badge bg-success pointer" @click="toggleStatus(item)">Ativo</span>
                        <span v-else class="badge bg-danger pointer" @click="toggleStatus(item)">Inativo</span>
                    </td>
                    <td>{{ item.dimension.title }}</td>
                    <td>{{ item.title }}</td>
                    <td>
                        <a :href="`/questions/${item.id}/edit`" class="btn btn-sm btn-success">Editar</a>
                        <button class="btn btn-sm btn-danger" @click="remove(item)">Excluir</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <h3 class="text-center mt-4">Nenhum registro encontrado!</h3>
            </tbody>
        </table>

        <pagination :limit="2" :show-disabled="true" :data="paginationData" @pagination-change-page="changePage"></pagination>
    </div>
</template>

<script>
import pagination from 'laravel-vue-pagination'
import Swal from 'sweetalert2'

export default {
    props: ['dimensions'],

    components: { pagination },

    data () {
        return {
            items: [],
            paginationData: {},
            page: 1,
            filters: {
                selectedDimension: ''
            }
        }
    },

    watch: {
        page () {
            this.getItems()
        },

        'filters.selectedDimension' (val) {
            this.getItems();
        }
    },

    created () {    
        this.getItems();
    },

    methods: {
        async getItems () {
            const page = this.page;
            const dimension = this.filters.selectedDimension;
            const response = await axios.get('/questions/search', {params: {page, dimension}});
            this.items = response.data.data;
            this.paginationData = response.data;
        },

        clearFilters () {
            this.filters = _.mapValues(this.filters, () => '');
            this.getItems();
        },

        changePage (page) {
            this.page = page;
        },

        toggleStatus (item) {
            const data = {active: !item.active};
            axios.put(`/questions/${item.id}`,data).then(() => {
                item.active = !item.active;
            }).catch((error) => {
                const errorMsg = _.get(error, 'response.data.message', 'Erro ao atualizar a pergunta.');
                Swal.fire('', errorMsg, 'error');
            });
        },

        remove (item) {
            Swal.fire({
                title: '',
                text: `Tem certeza que deseja remover a pergunta: '${item.title}'?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d0211c',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.delete(`/questions/${item.id}`).then((response) => {
                        this.items = this.items.filter((it) => it.id !== item.id);
                    }).catch((error) => {
                        const errorMsg = _.get(error, 'response.data.message', 'Erro ao remover a pergunta.');
                        Swal.fire('', errorMsg, 'error');
                    });
                }
            });
        }
    },

    computed: {
        hasFilter () {
            return _.some(this.filters, (p) => Boolean(p));
        }
    }
}
</script>