<template>
    <div>
        <!-- show more ボタン -->
        <div class="text-center">
            <v-btn
                class="ma-2"
                width="200"
                :loading="loading2"
                :disabled="loading2"
                outlined color="black"
                @click="loader = 'loading2'"
            >   <!-- 問題あるが、無視する -->
            Show more
                <template v-slot:loader>
                    <span>Loading...</span>
                </template>
            </v-btn>
        </div>
    </div>    
</template>