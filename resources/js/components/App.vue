<template>
	<div class="data">
		<app-datatable 
      :items="items" 
      :fields="fields" 
      :meta="meta" 
      @per_page="handlePerPage" 
      @pagination="handlePagination" 
      @search="handleSearch" 
      @sort="handleSort"/>
	</div>
</template>

<script>
	import Datatable from './DataComponent.vue'

	export default {
		created() {
      this.loadPostsData()
    },
    data() {
      return {
        fields: [
            {key: 'title', sortable: true},
            {key: 'author', sortable: true},
            {key: 'category', sortable: true},
            {key: 'created_at', sortable: true}
        ],
        items: [], //DEFAULT VALUE DARI ITEMS ADALAH KOSONG
        meta: [], //JUGA BERLAKU UNTUK META
        current_page: 1, //DEFAULT PAGE YANG AKTIF ADA PAGE 1
        per_page: 10, //DEFAULT LOAD PERPAGE ADALAH 10
        search: '',
        sortBy: 'created_at', //DEFAULT SORTNYA ADALAH CREATED_AT
        sortByDesc: false //ASCEDING
      }
    },
    components: {
       'app-datatable': Datatable //REGISTER COMPONENT DATATABLE
    },
    methods: {
      //METHOD INI AKAN MENGHANDLE REQUEST DATA KE API
      loadPostsData() {
        let current_page = this.search == '' ? this.current_page:1
        //LAKUKAN REQUEST KE API UNTUK MENGAMBIL DATA POSTINGAN
        axios.get(`/api/posts`, {
            //KIRIMKAN PARAMETER BERUPA PAGE YANG SEDANG DILOAD, PENCARIAN, LOAD PERPAGE DAN SORTING.
            params: {
                page: current_page,
                per_page: this.per_page,
                q: this.search,
                sortby: this.sortBy,
                sortbydesc: this.sortByDesc ? 'DESC':'ASC'
            }
        })
        .then((response) => {
            //JIKA RESPONSENYA DITERIMA
            let getData = response.data.data
            this.items = getData.data //MAKA ASSIGN DATA POSTINGAN KE DALAM VARIABLE ITEMS
            //DAN ASSIGN INFORMASI LAINNYA KE DALAM VARIABLE META
            this.meta = {
                total: getData.total,
                current_page: getData.current_page,
                per_page: getData.per_page,
                from: getData.from,
                to: getData.to
            }
        })
      },
      //JIKA ADA EMIT TERKAIT LOAD PERPAGE, MAKA FUNGSI INI AKAN DIJALANKAN
      handlePerPage(val) {
          this.per_page = val //SET PER_PAGE DENGAN VALUE YANG DIKIRIM DARI EMIT
          this.loadPostsData() //DAN REQUEST DATA BARU KE SERVER
      },
      //JIKA ADA EMIT PAGINATION YANG DIKIRIM, MAKA FUNGSI INI AKAN DIEKSEKUSI
      handlePagination(val) {
          this.current_page = val //SET CURRENT PAGE YANG AKTIF
          this.loadPostsData()
      },
      //JIKA ADA DATA PENCARIAN
      handleSearch(val) {
          this.search = val //SET VALUE PENCARIAN KE VARIABLE SEARCH
          this.loadPostsData() //REQUEST DATA BARU
      },
      //JIKA ADA EMIT SORT
      handleSort(val) {
          //MAKA SET SORT-NYA
          this.sortBy = val.sortBy
          this.sortByDesc = val.sortDesc

          this.loadPostsData() //DAN LOAD DATA BARU BERDASARKAN SORT
      }
    }
	}
</script>