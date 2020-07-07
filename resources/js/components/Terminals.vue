<template>
<div class="row">

    <div class="col-md-2">

        <div class="card text-center shadow none-border">
            <div class="card-header">
                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-geo-alt text-tomato" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </div>
            <ul class="list-group list-group-flush">
                <li v-for="(terminal, index) in terminals"
                    :key="terminal.id"
                    @click="setSel(index)"
                    :class="{
                        sel: sel.id === terminal.id
                    }"
                    class="list-group-item d-flex justify-content-between align-items-center pointer">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" 
                            :class="{'btn-primary': terminal.use, 'btn-secondary': !terminal.use}"
                            type="button" 
                            id="dropdownMenuButton" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false">
                            {{ useYn(terminal.use) }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" @click="setUse(index, 1)">사용</a>
                            <a class="dropdown-item" @click="setUse(index, 0)">중지</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" @click="delTerminal(index)">삭제</a>
                        </div>
                    </div>
                    <span>{{ terminal.name }}</span>
                </li>
                <li class="list-group-item">
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            v-model="form.name"
                            placeholder="터미널 이름">
                        <div class="input-group-append">
                            <button class="btn 
                                btn-outline-secondary"
                                type="button"
                                @click="addTerminal">출발시간 추가</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <schedules v-if="sel.id" 
        :terminal="sel"></schedules>
</div>

</template>

<script>
    import Schedules from './Schedules.vue'
    export default {
        components: {
            Schedules
        },
        props: ['terms'],
        created() {
            this.terminals = this.terms
        },
        data() {
            return {
                terminals: [],
                sel: {
                    id: 0,
                    name:"",
                    use: 0,
                },
                form: {
                    name: ''
                }
            }
        },
        methods: {
            setSel(index) {
                this.sel = this.terminals[index]
            },
            setUse(index, use) {
                axios.post('/set-use-terminal', {
                    id: this.terminals[index].id,
                    use: use
                })
                .then(response => {
                    this.terminals[index].use = use
                })
            },
            addTerminal () {
                axios.post('/add-terminal', this.form)
                .then(response => {
                    this.form.name = ''
                    this.terminals.push(response.data)
                })
                .catch(error => {
                    if (error.response.status === 422) alert(error.response.data.errors.name[0])
                })
            },
            delTerminal (index) {
                if (!confirm('해당 작업은 복구할 수 없습니다! 정말 삭제 하시겠습니까?')) return false
                axios.delete(`/terminal/${this.terminals[index].id}`)
                .then(response => {
                    this.terminals.splice(index, 1);
                })
            },
            useYn(use) {
                return use === 1 ? '사용' : '중지'
            }
        }
    }
</script>
