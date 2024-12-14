<template>

    <div class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-6 text-start">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://appstack.bootlab.io/forms-layouts#">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://appstack.bootlab.io/forms-layouts#">Help Center</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://appstack.bootlab.io/forms-layouts#">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://appstack.bootlab.io/forms-layouts#">Terms of
                                Service</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0">
                        © 2024 - <a class="text-muted" href="/">{{appName}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
    // appstack.bootlab.io/
    const appName = import.meta.env.VITE_APP_NAME ;



</script>
