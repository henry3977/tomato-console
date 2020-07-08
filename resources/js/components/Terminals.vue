<template>
<div class="row">

    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">

        <div class="card shadow none-border">
            <div class="card-header text-center">
                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-geo-alt text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </div>
            <ul class="list-group list-group-flush ">
                <li v-for="(terminal, index) in terminals"
                    :key="terminal.id"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ terminal.name }}</span>
           
                    
                    <div>
                        <button class="view"
                            @click="setSel(index)">
                            <svg v-if="sel.id === terminal.id"  width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-clock-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            </svg>
                            <svg v-else width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-clock text-black-50" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                                <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button>
                        <button class="view text-black-50 ml-2"
                            @click="setUse(index)">
                            <svg v-if="terminal.use" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                   
                            <svg v-else width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/>
                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                            </svg>
                        </button>
                        
                        <button class="view text-black-50 ml-2"
                            @click="delTerminal(index)">
                            <svg width="1.2em" height="1.2em" viewBox="0 0 16 14" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg>
                        </button>
                    </div>
                    
                  
                  
                </li>
                <li class="list-group-item">
                    <form @submit.prevent="addTerminal">
                        <div class="input-group">
                            <input type="text"
                                class="form-control mr-2"
                                v-model="form.name"
                                placeholder="터미널 이름">
                            <div class="input-group-append">
                                <button class="btn 
                                    btn-outline-primary"
                                    type="submit">터미널 추가</button>
                            </div>
                        </div>
                    </form>
                    
                </li>

            </ul>
        </div>
    </div>

    <schedules v-if="sel.id" 
        :terminal="sel"
        @close="unSetSel"></schedules>
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
                    use: 0
                },
                form: {
                    name: ''
                }
            }
        },
        methods: {
            setSel(index) {
                if (this.sel.id === this.terminals[index].id) {
                    this.unSetSel(); 
                } else {
                    this.sel = this.terminals[index]
                }
            },
            unSetSel() {
                this.sel = {
                    id: 0,
                    name:"",
                    use: 0
                }
                
            },
            setUse(index) {
                let use = this.terminals[index].use ? 0 : 1
                this.terminals[index].use
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
                let input = prompt('잘못 누른거 아니지? 정말 삭제하고 싶다면 터미널"이름"을 입려해. 해당 터미널에 등록된 시간표까지 전부 삭제되니까 조심하고, 다시 복구할수 없는거 알지?')
                let name = this.terminals[index].name

                if (input !== null && input !== name) {
                    alert('잘못 입력했는걸...')
                    return false
                }
                if (input === null) return false
                axios.delete(`/terminal/${this.terminals[index].id}`)
                .then(response => {
                    this.terminals.splice(index, 1);
                    alert(`${name}삭제 완료!`)
                })
            },
            useYn(use) {
                return use === 1 ? '사용' : '중지'
            }
        }
    }
</script>
