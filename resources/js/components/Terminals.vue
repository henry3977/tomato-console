<template>
    <div class="col-md-2">

        <div class="card text-center">
            <div class="card-header">
                터미널
            </div>
            <ul class="list-group list-group-flush ">
                <li v-for="terminal in terminals"
                    :key="terminal.id"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            사용
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">사용</a>
                            <a class="dropdown-item" href="#">중지</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">삭제</a>
                        </div>
                    </div>
                    <span>{{ terminal.name }}</span>
                </li>
            </ul>
        </div>

        <div class="input-group mt-2">
            <input type="text" class="form-control" placeholder="터미널 이름">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">저장</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['terminals'],
        mounted() {
        },
        data() {
            return {
                
            }
        }
    }
</script>
