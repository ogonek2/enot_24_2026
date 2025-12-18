<template>
    <section class="branches-section container mx-auto  bg-enot-dark rounded-2xl mt-6 py-12 md:py-16">
        <div class="px-4 md:px-6 lg:px-8">
            <!-- Header with Title and City Selection -->
            <div class="flex flex-col justify-between items-start mb-8 md:mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-2">
                        Наші локації де ви<br>можете здати одяг у хімчистку
                    </h2>
                    <p class="text-xl md:text-2xl text-enot-pink">
                        у м. {{ selectedCity }}
                    </p>
                </div>
                
                <!-- City Selection Buttons -->
                <div class="flex gap-3 flex-wrap">
                    <button
                        v-for="city in cities"
                        :key="city"
                        @click="selectCity(city)"
                        :class="[
                            'px-4 py-2 rounded-full text-sm md:text-base font-semibold transition-all duration-300',
                            selectedCity === city
                                ? 'bg-enot-pink text-white'
                                : 'bg-transparent border-2 border-white text-white hover:bg-white/10'
                        ]"
                    >
                        <span v-if="selectedCity === city" class="mr-2">×</span>
                        {{ city }}
                    </button>
                </div>
            </div>

            <!-- Main Content: Image and Details -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                <!-- Left: Branch Image -->
                <div class="relative">
                    <div class="relative w-full h-64 md:h-96 lg:h-[500px] rounded-2xl overflow-hidden bg-gray-800">
                        <!-- Image or Placeholder -->
                        <img
                            v-if="currentBranch.image"
                            :src="currentBranch.image"
                            :alt="`Відділення ${currentBranch.address}`"
                            class="w-full h-full object-cover"
                        />
                        <div
                            v-else
                            class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-gray-700 to-gray-900 text-white"
                        >
                            <i class="fas fa-store text-6xl md:text-8xl mb-4 opacity-50"></i>
                            <p class="text-lg md:text-xl font-semibold opacity-75">Фото відділення</p>
                            <p class="text-sm md:text-base opacity-50 mt-2">Скоро буде додано</p>
                        </div>
                        
                        <!-- Branch Navigation Arrows -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-3">
                            <button
                                @click="previousBranch"
                                class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-enot-dark border-2 border-white text-white hover:bg-white hover:text-enot-dark transition-all duration-300 flex items-center justify-center"
                                :disabled="filteredBranches.length <= 1"
                            >
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                @click="nextBranch"
                                class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-enot-dark border-2 border-white text-white hover:bg-white hover:text-enot-dark transition-all duration-300 flex items-center justify-center"
                                :disabled="filteredBranches.length <= 1"
                            >
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right: Branch Details -->
                <div class="flex flex-col">
                    <!-- Address -->
                    <div class="mb-4">
                        <div class="flex items-start gap-4 mb-2">
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-enot-pink flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-enot-dark text-lg md:text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm md:text-base text-gray-300 mb-1">Адреса</p>
                                <p class="text-base md:text-lg lg:text-lg text-white font-medium">
                                    {{ currentBranch.address }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="mb-4">
                        <div class="flex items-start gap-4 mb-2">
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-enot-pink flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-enot-dark text-lg md:text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm md:text-base text-gray-300 mb-1">Режим Роботи</p>
                                <p class="text-base md:text-lg lg:text-lg text-white font-medium">
                                    {{ currentBranch.workingHours }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mb-6 md:mb-8">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-white text-sm md:text-base">
                                {{ String(currentBranchIndex + 1).padStart(2, '0') }}
                            </span>
                            <div class="flex gap-2">
                                <span class="w-2 h-2 rounded-full bg-enot-pink w-8"></span>
                            </div>
                            <span class="text-white text-sm md:text-base">
                                {{ String(filteredBranches.length).padStart(2, '0') }}
                            </span>
                        </div>
                    </div>
                            <div class="flex gap-2 mb-4">
                                <span
                                    v-for="(branch, index) in filteredBranches"
                                    :key="index"
                                    @click="goToBranch(index)"
                                    :class="[
                                        'w-2 h-2 rounded-full cursor-pointer transition-all duration-300',
                                        index === currentBranchIndex
                                            ? 'bg-enot-pink w-8'
                                            : 'bg-white/30 hover:bg-white/50'
                                    ]"
                                ></span>
                            </div>
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                        <button
                            @click="nextBranch"
                            class="px-6 py-3 md:px-8 md:py-4 rounded-full border-2 border-white text-white hover:bg-white hover:text-enot-dark transition-all duration-300 font-semibold text-sm md:text-base"
                        >
                            Наступна >
                        </button>
                        <button
                            @click="goToMap"
                            class="px-6 py-3 md:px-8 md:py-4 rounded-full bg-white text-enot-dark hover:bg-gray-100 transition-all duration-300 font-semibold text-sm md:text-base"
                        >
                            Перейти на Карту >
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Element (Raccoon Logo) -->
        <div class="relative">
            <div class="absolute bottom-0 right-0 w-32 h-32 md:w-48 md:h-48 lg:w-64 lg:h-64 opacity-20">
                
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'BranchesSlider',
    props: {
        branches: {
            type: Array,
            default: () => []
        },
        initialCity: {
            type: String,
            default: 'Київ'
        }
    },
    data() {
        // Получаем уникальные города из данных branches
        const uniqueCities = [...new Set(this.branches.map(branch => branch.city))].filter(Boolean);
        const defaultCities = uniqueCities.length > 0 ? uniqueCities : ['Київ', 'Вишневе', 'Ірпінь'];
        
        return {
            selectedCity: this.initialCity,
            currentBranchIndex: 0,
            currentImageIndex: 0,
            cities: defaultCities,
            raccoonLogo: '/storage/src/logo/logo-enot24.png'
        }
    },
    computed: {
        filteredBranches() {
            return this.branches.filter(branch => branch.city === this.selectedCity);
        },
        currentBranch() {
            if (this.filteredBranches.length === 0) {
                return {
                    address: 'Адреса не вказана',
                    workingHours: '10:00-20:00 Без Вихідних',
                    image: null,
                    images: []
                };
            }
            const branch = this.filteredBranches[this.currentBranchIndex] || this.filteredBranches[0];
            // If branch has images array, use current image index
            if (branch.images && branch.images.length > 0) {
                return {
                    ...branch,
                    image: branch.images[this.currentImageIndex] || branch.images[0]
                };
            }
            return branch;
        }
    },
    watch: {
        selectedCity() {
            this.currentBranchIndex = 0;
            this.currentImageIndex = 0;
        }
    },
    methods: {
        selectCity(city) {
            if (this.selectedCity === city) {
                // If clicking the same city, do nothing or reset
                return;
            }
            this.selectedCity = city;
        },
        nextBranch() {
            if (this.currentBranchIndex < this.filteredBranches.length - 1) {
                this.currentBranchIndex++;
            } else {
                this.currentBranchIndex = 0;
            }
            this.currentImageIndex = 0;
        },
        previousBranch() {
            if (this.currentBranchIndex > 0) {
                this.currentBranchIndex--;
            } else {
                this.currentBranchIndex = this.filteredBranches.length - 1;
            }
            this.currentImageIndex = 0;
        },
        goToBranch(index) {
            this.currentBranchIndex = index;
            this.currentImageIndex = 0;
        },
        nextImage() {
            const images = this.currentBranch.images || [];
            if (images.length > 0 && this.currentImageIndex < images.length - 1) {
                this.currentImageIndex++;
            }
        },
        previousImage() {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
            }
        },
        goToMap() {
            // Navigate to map page or use link from branch data
            if (this.currentBranch.linkMap) {
                window.open(this.currentBranch.linkMap, '_blank');
            } else {
                // Fallback to locations page
                window.location.href = '/locations';
            }
        }
    },
    mounted() {
        // Ensure we have valid branch data
        if (this.filteredBranches.length > 0) {
            this.currentBranchIndex = 0;
            this.currentImageIndex = 0;
        }
    }
}
</script>

<style scoped>
.branches-section {
    position: relative;
    overflow: hidden;
}

/* Smooth transitions */
button {
    cursor: pointer;
}

button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>

