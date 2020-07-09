<template>
    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
    
        <div class="card
            shadow 
            none-border">
            <div class="p-3 d-flex justify-content-between align-items-center">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-clock-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                </svg>
                <div>   
                    <span :class="{'text-primary': arrow === 'from',
                        'font-weight-bold':  arrow === 'from'}">사창리</span>
                    <button class="view"
                        @click="toggleArrow">
                        <svg v-if="arrow === 'to'" width="2.5em" height="2.5em" viewBox="0 0 16 17" class="bi bi-arrow-right text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z"/>
                        </svg>
                        <svg v-else-if="arrow === 'from'" width="2.5em" height="2.5em" viewBox="0 0 16 17" class="bi bi-arrow-left text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button>
                    <span :class="{'text-primary': arrow === 'to',
                        'font-weight-bold':  arrow === 'to'}">{{ terminal.name }}</span>
                </div>
                
                <button type="button" 
                    class="close" 
                    aria-label="Close"
                    @click="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
    
            <ul class="list-group list-group-flush">
                <li v-if="!schedules" 
                    class="list-group-item axios p-4"></li>
                <li v-for="(schedule, index) in schedules"
                    :key="schedule.id"
                    class="list-group-item d-flex justify-content-between align-items-center">        
                    {{ schedule.time }}
                    <div>
                        <button class="view text-black-50 ml-2"
                            @click="setUse(index)">
                            <svg v-if="schedule.use" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
                            @click="delSchedule(index)">
                            <svg width="1.2em" height="1.2em" viewBox="0 0 16 14" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg>
                        </button>
                    </div>
                </li>
                <li v-if="schedules" 
                    class="list-group-item">
                    <form @submit.prevent="addSchedule">
                        <div class="input-group">
                            <input type="text"
                                class="form-control mr-2" 
                                placeholder="00:00"
                                v-model="form.time">
                            <div class="input-group-append">
                                <button class="btn 
                                    btn-outline-primary" 
                                    type="submit">출발시간 추가</button>
                            </div>
                        </div>
                    </form>
                    
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['terminal'],
        created() {
            this.getSchedules()
        },
        data() {
            return {
                arrow: 'to',
                schedules: false,
                form: {
                    time: '',
                }
            }
        },
        watch: {
            'terminal.id' () {
                this.arrow = 'to'
                this.getSchedules()
            }
        },
        methods: {
            getSchedules() {
                this.schedules = false
                axios.get(`/${this.arrow}-schedules/${this.terminal.id}`)
                .then(response => {
                    this.schedules = response.data
                })
            },
            addSchedule () {
                axios.post(`/add-${this.arrow}-schedule`, {
                    term_id: this.terminal.id,
                    time: this.form.time,
                })
                .then(response => {
                    this.schedules.push(response.data)
                    this.form.time = ''
                })
                .catch(error => {
                    console.log(error.response)
                    if (error.response.status === 422) alert(error.response.data.errors.time[0])
                })
            },
            delSchedule (index) {
                let input = prompt('삭제하고 싶다면 "시간"을 입력해.')
                let time = this.schedules[index].time

                if (input !== null && input !== time) {
                    alert('잘못 입력했는걸...')
                    return false
                }

                if (input === null) return false

                axios.delete(`/schedule/${this.schedules[index].id}`)
                .then(response => {
                    this.schedules.splice(index, 1);
                    alert(`${time}삭제 완료!`)

                })
            },
            setUse(index) {
                let use = this.schedules[index].use ? 0 : 1
                this.schedules[index].use
                axios.post('/set-use-schedule', {
                    id: this.schedules[index].id,
                    use: use
                })
                .then(response => {
                    this.schedules[index].use = use
                })
            },
            toggleArrow() {
                this.arrow = this.arrow === 'to' ? 'from' : 'to'
                this.getSchedules()

            },
            useYn(use) {
                return use === 1 ? '사용' : '중지'
            },
            close() {
                this.$emit('close')
            }
        }
    }
</script>
